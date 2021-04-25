<?php
    session_start();
// Có tổng cộng 2 action
// -1 là không làm gì cả
// 0 là xóa
// 1 là sửa số lượng và cập nhật giá
    $actionType = isset($_POST['aT']) ? (int)$_POST['aT'] : -1;
    if($actionType == 0){
        $idNeedToDelete = $_POST['id'];
        array_splice($_SESSION['cart'], $idNeedToDelete, 1); 
    }
    if($actionType == 1){
        $idNeedToChange = $_POST['id'];
        $value = $_POST['value'];
        $_SESSION['cart'][$idNeedToChange]['quanity']=$value;
        $_SESSION['cart'][$idNeedToChange]['pricePay'] = $_SESSION['cart'][$idNeedToChange]['price'] * $value;
    }
?>