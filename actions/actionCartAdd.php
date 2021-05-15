<?php
session_start();
include("../config.php");
$idProduct = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$noti = 0;
// 1 : Thêm vào giỏ hàng thành công
// 2 : Tăng số lượng thành công
if ($idProduct != 0) {
    $iP = mysqli_fetch_assoc($connect->query("SELECT id,name,price,stock FROM product WHERE id = $idProduct"));
    if (isset($_SESSION['idUserLogin'])) {
        $idUser = $_SESSION['idUserLogin'];
        $dataUser = mysqli_fetch_assoc($connect->query("SELECT * from user where id = $idUser"));
        if ($dataUser['voucher']) {
            $arrayVoucher = explode('|', $dataUser['voucher']);
            if (count($arrayVoucher) > 0) {
                foreach ($arrayVoucher as $vc) {
                    $rowVoucher  = mysqli_fetch_assoc($connect->query("SELECT * from voucher where id = $vc"));
                    if ($rowVoucher['id_product'] == $idProduct) {
                        if ($rowVoucher['type'] == 1) {
                            $iP['price'] = $iP['price'] * (100 - $rowVoucher['percent']) / 100;
                        } else if ($rowVoucher['type'] == 2) {
                            $iP['price'] -= $rowVoucher['price'];
                        }
                    }
                }
            }
        }
    }
    $iP['quanity'] = 1;
    $iP['pricePay'] = $iP['price'];
    $inArray = true; // price check 
    // Kiểm tra id tồn tại trong mảng không ?
    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i]['id'] === $iP['id']) {
            $inArray = false; // Tồn tại thì ko add
        }
    }
    if ($inArray) {
        $noti = 1;
        array_push($_SESSION['cart'], $iP);
    } else {
        $noti = 2;
        for ($i = 0; $i < count($_SESSION['cart']); $i++) {
            if ($_SESSION['cart'][$i]['id'] == $iP['id']) {
                $_SESSION['cart'][$i]['quanity'] += 1;
                $_SESSION['cart'][$i]['pricePay'] = $_SESSION['cart'][$i]['price'] * $_SESSION['cart'][$i]['quanity'];
            }
        }
    }
}
echo $noti;
/* echo "<pre>";
print_r($_SESSION['cart']);
echo "</pre>";
 */