<?php
include("../../config.php");
$id = $_POST['id'];
if($id){
    $connect->query("DELETE FROM user WHERE id = $id");
}
echo "Xóa thành công!";