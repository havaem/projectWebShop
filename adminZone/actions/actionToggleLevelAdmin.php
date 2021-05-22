<?php
include("../../config.php");
$id = $_POST['id'];
$permission = mysqli_fetch_row($connect->query("SELECT permission FROM admin where id = $id"))[0];
if($permission == 1){
    if($connect->query("UPDATE admin SET permission = '2' where id =$id")){
        echo "1";
    }
}
else{
    if($connect->query("UPDATE admin SET permission = '1' where id =$id")){
        echo "2";
    }
}