<?php
include("../../config.php");
$id = $_POST['id'];
echo $id;
if(isset($id)){
    if($connect->query("DELETE FROM product WHERE id = '$id'")){
        echo 1;
    }
    else{
        echo 0;
    }
}