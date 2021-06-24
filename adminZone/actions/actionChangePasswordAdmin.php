<?php
session_start();
include("../../config.php");
$password = $_POST['newPW'];
$password = md5($password);
$idAdminLogin = $_SESSION['idAdminLogin'];
$connect->query("UPDATE `admin` set password = '$password' where id = $idAdminLogin");