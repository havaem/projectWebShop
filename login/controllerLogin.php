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
                $message = "<p style='color:red;'>Mã xác minh của bạn là </p><b>$code</b>";
                $sender = 'MIME-Version: 1.0'."\r\n";
                $sender .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                $sender .= "From: ADMIN TECHSHOP";
                if (mail($email, $subject, $message, $sender)) {
                    // $info = "Chúng tôi đã gửi mã xác minh tới $email";
                    $_SESSION['email'] = $email;
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
    //Form OTP
    if (isset($_POST['checkOTP'])) {
        $otp_code = mysqli_real_escape_string($connect, $_POST['otp']);
        $resultCheckOTP = $connect->query("SELECT * FROM user WHERE code = $otp_code");
        if (mysqli_num_rows($resultCheckOTP) > 0) {
            $rowCheckOTP = mysqli_fetch_assoc($resultCheckOTP);
            $code = $rowCheckOTP['code'];
            $updateData = $connect->query("UPDATE user SET code = 0, status = 'Verified' WHERE code = $code");
            //Nếu cập nhật db thành công 
            if ($updateData) {
                header('location: http://localhost/projectWebshop/login/dangnhap.php');
                session_unset();
                exit();
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
                    $_SESSION['email'] = $upDB['email'];;
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
