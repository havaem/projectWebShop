<?php
    session_start();
    include("../config.php");
    $connect = mysqli_connect('localhost', 'admin', 'admin', 'cnpm webshop');
    if(isset($_SESSION['idUserLogin'])){
        header('Location: ../dashboard/user.php');
    }
    $errors = array();
    $username = "";
    $name = "";
    $password = "";
    $email = "";
    $tel = "";
    $gender = 1;
    $birthday = "";
    $address = "";
    //Form đăng kí
    if (isset($_POST['resgiter'])) {
        $username = mysqli_real_escape_string($connect, $_POST['username']);
        $name = mysqli_real_escape_string($connect, $_POST['name']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $tel = mysqli_real_escape_string($connect, $_POST['tel']);
        $gender = mysqli_real_escape_string($connect, $_POST['gender']);
        $birthday = mysqli_real_escape_string($connect, $_POST['birthday']);
        $address = mysqli_real_escape_string($connect, $_POST['address']);
        $resultEmailCheck = $connect->query("SELECT email FROM user WHERE email = '$email'") or die("mysqli_error");
        $resultUserCheck = $connect->query("SELECT username FROM user WHERE username = '$username'") or die("mysqli_error");
        if (mysqli_num_rows($resultUserCheck) > 0) {
            $errors['user_check'] = "Tên tài khoản bạn vừa nhận đã tồn tại!";
        }
        if (mysqli_num_rows($resultEmailCheck) > 0) {
            $errors['mail_check'] = "Email bạn vừa nhập đã tồn tại!";
        }
        if (count($errors) === 0) {
            $password = md5($password);
            $code = rand(999999, 111111);
            $currentDay = date('Y-m-d H:i:s');;
            $insert_data = "INSERT INTO user(username,password,name,gender,email,phone,address,date_created,birthday,code) VALUES ('$username','$password','$name',$gender,'$email','$tel','$address','$currentDay','$birthday',$code)";
            $data_check = $connect->query($insert_data);
            $errors['success'] = "Bạn đã tạo thành công ";
            if ($data_check) { 
                $subject = "EMAIL XÁC MINH TÀI KHOẢN";
                $message = "<p style='color:red;font-size:20px;'>Mã xác minh của bạn là </p><b style='margin-left:50px;'>$code</b>";
                $sender = 'MIME-Version: 1.0'."\r\n";
                $sender .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                $sender .= "From: ADMIN TECHSHOP";
                if (mail($email, $subject, $message, $sender)) {
                    // $info = "Chúng tôi đã gửi mã xác minh tới $email";
                    $_SESSION['status'] = $email;
                    header('location: user-otp.php');
                    exit();
                } 
                else {
                    $errors['otp-error'] = "Gửi mã otp đến email của bạn thất bại!";
                }
            } 
            else {
                $errors['db-error'] = "Có lỗi gì đó xảy ra trong quá trình gửi lên database!";
            }
        }
    }
    //Form xác minh OTP
    if (isset($_POST['checkOTP'])) {
        $otp_code = (int)mysqli_real_escape_string($connect, $_POST['otp']);
        $resultCheckOTP = $connect->query("SELECT * FROM user WHERE otp = $otp_code");
        if (mysqli_num_rows($resultCheckOTP) > 0) {
            $rowCheckOTP = mysqli_fetch_assoc($resultCheckOTP);
            $code = $rowCheckOTP['code'];
            $updateData = $connect->query("UPDATE user SET otp = 0, status = 'Verified' WHERE id = ${rowCheckOTP['id']}");
            if ($updateData) {
                if($_SESSION['status'] == 'VerifiedAccount'){
                    session_unset();
                    header('location: http://localhost/projectWebshop/login/dangnhap.php');
                    exit();
                }
                else if($_SESSION['status'] = 'ForgotPassword'){
                    $_SESSION['idUserPassWord'] = $rowCheckOTP['id'];
                    header('location: matkhaumoi.php');
                    exit();
                }
            } else {
                $errors['otpError'] = "Có lỗi trong quá trình cập nhật code!";
            }
        } 
        else {
            $errors['otpError'] = "Bạn nhập sai code đã nhận!";
        }
    }
    //Form đăng nhập 
    if (isset($_POST['login'])) {
        $_SESSION['status'] = null;
        $username = mysqli_real_escape_string($connect, $_POST['username']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);
        $checkUsername = $connect->query("SELECT * from user where username = '$username'");
        if (mysqli_num_rows($checkUsername) > 0) {
            $upDB = mysqli_fetch_assoc($checkUsername);
            // Lấy ra user và password
            $usernameDB = $upDB['username'];
            $passwordDB = $upDB['password'];
            if (md5($password) == $passwordDB) {
                $statusDB = $upDB['status'];
                print_r($statusDB);
                if ($statusDB === 'Verified') {
                    $_SESSION['idUserLogin'] = $upDB['id'];;
                    header('location: http://localhost/projectWebshop/dashboard/user.php');
                    exit();
                } 
                else {
                    $_SESSION['status'] = 'VerifiedAccount';
                    header('location: user-otp.php');
                    exit();
                }
            } 
            else {
                $errors['username'] = "Sai tên tài khoản hoặc mật khẩu!";
            }
        } 
        else {
            $errors['username'] = "Bạn chưa có tài khoản? Nhấn vào đăng kí nào!";
        }
    }
    // Form quên mật khẩu 
    if (isset($_POST['forgotPassword'])) {
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $checkEmailExists = $connect->query("SELECT * from user where email = '$email'");
        if (mysqli_num_rows($checkEmailExists) > 0) {
            $code = rand(100000,999999);
            if ($connect->query("UPDATE user set otp = $code where email = '$email'")) {
                $subject = "MÃ TẠO MỚI MẬT KHẨU";
                $message = "<p style='color:red;font-size:20px;'>Mã xác minh của bạn là </p><b style='margin-left:50px;'>$code</b>";
                $sender = 'MIME-Version: 1.0'."\r\n";
                $sender .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                $sender .= "From: ADMIN TECHSHOP";
                if (mail($email, $subject, $message, $sender)) {
                    session_unset();
                    $_SESSION['status'] = 'ForgotPassword';
                    header('location: user-otp.php');
                    exit();
                } 
                else {
                    $errors['otp-error'] = "Gửi mã otp đến email của bạn thất bại!";
                }
            } 
            else {
                $errors['username'] = "Lỗi gì đó bất ngờ đã xảy ra!";
            }
        } 
        else {
            $errors['username'] = "Tài khoản này không tồn tại, vui lòng đăng kí!";
        }
    }
    // Form mật khẩu mới
    if (isset($_POST['newPassword'])) {
        $password = mysqli_real_escape_string($connect, $_POST['password']);
        $repassword = mysqli_real_escape_string($connect, $_POST['repassword']);
        if ($password !== $repassword) {
            $errors['password'] = "Password nhập lại không đúng!";
        } else {
            $code = 0;
            $idUserPassWord = $_SESSION['idUserPassWord']; 
            $newPassword = md5($password);
            if ($connect->query("UPDATE user SET otp = $code, password = '$newPassword' WHERE id = $idUserPassWord")) {
                session_unset();
                header('Location: index.php');
            } else {
                session_unset();
                $errors['db-error'] = "Không thể đổi mật khẩu!";
            }
        }
    }