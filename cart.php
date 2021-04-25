<?php
session_start();
include("./config.php");
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
    <link rel="icon" href="./assets/image/icon.png" sizes="">
    <!-- Reset CSS -->
    <link rel="stylesheet" href="./assets/css/reset.css">
    <!-- Source CSS -->
    <link rel="stylesheet" href="./assets/css/cart.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/icon/flaticon.css">
    <script src="./assets/script/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php
    include_once('./header.php');
    ?>
    <div class="cart">
        <div class="container">
            <!-- <img src="./assets/image/empty-cart.png" alt="" sizes="" srcset=""
                class="cart__empty"> <p class="cart__info">Không có sản phẩm nào trong giỏ
                hàng</p> <a href="<?php echo $domain; ?>" class="cart__button">VỀ TRANG CHỦ</a>
                -->
            <div class="cart__header">
                <div class="cart__header-title colName colTitle">Sản phẩm</div>
                <div class="cart__header-price colQuanity colTitle">Số lượng</div>
                <div class="cart__header-quanity colPrice colTitle">Đơn giá</div>
                <div class="cart__header-action colAction colTitle">Thao tác</div>
            </div>
            <div class="cart__content">
                <!--                 <div class="cart__content-item">
                    <div class="item__title colName colContent">
                        <img class="item__title-img" src="http://localhost/projectWebshop/assets/image/products/phone/iPhone-12-Pro-Max-128GB/n%E1%BB%81n.jpg" alt="">
                        <a href="">
                            Mi 11 5G
                        </a>
                    </div>
                    <div class="item__quanity colQuanity colContent">
                        <button type="button" data-upfor="quanity1" class="buttonDown">-</button>
                        <input type="number" value="1" min="1" minlength="1" maxlength="3" class="quanity quanity1" pattern="[0-9]+">
                        <button type="button" data-upfor="quanity1" class="buttonUp">+</button>
                    </div>
                    <div class="item__price colPrice colContent">
                        20,990,000 đ<br />
                        <p style="text-decoration: line-through; font-size:1.3rem;">25,990,000 đ</p>
                    </div>
                    <div class="item__action colAction colContent">
                        <button>XÓA</button>
                    </div>
                </div> -->
                <?php
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
                            <img class="item__title-img" src="$imageItem" alt="">
                            <a href="">${cartItem["name"]}</a>
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
                ?>

            </div>
            <div class="cart__pay">
                <input type="text" name="" id="" placeholder="Nhập voucher của bạn">
                <button>THANH TOÁN</button>
            </div>

        </div>
    </div>

</body>
<script>
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
                    url: "<?php echo $domain . "/product/cartAction.php" ?>",
                    type: 'POST',
                    data: {
                        aT: 1,
                        id: editWhere,
                        value : quanity.value,
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
                    url: "<?php echo $domain . "/product/cartAction.php" ?>",
                    type: 'POST',
                    data: {
                        aT: 1,
                        id: editWhere,
                        value : quanity.value,
                    },
                    success: function(data) {
                        window.location.reload();
                    }
                });
        }
    }
    btnDelete = document.querySelectorAll(".item__action-delete");
    for (var i = 0; i < btnDelete.length; i++) {
        btnDelete[i].onclick = function() {
            deleteWhere = this.getAttribute("data-index")
            $.ajax({
                url: "<?php echo $domain . "/product/cartAction.php" ?>",
                type: 'POST',
                data: {
                    aT: 0,
                    id: deleteWhere,
                },
                success: function(data) {
                    window.location.reload();
                }
            });
        }
    }
</script>

</html>