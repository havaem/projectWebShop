<?php
session_start();
include("../config.php");
if (isset($_SESSION['cart']) && count($_SESSION['cart'])!= 0 ) {
    echo count($_SESSION['cart']);
}
else{
    echo "0";
}