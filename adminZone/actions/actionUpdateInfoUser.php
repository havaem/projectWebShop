<?php
include("../../config.php");
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$isBanned = $_POST['isBanned'] == 'true' ? "false" : "true";
$password = isset($_POST['password']) ? $_POST['password'] : null;
if ($password) {
    $password = md5($password);
    $connect->query("UPDATE user SET name = '$name', email='$email', password = '$password', isBanned = '$isBanned' where id=$id");
} else $connect->query("UPDATE user SET name = '$name', email='$email', isBanned = '$isBanned' where id=$id");
echo "Cập nhật thành công!";