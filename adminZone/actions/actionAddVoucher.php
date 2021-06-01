<?php
include("../../config.php");
$Code = $_POST['newCode'];
$Type = $_POST['newType'];
$Detail = $_POST['newDetail'];
$Times = $_POST['newTimes'];
$ExpiryDate = $_POST['newExpiryDate'];
$now = date("Y-m-d");
$connect->query("INSERT INTO voucher(type, code, percent, price, `initiated date`, `expiry date`, time) 
                                VALUES ('$Type','$Code','$Detail','$Detail','$now','$ExpiryDate','$Times')");
echo "Thêm thành công!";