<?php
include("../../config.php");
$id = $_POST['id'];
$connect->query("UPDATE theorder set isReceived = 2 where id=$id");