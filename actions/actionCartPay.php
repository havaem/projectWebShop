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
$sumPrice = 0; // tổng tiền đơn hàng
for ($i = 1; $i < count($cart); $i++) {
    $sumPrice += $cart[$i]['pricePay'];        
}
$giamGia = 0;
if (count($cart) > 1) {
    // Giảm lượt sử dụng cho voucher user đã dùng
    if($cart[0]['code'] != ''){
        $code = $cart[0]['code'];
        // Giảm giá dựa vào code
        $dataCode = mysqli_fetch_row($connect->query("SELECT * from voucher where code = '$code'"));
        //Giảm giá theo %
        if($dataCode[1] == 2){
            $sumPrice = $sumPrice * (100 - $dataCode[3]) / 100;
        }
        //Giảm giá theo tiền
        else{
            $sumPrice -= $dataCode[4];
        }
        $sumPrice+= 30000; //Phí vận chuyển 
        //Số lượng còn lại của code
        $timeCode = (int)$dataCode[7];
        $timeCode -= 1;
        // Tiến hành giảm số lượng 
        $connect->query("UPDATE voucher SET time = '$timeCode' WHERE code = '$code'");
        // Tiến hành thay đổi trạng thái 
        if(mysqli_fetch_row($connect->query("SELECT time from voucher where code = '$code'"))[0] == 0){
            $connect->query("UPDATE voucher SET isActive = 'false'  WHERE code = '$code'");
        }
    }
    // Thông tin nhận được từ form
    $nameUser = $_POST['nameUser'];
    $addressUser = $_POST['addressUser'];
    $phoneUser = $_POST['phoneUser'];
    $noteUser = $_POST['noteUser'];
    // Tiến hành thêm database vào theorder 
    $connect->query("INSERT INTO theorder(id_user, name, price, address, phone, note, order_time) 
                    VALUES ('$idUser','$nameUser','$sumPrice','$addressUser','$phoneUser','$noteUser','$currentDay')") or die('mysql error');
    $idOrder = $connect->insert_id;
    for ($i = 1; $i < count($cart); $i++) {
        $idItem = $cart[$i]['id'];
        $nameItem = $cart[$i]['name'];
        $priceItem = $cart[$i]['pricePay'];
        $quanityItem = $cart[$i]['quanity'];
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
        // Chi tiết đơn hàng
        $connect->query("INSERT INTO orderdetail(id_order, id_product, quanity_product,price_product) VALUES ('$idOrder','$idItem','$quanityItem','$priceItem')");
        // Cập nhật tổng số lượng sản phẩm đã mua cho user
        $connect->query("UPDATE user SET sumBought= $sumBought  WHERE id=$idUser");
        // Giảm số lượng hàng trong kho 
        $connect->query("UPDATE product SET stock= $quanity WHERE id=$idItem");
    }
    $_SESSION['cart'] = null;
    echo $idOrder;
}