<?php
session_start();
$_SESSION['idUserLogin'] = null;
$_SESSION['cart']=null;
header('location: http://localhost/projectWebshop/login/dangnhap.php');
?>