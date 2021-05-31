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
<script src="../assets/script/jquery-3.6.0.min.js"></script>
<?php
echo "<div class='container'>";
if (count($_SESSION['cart']) === 1) {
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
    $sumPrice = 0;
    for ($i = 1; $i < count($cartItems); $i++) {
        $sumPrice += $cartItems[$i]['pricePay'];
        $cartItemId = $cartItems[$i]['id'];
        $cartItem = mysqli_fetch_assoc($connect->query("SELECT * FROM product WHERE id = $cartItemId"));
        $imageItem = substr($cartItem["image"], 1);
        $quanityId = "quanity" . $i;
        $priceItem = number_format($_SESSION['cart'][$i]['pricePay']) . "đ";
        $quanity = $cartItems[$i]['quanity'];
        $stock = $cartItems[$i]['stock'];
        echo <<<XXX
                        <div class="cart__content-item">
                            <div class="item__title colName colContent">
                                <img class="item__title-img" src="$domain$imageItem" alt="">
                                <a href="$domain/product/detail.php?id=$cartItemId">${cartItem["name"]}</a>
                            </div>
                            <div class="item__quanity colQuanity colContent">
                                <button type="button" data-index=$i data-upfor="$quanityId" class="buttonDown">-</button>
                                <input type="number" value="$quanity" min="1" max="$stock" minlength="1" maxlength="3" name="" id="" class="quanity $quanityId" pattern="[0-9]+" disabled>
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
    echo "</div>";
    $sumPriceShow = number_format($sumPrice);
    $idUserLogin = isset($_SESSION['idUserLogin']) ? $_SESSION['idUserLogin'] : 0;
    if($idUserLogin != 0){
        $dataUser = mysqli_fetch_row($connect->query("SELECT name,phone,address from user where id = $idUserLogin"));
        echo <<<XXX
                <div class="cart__infoUser">
                    <div class="cart__infoUser-title">
                        <h1>THÔNG TIN KHÁCH HÀNG</h1>
                    </div>
                    <div class="cart__infoUser-form">
                        <input type="text" class="form__name" placeholder="Họ và tên (không điền sẽ lấy mặc định)" value="$dataUser[0]"/>
                        <input type="number" class="form__phone" placeholder="Số điện thoại (không điền sẽ lấy mặc định)" value="$dataUser[1]"/>
                        <input type="text" class="form__address" placeholder="Địa chỉ (không điền sẽ lấy mặc định)" value="$dataUser[2]"/>
                        <input type="text" class="form__note" placeholder="Ghi chú đơn hàng"/>
                    </div>
                </div>
        XXX;
    }
    echo <<<XXX
                
                <div class="cart__sum">
                    <div class="cart__sum-title">
                        <h1>THỐNG KÊ</h1>
                    </div>
                    <div class="cart__sum-info">
                        <div class="info__item">
                            <div class="info__item-title">
                                Tổng tiền hàng:
                            </div>
                            <div class="info__item-price">
                                ₫$sumPriceShow
                            </div>

                        </div>
                        <div class="info__item">
                            <div class="info__item-title">
                                Phí vận chuyển:
                            </div>
                            <div class="info__item-price">
                                ₫30,000
                            </div>
                        </div>
        XXX;
    $needToPay = $sumPrice;
    if ($_SESSION['cart'][0]['code'] != '') {
        $couponCode = $_SESSION['cart'][0]['code'];
        $couponRow = mysqli_fetch_assoc($connect->query("SELECT * from voucher where code = '$couponCode'"));
        $couponSum = 0;
        $couponSumShow = 0;
        if (isset($couponRow['percent'])) {
            $couponSum = $couponRow['percent'];
            $couponSumShow = $couponSum . "%";
            $needToPay = $needToPay * (100 - $couponSum) / 100;
        } else {
            $couponSum = $couponRow['price'];
            $couponSumShow = "₫" . $couponSum;
            $needToPay -= $couponSum;
        }
        echo <<<XXX
        <div class="info__item">
        <div class="info__item-title">
        Mã giảm giá:
        </div>
        <div class="info__item-price">
        $couponSumShow
        </div>
        </div>
        XXX;
    }
    $needToPay += 30000;
    $needToPayShow = number_format($needToPay);
    echo <<<XXX
                        <div class="info__item">
                            <div class="info__item-title">
                                Tổng thanh toán:
                            </div>
                            <div class="info__item-price info__item-sum">
                                ₫$needToPayShow
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="cart__pay">
                        <div class="cart__pay-coupon">
            XXX;
    if ($_SESSION['cart'][0]['code'] != '') {
        $couponCode = $_SESSION['cart'][0]['code'];
        echo "<input value='$couponCode' type='text' name='' id='couponInp' placeholder='Nhập coupon của bạn' oninput='this.value = this.value.toUpperCase()' disabled/>";
        echo "<button class='coupon__submit'><i class='iconCoupon fas fa-times'></i></button>";
    } else {
        echo "<input type='text' name='' id='couponInp' placeholder='Nhập coupon của bạn' oninput='this.value = this.value.toUpperCase()'/>";
        echo "<button class='coupon__submit'><i class='iconCoupon fas fa-check'></i></button>";
    }
    echo <<<XXX
                        </div>
                        <button class="pay-cart">THANH TOÁN</button>
                    </div>
                    
                    </div>
                XXX;
}
?>