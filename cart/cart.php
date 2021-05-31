<?php
session_start();
include("../config.php");
if (isset($_SESSION['cart']) === false) {
    $cart = array();
    $cartInfo = array();
    $cartInfo['code'] = '';
    $cartInfo['percent'] = 0;
    $cartInfo['price'] = 0;
    $cart[0] = $cartInfo;
    $_SESSION['cart'] = $cart;
}
?>
<!DOCTYPE html>
<html lang="vn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TECHSHOP ✔</title>
    <link rel="icon" href="../assets/image/icon.png" sizes="">
    <!-- Reset CSS -->
    <link rel="stylesheet" href="../assets/css/reset.css">
    <!-- Source CSS -->
    <link rel="stylesheet" href="../assets/css/cart.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/icon/flaticon.css">
    <script src="../assets/script/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../assets/css/notify.css">
    <script src="../assets/script/notyf.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>

<body>

    <?php
    include_once('../header.php');
    ?>
    <div class="cart">
        <!-- Ajax here -->
    </div>
    </div>

</body>
<script>
    window.addEventListener('DOMContentLoaded', function() {
        var notyf = new Notyf({
            duration: 1700,
            ripple: true,
            dismissible: true,
            position: {
                x: 'left',
                y: 'bottom',
            }
        });
        cart = document.querySelector(".cart");

        couponSubmit = document.querySelector(".coupon__submit");
        getCouponSubmit = () => document.querySelector(".coupon__submit");
        couponInp = document.querySelector("#couponInp");
        getcouponInp = () => document.querySelector("#couponInp");
        payBtn = document.querySelector(".pay-cart");
        getpayBtn = () => document.querySelector(".pay-cart");
        quanity = document.querySelectorAll(".quanity");
        getquanity = () => document.querySelectorAll(".quanity");
        buttonDown = document.querySelectorAll(".buttonDown");
        getbuttonDown = () => document.querySelectorAll(".buttonDown");
        buttonUp = document.querySelectorAll(".buttonUp");
        getbuttonUp = () => document.querySelectorAll(".buttonUp");
        btnDelete = document.querySelectorAll(".item__action-delete");
        getbtnDelete = () => document.querySelectorAll(".item__action-delete");
        //Render cart
        const renderCart = () => {
            $.ajax({
                url: "<?php echo $domain . "/cart/cartData.php" ?>",
                type: 'POST',
                success: function(data) {
                    cart.innerHTML = data;
                }
            });
            getSelector();
        }
        // Get all selector again
        const getSelector = () => {
            couponSubmit = getCouponSubmit();
            couponInp = getcouponInp();
            payBtn = getpayBtn();
            quanity = getquanity();
            buttonDown = getbuttonDown();
            buttonUp = getbuttonUp();
            btnDelete = getbtnDelete();
        }
        const renderFeauted = () => {
            getSelector();
            // Nhấn vào nút kiểm tra voucher
            
            couponSubmit ? couponSubmit.onclick = () => {
                cb = couponInp.value;
                if (couponInp.disabled === true) {
                    document.querySelector(".iconCoupon").setAttribute("class", "iconCoupon fas fa-check")
                    couponInp.disabled = false;
                    $.ajax({
                        url: "<?php echo $domain . "/actions/actionCheckVoucher.php" ?>",
                        type: 'POST',
                        success: function(data) {
                            if (data == 4) {
                                notyf.success('Xóa coupon thành công !!');
                                renderCart();
                            }
                        }
                    });
                } else {
                    $.ajax({
                        url: "<?php echo $domain . "/actions/actionCheckVoucher.php" ?>",
                        type: 'POST',
                        data: {
                            coupon: cb
                        },
                        success: function(data) {
                            if (data == 1) {
                                notyf.error('Coupon của bạn đã hết lượt sử dụng !!');
                            }
                            if (data == 2) {
                                notyf.error('Coupon của bạn đã hết hạn sử dụng !!');
                            }
                            if (data == 3) {
                                notyf.error('Coupon không tồn tại !!');
                            }
                            if (data == 5) {
                                notyf.success('Coupon đã được áp dụng !!');
                                document.querySelector(".iconCoupon").setAttribute("class", "iconCoupon fas fa-times")
                                couponInp.disabled = true;
                                renderCart();
                            }
                        }
                    });
                }

            }:null;
            //Nhấn vào nút thanh toán
            payBtn ? payBtn.onclick = () => {
                // Kiểm tra user xem đã login chưa
                $.ajax({
                    url: "<?php echo $domain . "/actions/actionCheckUserLogin.php" ?>",
                    type: 'POST',
                    success: function(data) {
                        // Đã login rồi
                        if (data == 1) {
                            hovaten = document.querySelector(".form__name").value;
                            sodienthoai = document.querySelector(".form__phone").value;
                            diachi = document.querySelector(".form__address").value;
                            ghichu = document.querySelector(".form__note").value;
                            $.ajax({
                                url: "<?php echo $domain . "/actions/actionCartPay.php" ?>",
                                type: 'POST',
                                data:{
                                    nameUser : hovaten,
                                    phoneUser : sodienthoai,
                                    addressUser : diachi,
                                    noteUser : ghichu
                                },
                                success: function(data) {
                                    window.location.href = "<?php echo $domain . "/dashboard/user.php" ?>";
                                }
                            });
                        }
                        // Chưa login
                        else {
                            alert('Vui lòng đăng nhập để thanh toán!!');
                            window.location.href = "<?php echo $domain . "/login/dangnhap.php" ?>";
                        }
                    }
                });
            }:null;
            //Quanity
            quanity.forEach(element => {
                element.disabled = true;
            });
            for (var i = 0; i < buttonDown.length; i++) {
                buttonDown[i].onclick = function() {
                    let upFor = this.getAttribute('data-upFor');
                    editWhere = this.getAttribute("data-index")
                    quanity = document.querySelector(`.${upFor}`);
                    if (quanity.value >= 2) {
                        quanity.value--;
                        $.ajax({
                            url: "<?php echo $domain . "/actions/actionCart.php" ?>",
                            type: 'POST',
                            data: {
                                aT: 1,
                                id: editWhere,
                                value: quanity.value,
                            },
                            success: function(data) {
                                if (data == 2) {
                                    notyf.open({
                                        type: 'warning',
                                        message: 'Giảm số lượng thành công',
                                        background: '#cabd22',
                                        color: 'green',
                                        icon: {
                                            className: 'notyf__icon--success',
                                            tagName: 'i',
                                            // color: 'white',
                                            text: '',
                                        }
                                    });
                                }
                                renderCart();

                            }
                        });
                    }
                }
            }
            for (var i = 0; i < buttonUp.length; i++) {
                buttonUp[i].onclick = function() {
                    let upFor = this.getAttribute('data-upFor');
                    editWhere = this.getAttribute("data-index")
                    quanity = document.querySelector(`.${upFor}`);
                    console.log(quanity.value);
                    console.log(quanity.getAttribute('max'));
                    if (+quanity.value < +quanity.getAttribute('max')) {
                        quanity.value++;
                        $.ajax({
                            url: "<?php echo $domain . "/actions/actionCart.php" ?>",
                            type: 'POST',
                            data: {
                                aT: 1,
                                id: editWhere,
                                value: quanity.value,
                            },
                            success: function(data) {
                                if (data == 2) {
                                    notyf.success('Tăng số lượng thành công');
                                }
                                renderCart();
                            }
                        });
                    } else {
                        notyf.error('Số lượng đạt tối đa');
                    }
                }
            }
            for (var i = 0; i < btnDelete.length; i++) {
                btnDelete[i].onclick = function() {
                    deleteWhere = this.getAttribute("data-index")
                    $.ajax({
                        url: "<?php echo $domain . "/actions/actionCart.php" ?>",
                        type: 'POST',
                        data: {
                            aT: 0,
                            id: deleteWhere,
                        },
                        success: function(data) {
                            notyf.error('Xóa sản phẩm thành công');
                            renderCart();
                        }
                    });
                }
            }
        }
        renderCart();
        setInterval(() => {
            renderFeauted();
        }, 100);
    });
</script>

</html>