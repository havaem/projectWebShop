<?php
include("../config.php");
$rate = isset($_POST['rate']) ? (int)$_POST['rate'] : 0;
$id_product = isset($_POST['id_product']) ? $_POST['id_product'] : 0;
$id_user = isset($_POST['id_user']) ? $_POST['id_user'] : 0;
$comment = isset($_POST['comment']) ? $_POST['comment'] : '';
$currentDay = date_create()->format('Y-m-d H:i:s');
if($comment === '' && $rate !== 0){
    if(mysqli_num_rows($rated = $connect->query("SELECT * FROM rate WHERE id_product = $id_product  AND id_user = $id_user "))  == 0 ){
        $connect->query("INSERT INTO rate(id_product, id_user, star) VALUES ($id_product,$id_user,$rate)")or die("mysqli_error");
    }
    else{
        $connect->query("UPDATE rate SET star = $rate WHERE rate.id_product = $id_product AND rate.id_user = $id_user")or die("mysqli_error");
    }
}
else if($comment !== '' && $rate === 0){
    $connect->query("INSERT INTO comment(id_product, id_user, comment, release_date) VALUES ($id_product,$id_user,'$comment','$currentDay')")or die("mysqli_error");
}
else{
    $connect->query("INSERT INTO comment(id_product, id_user, comment, release_date) VALUES ($id_product,$id_user,'$comment','$currentDay')")or die("mysqli_error");
    if(mysqli_num_rows($rated = $connect->query("SELECT * FROM rate WHERE id_product = $id_product  AND id_user = $id_user "))  == 0 ){
        $connect->query("INSERT INTO rate(id_product, id_user, star) VALUES ($id_product,$id_user,$rate)")or die("mysqli_error");
    }
    else{
        $connect->query("UPDATE rate SET star = $rate WHERE rate.id_product = $id_product AND rate.id_user = $id_user")or die("mysqli_error");
    }
}
