<?php
include("../../config.php");
$id = $_POST['id'];
$vlNow = mysqli_fetch_assoc($connect->query("SELECT isVisible from product where id = $id"));
if ($vlNow['isVisible'] == 0) $vlNow = 1;
else $vlNow = 0;
$connect->query("UPDATE product set isVisible = '$vlNow' where id = $id");
