<?php
include("../../config.php");
$id = $_POST['id'];
$connect->query("DELETE FROM `voucher` WHERE id = $id");
echo "Xóa thành công";