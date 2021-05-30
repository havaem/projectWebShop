<?php 
include("../config.php");
$id = $_POST['id'];
$connect->query("DELETE FROM comment WHERE id='$id'");
?>