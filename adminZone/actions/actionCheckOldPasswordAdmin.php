<?php
session_start();
include("../../config.php");
$password = md5($_POST['oldPW']);
$idAdminLogin = $_SESSION['idAdminLogin'];
$dataAdmin = mysqli_fetch_assoc($connect->query("SELECT * from admin where id = $idAdminLogin"));
if($dataAdmin['password'] == $password){
    echo "1";
}
else{
    echo "0";
}