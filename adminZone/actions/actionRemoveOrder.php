<?php
include("../../config.php");
$id = $_POST['id'];
$connect->query("DELETE FROM theorder WHERE id_order = $id");