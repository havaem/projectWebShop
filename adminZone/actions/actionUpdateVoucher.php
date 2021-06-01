<?php
include("../../config.php");
$id = $_POST['id'];
$Code = $_POST['Code'];
$Type = $_POST['Type'];
$Detail = $_POST['Detail'];
$Times = $_POST['Times'];
$ExpiryDate = $_POST['ExpiryDate'];
if($Type == 1){
    // echo "Theo tiền";
    // echo $Detail;
    $connect->query("UPDATE voucher SET type='$Type',code='$Code',percent=NULL,price='$Detail',`expiry date`='$ExpiryDate',time='$Times' WHERE id = $id");
}
else if($Type == 2){
    // echo "Theo %";
    // echo $Detail;
    $connect->query("UPDATE voucher SET type='$Type',code='$Code',percent='$Detail',price=NULL,`expiry date`='$ExpiryDate',time='$Times' WHERE id = $id");
}
echo "Cập nhật thành công!";