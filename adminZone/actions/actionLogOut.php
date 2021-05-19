<?php
session_start();
$_SESSION['idAdminLogin'] = null;
header('location: ../index.php');
?>