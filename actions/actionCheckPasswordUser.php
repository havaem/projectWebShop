<?php
    session_start();
    include("../config.php");
    $id = $_SESSION['idUserLogin'];
    $dataUser = mysqli_fetch_assoc($connect->query("SELECT * from user where id = $id"));
    $password = md5($_POST['oldPassword']);
    if($dataUser['password'] == $password){
        echo "1";
    }
    else{
        echo "0";
    }
?>