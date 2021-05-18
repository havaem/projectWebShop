<?php
session_start();
include("./../../config.php");
$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$password !== null && $password = md5($password);
$noti = 0;
// 0 : Sai tên tài khoản hoặc mật khẩu
// 1 : Đăng nhập thành công
// $resultCheck = 
if (mysqli_num_rows($connect->query("SELECT * from admin where username='$username' and password='$password'")) > 0) {
    $adminData = mysqli_fetch_assoc($connect->query("SELECT id from admin where username='$username' and password='$password'"));
    $_SESSION['idAdminLogin'] = $adminData['id'];
    $noti = 1;
}
echo $noti;
