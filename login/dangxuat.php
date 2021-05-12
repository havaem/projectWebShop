<?php
session_start();
$_SESSION['idUserLogin'] = null;
header('location: http://localhost/projectWebshop/login/dangnhap.php');
?>