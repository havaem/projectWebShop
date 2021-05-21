<?php
include("../../config.php");
$id = $_POST['id'];
$date = date('Y-m-d H:i:s');
$connect->query("UPDATE theorder set isReceived = 1, order_receive = '$date' where id_order=$id");
