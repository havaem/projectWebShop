<?php
include_once('../config.php');
session_start();
$coupon  = isset($_POST['coupon']) ? $_POST['coupon'] : '';
$noti = 0;
// 1 : Coupon của bạn đã hết lượt sử dụng !!
// 2 : Coupon của bạn đã hết hạn sử dụng !!
// 3 : Coupon không tồn tại !!
// 4 : Xóa coupon thành công
// 5 : Áp dụng coupon thành công
if ($coupon != '') {
    $checkExistCoupon = $connect->query("SELECT * from voucher where code='$coupon'");
    // Voucher tồn tại
    if (mysqli_num_rows($checkExistCoupon) > 0) {
        $couponRow = mysqli_fetch_assoc($checkExistCoupon);
        //Kiểm tra hạn sử dụng
        if (strtotime($couponRow['expiry date']) >= strtotime(date("Y-m-d"))) {
            //Còn hạn sử dụng
            if ($couponRow['time'] > 0) {
                //Còn số lần dùng
                $noti = 5;
                $_SESSION['cart'][0]['code'] = $couponRow['code'];
                $_SESSION['cart'][0]['percent'] = isset($couponRow['percent']) ? $couponRow['percent'] : 0;
                $_SESSION['cart'][0]['price'] =  $couponRow['price'];
            } else {
                // echo "Coupon của bạn đã hết lượt sử dụng !!";
                $noti = 1;
                $_SESSION['cart'][0]['code'] = '';
                $_SESSION['cart'][0]['percent'] = 0;
                $_SESSION['cart'][0]['price'] =  0;
            }
        } else {
            // echo "Coupon của bạn đã hết hạn sử dụng !!";
            $noti = 2;
            $_SESSION['cart'][0]['code'] = '';
            $_SESSION['cart'][0]['percent'] = 0;
            $_SESSION['cart'][0]['price'] =  0;
        }
    } else {
        // echo "Coupon không tồn tại !!";
        $noti = 3;
        $_SESSION['cart'][0]['code'] = '';
        $_SESSION['cart'][0]['percent'] = 0;
        $_SESSION['cart'][0]['price'] =  0;
    }
} else {
    // Xóa coupon thành công
    $_SESSION['cart'][0]['code'] = '';
    $_SESSION['cart'][0]['percent'] = 0;
    $_SESSION['cart'][0]['price'] =  0;
    $noti = 4;
}

echo $noti;