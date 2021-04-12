<?php
session_start();
include("../config.php");
$id = $_SESSION['idUserLogin'];
if(!isset($_SESSION['idUserLogin'])){
    header('location: ../login/dangnhap.php');
    exit();
}
$resultUser = $connect->query("SELECT * from user where id = $id");
$dataUser = mysqli_fetch_assoc($resultUser);
$username = $dataUser['username'];

$avatar = $dataUser['avatar'];
$name = $dataUser['name'];
$email = $dataUser['email'];
$phone = $dataUser['phone'];
$gender = (int)$dataUser['gender'];
$birthday = $dataUser['birthday'];
$address = $dataUser['address'];

$password = '';
$newpassword = '';
$renewpassword = '';
$otp = '';
$error = array();
if (isset($_POST['updateInfoByUser'])) {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $gender = mysqli_real_escape_string($connect, $_POST['gender']);
    $birthday = mysqli_real_escape_string($connect, $_POST['birthday']);
    $address = mysqli_real_escape_string($connect, $_POST['address']);
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'gif');
    if ($file) {
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError == 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    // $fileNameNew = $dataUser['id'].".".$fileActualExt;
                    $fileDestination = 'avatar/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                } else {
                    $error['fileBig'] = "Bạn vừa upload file quá lớn!";
                }
            } else {
                $error['fileError'] = "Có gì đó đã xảy ra khi bạn upload!";
            }
        } else {
            $error['typeFile'] = "Bạn vừa upload file không đúng định dạng!";
        }
    }
    if (count($error) === 0 && $file) {
        $connect->query("UPDATE user set name= '$name',avatar = './$fileDestination',email = '$email', phone = '$phone', gender = $gender, birthday = '$birthday',address = '$address'
            WHERE id=$id") or die("error");
        header("Location: user.php");
    } else {
        $connect->query("UPDATE user set name= '$name',email = '$email', phone = '$phone', gender = $gender, birthday = '$birthday',address = '$address'
            WHERE id=$id") or die("error");
        header("Location: user.php");
    }
}

if (isset($_POST['updatePasswordUser'])) {
    $error = array();
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $newpassword = mysqli_real_escape_string($connect, $_POST['newpassword']);
    $renewpassword = mysqli_real_escape_string($connect, $_POST['renewpassword']);
    $otp = mysqli_real_escape_string($connect, $_POST['otp']);
    if (md5($password) !== $dataUser['password']) {
        $error['trungPass'] = "Mật khẩu hiện tại không đúng!";
    } else {
        if ($password === $newpassword) {
            $error['trungPass'] = "Mật khẩu mới không khác gì mật khẩu hiện tại!";
        } else {
            if ($newpassword !== $renewpassword) {
                $error['khacPassNew'] = "Mật khẩu nhập lại không đúng!";
            } else {
                if ($otp !== $dataUser['otp']) {
                    $error['otpFail'] = "OTP không đúng!";
                }
            }
        }
    }
    if (count($error) === 0) {
        $newpassword = md5($newpassword);
        $connect->query("UPDATE user set otp = 0,password = '$newpassword' WHERE id=$id") or die("error");
        $error['success'] = "Đổi mật khẩu thành công!";
        header('location: user.php');
    }
}
