<?php
session_start();
// session_destroy();
echo "<pre>";
echo count($_SESSION['cart']);
print_r($_SESSION['cart']);
echo "</pre>";