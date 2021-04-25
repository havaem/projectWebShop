<?php
session_start();
// $cart = array();
// $_SESSION['cart'] = $cart;
include("../config.php");
/* if (!isset($_SESSION['cart'])) {
    $cart = array();
    $_SESSION['cart'] = $cart;
} */
$idProduct = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$iP = mysqli_fetch_assoc($connect->query("SELECT id,name,price FROM product WHERE id = $idProduct"));
if($idProduct !=0 && !in_array($iP,$_SESSION['cart'])){
    $iP['quanity']=1;
    $iP['pricePay']=$iP['price'];
    array_push($_SESSION['cart'], $iP);
}
echo "<pre>";
print_r($_SESSION['cart']);
echo "</pre>";