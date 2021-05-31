<?php
session_start();
// session_destroy();
echo "<pre>";
echo count($_SESSION['cart']);
print_r($_SESSION['cart']);
echo "</pre>";
if($_SESSION['cart'][0]['code'] != ''){
    echo "hi";
}
else{
    echo "null";
}