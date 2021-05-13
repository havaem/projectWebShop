<?php
session_start();
include("../config.php");
if (!isset($_SESSION['cart'])) {
    $cart = array();
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
</head>

<body>

    <?php
    include_once('../header.php');
    ?>
    <div class="cart">
        <?php
                echo "<div class='container'>";
                if (count($_SESSION['cart']) === 0) {
                    echo <<<XXX
                <img src="$domain/assets/image/empty-cart.png" alt="" sizes="" srcset=""
                class="cart__empty"> 
                <p class="cart__info">Không có sản phẩm nào trong giỏ
                hàng</p> 
                <a href="$domain" class="cart__button">VỀ TRANG CHỦ</a>
                XXX;
                    echo "</div>";
                } else {
                    echo <<<XXX
                    <div class="cart__header">
                        <div class="cart__header-title colName colTitle">Sản phẩm</div>
                        <div class="cart__header-price colQuanity colTitle">Số lượng</div>
                        <div class="cart__header-quanity colPrice colTitle">Đơn giá</div>
                        <div class="cart__header-action colAction colTitle">Thao tác</div>
                    </div>
                    <div class="cart__content">
                XXX;

                    $cartItems = $_SESSION['cart'];
                    for ($i = 0; $i < count($cartItems); $i++) {
                        $cartItemId = $cartItems[$i]['id'];
                        $cartItem = mysqli_fetch_assoc($connect->query("SELECT * FROM product WHERE id = $cartItemId"));
                        $imageItem = substr($cartItem["image"], 1);
                        $quanityId = "quanity" . $i;
                        $priceItem = number_format($_SESSION['cart'][$i]['pricePay']) . "đ";
                        $quanity = $cartItems[$i]['quanity'];
                        echo <<<XXX
                        <div class="cart__content-item">
                            <div class="item__title colName colContent">
                                <img class="item__title-img" src="$domain$imageItem" alt="">
                                <a href="$domain/product/detail.php?id=$cartItemId">${cartItem["name"]}</a>
                            </div>
                            <div class="item__quanity colQuanity colContent">
                                <button type="button" data-index=$i data-upfor="$quanityId" class="buttonDown">-</button>
                                <input type="number" value="$quanity" min="1" minlength="1" maxlength="3" name="" id="" class="quanity $quanityId" pattern="[0-9]+">
                                <button type="button" data-index=$i data-upfor="$quanityId" class="buttonUp">+</button>
                            </div>
                            <div class="item__price colPrice colContent priceId">
                                $priceItem
                            </div>
                            <div class="item__action colAction colContent">
                                <button class="item__action-delete" data-index=$i>XÓA</button>
                            </div>
                        </div>
                        XXX;
                    }
                    echo <<<XXX
                    </div>
                    <div class="cart__pay">
                        <input type="text" name="" id="couponInp" placeholder="Nhập coupon của bạn" oninput="this.value = this.value.toUpperCase()" />
                        <button class="pay-cart">THANH TOÁN</button>
                    </div>
                    XXX;
                }
                ?> 
    </div>
    </div>

</body>
<script>
    window.addEventListener('DOMContentLoaded', function() {
        var notyf = new Notyf({
            duration: 1500,
            ripple: true,
            dismissible: true,
            position: {
                x: 'left',
                y: 'bottom',
            },
        });
        couponInp = document.querySelector("#couponInp");
        payBtn = document.querySelector(".pay-cart");
        payBtn.onclick = () => {
            // Kiểm tra user xem đã login chưa
            $.ajax({
                url: "<?php echo $domain . "/actions/actionCheckUserLogin.php" ?>",
                type: 'POST',
                success: function(data) {
                    // Đã login rồi
                    if (data == 1) {
                        cb = couponInp.value;
                        // Kiểm tra voucher xem có tồn tại không
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
                                    notyf.success('Áp dụng coupon thành công');
                                }
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

        }


        //Quanity
        quanity = document.querySelectorAll(".quanity");
        quanity.forEach(element => {
            element.disabled = true;
        });
        buttonDown = document.querySelectorAll(".buttonDown");
        buttonUp = document.querySelectorAll(".buttonUp");
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
                            window.location.reload();
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
                            notyf.success('Thay đổi số lượng thành công');
                        }
                        setTimeout(() => {
                            window.location.reload()
                        }, 1500);
                    }
                });
            }
        }
        btnDelete = document.querySelectorAll(".item__action-delete");
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
                        window.location.reload()
                    }
                });
            }
        }
    });
</script>

</html>