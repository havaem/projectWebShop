<?php
session_start();
include("../config.php");
if (!isset($_SESSION['cart'])) {
    $cart = array();
    $_SESSION['cart'] = $cart;
}
?>
<script src="../assets/script/jquery-3.6.0.min.js"></script>
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