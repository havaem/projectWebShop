<?php
include("../../config.php");
$id = $_POST['id'];
$connect->query("UPDATE theorder set isReceived = 3 where id_order=$id");