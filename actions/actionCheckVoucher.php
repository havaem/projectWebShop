<?php
include_once('../config.php');
$coupon  = isset($_POST['coupon']) ? $_POST['coupon'] : '';
$noti = 0;
// 1 : Coupon của bạn đã hết lượt sử dụng !!
// 2 : Coupon của bạn đã hết hạn sử dụng !!
// 3 : Coupon không tồn tại !!
// 5 : Áp dụng coupon thành công
if ($coupon != '') {
    $checkExistCoupon = $connect->query("SELECT * from voucher where code='$coupon' and type=3");
    // Voucher tồn tại
    if (mysqli_num_rows($checkExistCoupon) > 0) {
        $couponRow = mysqli_fetch_assoc($checkExistCoupon);
        //Kiểm tra hạn sử dụng
        if (strtotime($couponRow['expiry date']) >= strtotime(date("Y-m-d"))) {
            //Còn hạng sử dụng
            if($couponRow['time']>0){
                //Còn số lần dùng
                $noti= 5;
            }
            else{
                // echo "Coupon của bạn đã hết lượt sử dụng !!";
                $noti = 1;
            }
        }
        else{
            // echo "Coupon của bạn đã hết hạn sử dụng !!";
            $noti = 2;
        }
    }
    else{
        // echo "Coupon không tồn tại !!";
        $noti = 3;
    }
}
echo $noti;