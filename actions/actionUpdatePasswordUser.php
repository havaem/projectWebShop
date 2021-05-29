<?php
    session_start();
    include("../config.php");
    $id = $_SESSION['idUserLogin'];
    if (!isset($_SESSION['idUserLogin'])) {
        header('location: ../login/dangnhap.php');
        exit();
    }
    $resultUser = $connect->query("SELECT * from user where id = $id");
    $dataUser = mysqli_fetch_assoc($resultUser);
    $password = $_POST['newPassword'];
    $otp = $_POST['otp'];
    if ($otp !== $dataUser['otp']) {
        echo "1";
    }
    else{
        $password = md5($password);
        $connect->query("UPDATE user set otp = 0,password = '$password' WHERE id=$id") or die("error");
        echo "2";
    }
?>