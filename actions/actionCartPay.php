<?php
session_start();
include("../config.php");
if (!isset($_SESSION['idUserLogin'])) {
    header('location: ../login/dangnhap.php');
    exit();
}
$idUser = $_SESSION['idUserLogin'];
$dataUser = mysqli_fetch_assoc($connect->query("SELECT * from user where id = $idUser"));
$currentDay = date_create()->format('Y-m-d H:i:s');
$cart = $_SESSION['cart'];
if (count($cart) > 1) {
    for ($i = 1; $i < count($cart); $i++) {
        $addressUser = $dataUser['address'];
        $phoneUser = $dataUser['phone'];
        $idItem = $cart[$i]['id'];
        $nameItem = $cart[$i]['name'];
        $priceItem = $cart[$i]['pricePay'];
        $quanity = $cart[$i]['stock'] - $cart[$i]['quanity'];
        $sumBought = $dataUser['sumBought'] + $cart[$i]['quanity'];
        if ($dataUser['rank'] != 5) {
            $rowRank = mysqli_fetch_all($connect->query("SELECT * from rank"));
            foreach ($rowRank as $rankItem) {
                if ($sumBought >= (int)$rankItem[2]) {
                    $connect->query("UPDATE user SET rank = ${rankItem[0]} WHERE id=$idUser");
                }
            }
        }
        $connect->query("UPDATE user SET sumBought= $sumBought  WHERE id=$idUser");
        $connect->query("UPDATE product SET stock= $quanity WHERE id=$idItem");
        $connect->query("INSERT INTO theorder(id_product, id_user, name, price, address, phone, note, order_time, isReceived) 
        VALUES ('$idItem','$idUser','$nameItem','$priceItem','$addressUser','$phoneUser','test','$currentDay','2')");
    }
    $_SESSION['cart'] = null;
}
