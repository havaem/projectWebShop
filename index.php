<?php
session_start();
include("./config.php");
if (!isset($_SESSION['cart'])) {
    $cart = array();
    $cartInfo = array();
    $cartInfo['code'] = '';
    $cartInfo['percent'] = 0;
    $cartInfo['price'] = 0;
    $cart[0] = $cartInfo;
    $_SESSION['cart'] = $cart;
}
$rowLaptop = mysqli_fetch_all($connect->query("SELECT * from product where type = 2 and isVisible = 1"));
$rowTablet = mysqli_fetch_all($connect->query("SELECT * from product where type = 3 and isVisible = 1"));
$rowWatch = mysqli_fetch_all($connect->query("SELECT * from product where type = 4 and isVisible = 1"));
$rowDisplay = mysqli_fetch_all($connect->query("SELECT * from product where type = 5 and isVisible = 1"));
// Hiển thị số sao để đổ comment cho user 
function exportStar($number)
{
    switch ($number) {
        case 0:
            return "<i style='font-size:14px;color:#dfdfdf;' class='far fa-star'></i>
                    <i style='font-size:14px;color:#dfdfdf;' class='far fa-star'></i>
                    <i style='font-size:14px;color:#dfdfdf;' class='far fa-star'></i>
                    <i style='font-size:14px;color:#dfdfdf;' class='far fa-star'></i>
                    <i style='font-size:14px;color:#dfdfdf;' class='far fa-star'></i>";
        case 1:
            return "<i class='active item__rate-star fas fa-star'></i>
                    <i class='item__rate-star fas fa-star'></i>
                    <i class='item__rate-star fas fa-star'></i>
                    <i class='item__rate-star fas fa-star'></i>
                    <i class='item__rate-star fas fa-star'></i>";
        case 2:
            return "<i class='active item__rate-star fas fa-star'></i>
                    <i class='active item__rate-star fas fa-star'></i>
                    <i class='item__rate-star fas fa-star'></i>
                    <i class='item__rate-star fas fa-star'></i>
                    <i class='item__rate-star fas fa-star'></i>";
        case 3:
            return "<i class='active item__rate-star fas fa-star'></i>
                    <i class='active item__rate-star fas fa-star'></i>
                    <i class='active item__rate-star fas fa-star'></i>
                    <i class='item__rate-star fas fa-star'></i>
                    <i class='item__rate-star fas fa-star'></i>";
        case 4:
            return "<i class='active item__rate-star fas fa-star'></i>
                    <i class='active item__rate-star fas fa-star'></i>
                    <i class='active item__rate-star fas fa-star'></i>
                    <i class='active item__rate-star fas fa-star'></i>
                    <i class='item__rate-star fas fa-star'></i>";
        case 5:
            return "<i class='active item__rate-star fas fa-star'></i>
                    <i class='active item__rate-star fas fa-star'></i>
                    <i class='active item__rate-star fas fa-star'></i>
                    <i class='active item__rate-star fas fa-star'></i>
                    <i class='active item__rate-star fas fa-star'></i>";
    }
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
    <link rel="stylesheet" href="./assets/css/index.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/icon/flaticon.css">
    <script src="./assets/script/jquery-3.6.0.min.js"></script>
</head>

<body>
    
    <button class="scrollbutton" style="z-index:99;border-radius:1rem;display:none;position: fixed; right: 1rem;bottom: 2rem;padding: 1.2rem 1.4rem;background:#D70018;outline: none;border: none;cursor:pointer">
        <i class="fas fa-sort-up" style="font-size:1.6rem;color:white;transform:translateY(45%);"></i>
    </button>
    <?php
    include_once('./header.php');
    ?>
    <div class="slide">
        <div class="container">
            <div class="slide__image">
                <img src="./assets/image/slide 1.1.png" alt="1" class="slide__image-item">
                <img src="./assets/image/slide 1.2.png" alt="2" class="slide__image-item">
                <img src="./assets/image/slide 1.3.png" alt="3" class="slide__image-item">
                <img src="./assets/image/slide 1.4.png" alt="4" class="slide__image-item">
                <img src="./assets/image/slide 1.5.png" alt="5" class="slide__image-item">
            </div>
            <div class="slide__button">
                <div class="slide__button-left">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="slide__button-right">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            <div class="slide__channel">
                <button class="slide__channel-switch">
                    <h3>Galaxy S21 Series 5G<br>Giảm Đến 7 Triệu</h3>
                </button>
                <button class="slide__channel-switch">
                    <h3>Redmi Note 10<br>Giảm Ngay 400.000đ</h3>
                </button>
                <button class="slide__channel-switch">
                    <h3>Sắm OPPO Reno5<br>Giảm Ngay 300.000đ</h3>
                </button>
                <button class="slide__channel-switch">
                    <h3>Realme C15 | C20<br>Giảm Đến 300 Ngàn</h3>
                </button>
                <button class="slide__channel-switch">
                    <h3>Sắm Laptop<br>Giảm Đến 1,6 Triệu</h3>
                </button>
            </div>
        </div>
    </div>
    <!-- <div class="hotdeal">
        <div class="container">
            <div class="hotdeal__items">
                <div class="hotdeal__item">
                    <div class="hotdeal__item-tagdeal">
                        <p class="tagdeal__hot">
                            Cháy hàng
                        </p>
                        <p class="tagdeal__tragop">
                            Trả góp <strong>0%</strong>
                        </p>
                        <p class="tagdeal__giamsoc">
                            Giảm sốc
                        </p>
                    </div>
                    <a href="#" class="hotdeal__item-item">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/228738/iphone-12-pro-xam-new-600x600-600x600.jpg" alt="Anh SP" class="item__img">
                        <h1 class="item__title">iPhone 12 Pro 256GB</h1>
                        <strong class="item__price">33.490.000₫</strong>
                        <div class="item__rate">
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <span>30 đánh giá</span>
                        </div>
                    </a>
                </div>
                <div class="hotdeal__item">
                    <div class="hotdeal__item-tagdeal">
                        <p class="tagdeal__hot">
                            Cháy hàng
                        </p>
                    </div>
                    <a href="#" class="hotdeal__item-item">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/228738/iphone-12-pro-xam-new-600x600-600x600.jpg" alt="Anh SP" class="item__img">
                        <h1 class="item__title">iPhone 12 Pro 256GB</h1>
                        <strong class="item__price">33.490.000₫</strong>
                        <div class="item__rate">
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <span>30 đánh giá</span>
                        </div>
                    </a>
                </div>
                <div class="hotdeal__item">
                    <div class="hotdeal__item-tagdeal">
                        <p class="tagdeal__giamsoc">
                            Giảm sốc
                        </p>
                    </div>
                    <a href="#" class="hotdeal__item-item">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/228738/iphone-12-pro-xam-new-600x600-600x600.jpg" alt="Anh SP" class="item__img">
                        <h1 class="item__title">iPhone 12 Pro 256GB</h1>
                        <strong class="item__price">33.490.000₫</strong>
                        <div class="item__rate">
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <span>30 đánh giá</span>
                        </div>
                    </a>
                </div>
                <div class="hotdeal__item">
                    <div class="hotdeal__item-tagdeal">
                        <p class="tagdeal__tragop">
                            Trả góp <strong>0%</strong>
                        </p>
                    </div>
                    <a href="#" class="hotdeal__item-item">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/228738/iphone-12-pro-xam-new-600x600-600x600.jpg" alt="Anh SP" class="item__img">
                        <h1 class="item__title">iPhone 12 Pro 256GB</h1>
                        <strong class="item__price">33.490.000₫</strong>
                        <div class="item__rate">
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <span>30 đánh giá</span>
                        </div>
                    </a>
                </div>
                <div class="hotdeal__item">
                    <div class="hotdeal__item-tagdeal">
                        <p class="tagdeal__tragop">
                            Trả góp <strong>0%</strong>
                        </p>
                        <p class="tagdeal__giamsoc">
                            Giảm sốc
                        </p>
                    </div>
                    <a href="#" class="hotdeal__item-item">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/228738/iphone-12-pro-xam-new-600x600-600x600.jpg" alt="Anh SP" class="item__img">
                        <h1 class="item__title">iPhone 12 Pro 256GB</h1>
                        <strong class="item__price">33.490.000₫</strong>
                        <div class="item__rate">
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <span>30 đánh giá</span>
                        </div>
                    </a>
                </div>
                <div class="hotdeal__item">
                    <div class="hotdeal__item-tagdeal">
                        <p class="tagdeal__hot">
                            Cháy hàng
                        </p>
                        <p class="tagdeal__tragop">
                            Trả góp <strong>0%</strong>
                        </p>
                        <p class="tagdeal__giamsoc">
                            Giảm sốc
                        </p>
                    </div>
                    <a href="#" class="hotdeal__item-item">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/228738/iphone-12-pro-xam-new-600x600-600x600.jpg" alt="Anh SP" class="item__img">
                        <h1 class="item__title">iPhone 12 Pro 256GB</h1>
                        <strong class="item__price">33.490.000₫</strong>
                        <div class="item__rate">
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <span>30 đánh giá</span>
                        </div>
                    </a>
                </div>
                <div class="hotdeal__item">
                    <div class="hotdeal__item-tagdeal">
                        <p class="tagdeal__hot">
                            Cháy hàng
                        </p>
                        <p class="tagdeal__tragop">
                            Trả góp <strong>0%</strong>
                        </p>
                        <p class="tagdeal__giamsoc">
                            Giảm sốc
                        </p>
                    </div>
                    <a href="#" class="hotdeal__item-item">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/228738/iphone-12-pro-xam-new-600x600-600x600.jpg" alt="Anh SP" class="item__img">
                        <h1 class="item__title">iPhone 12 Pro 256GB</h1>
                        <strong class="item__price">33.490.000₫</strong>
                        <div class="item__rate">
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <span>30 đánh giá</span>
                        </div>
                    </a>
                </div>
                <div class="hotdeal__item">
                    <div class="hotdeal__item-tagdeal">
                        <p class="tagdeal__hot">
                            Cháy hàng
                        </p>
                        <p class="tagdeal__tragop">
                            Trả góp <strong>0%</strong>
                        </p>
                        <p class="tagdeal__giamsoc">
                            Giảm sốc
                        </p>
                    </div>
                    <a href="#" class="hotdeal__item-item">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/228738/iphone-12-pro-xam-new-600x600-600x600.jpg" alt="Anh SP" class="item__img">
                        <h1 class="item__title">iPhone 12 Pro 256GB</h1>
                        <strong class="item__price">33.490.000₫</strong>
                        <div class="item__rate">
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <span>30 đánh giá</span>
                        </div>
                    </a>
                </div>
                <div class="hotdeal__item">
                    <div class="hotdeal__item-tagdeal">
                        <p class="tagdeal__hot">
                            Cháy hàng
                        </p>
                        <p class="tagdeal__tragop">
                            Trả góp <strong>0%</strong>
                        </p>
                        <p class="tagdeal__giamsoc">
                            Giảm sốc
                        </p>
                    </div>
                    <a href="#" class="hotdeal__item-item">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/228738/iphone-12-pro-xam-new-600x600-600x600.jpg" alt="Anh SP" class="item__img">
                        <h1 class="item__title">iPhone 12 Pro 256GB</h1>
                        <strong class="item__price">33.490.000₫</strong>
                        <div class="item__rate">
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <span>30 đánh giá</span>
                        </div>
                    </a>
                </div>
                <div class="hotdeal__item">
                    <div class="hotdeal__item-tagdeal">
                        <p class="tagdeal__hot">
                            Cháy hàng
                        </p>
                        <p class="tagdeal__tragop">
                            Trả góp <strong>0%</strong>
                        </p>
                        <p class="tagdeal__giamsoc">
                            Giảm sốc
                        </p>
                    </div>
                    <a href="#" class="hotdeal__item-item">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/228738/iphone-12-pro-xam-new-600x600-600x600.jpg" alt="Anh SP" class="item__img">
                        <h1 class="item__title">iPhone 12 Pro 256GB</h1>
                        <strong class="item__price">33.490.000₫</strong>
                        <div class="item__rate">
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <span>30 đánh giá</span>
                        </div>
                    </a>
                </div>
                <div class="hotdeal__item">
                    <div class="hotdeal__item-tagdeal">
                        <p class="tagdeal__hot">
                            Cháy hàng
                        </p>
                        <p class="tagdeal__tragop">
                            Trả góp <strong>0%</strong>
                        </p>
                        <p class="tagdeal__giamsoc">
                            Giảm sốc
                        </p>
                    </div>
                    <a href="#" class="hotdeal__item-item">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/228738/iphone-12-pro-xam-new-600x600-600x600.jpg" alt="Anh SP" class="item__img">
                        <h1 class="item__title">iPhone 12 Pro 256GB</h1>
                        <strong class="item__price">33.490.000₫</strong>
                        <div class="item__rate">
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <span>30 đánh giá</span>
                        </div>
                    </a>
                </div>
                <div class="hotdeal__item">
                    <div class="hotdeal__item-tagdeal">
                        <p class="tagdeal__hot">
                            Cháy hàng
                        </p>
                        <p class="tagdeal__tragop">
                            Trả góp <strong>0%</strong>
                        </p>
                        <p class="tagdeal__giamsoc">
                            Giảm sốc
                        </p>
                    </div>
                    <a href="#" class="hotdeal__item-item">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/228738/iphone-12-pro-xam-new-600x600-600x600.jpg" alt="Anh SP" class="item__img">
                        <h1 class="item__title">iPhone 12 Pro 256GB</h1>
                        <strong class="item__price">33.490.000₫</strong>
                        <div class="item__rate">
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <span>30 đánh giá</span>
                        </div>
                    </a>
                </div>
                <div class="hotdeal__item">
                    <div class="hotdeal__item-tagdeal">
                        <p class="tagdeal__hot">
                            Cháy hàng
                        </p>
                        <p class="tagdeal__tragop">
                            Trả góp <strong>0%</strong>
                        </p>
                        <p class="tagdeal__giamsoc">
                            Giảm sốc
                        </p>
                    </div>
                    <a href="#" class="hotdeal__item-item">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/228738/iphone-12-pro-xam-new-600x600-600x600.jpg" alt="Anh SP" class="item__img">
                        <h1 class="item__title">iPhone 12 Pro 256GB</h1>
                        <strong class="item__price">33.490.000₫</strong>
                        <div class="item__rate">
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <span>30 đánh giá</span>
                        </div>
                    </a>
                </div>
                <div class="hotdeal__item">
                    <div class="hotdeal__item-tagdeal">
                        <p class="tagdeal__hot">
                            Cháy hàng
                        </p>
                        <p class="tagdeal__tragop">
                            Trả góp <strong>0%</strong>
                        </p>
                        <p class="tagdeal__giamsoc">
                            Giảm sốc
                        </p>
                    </div>
                    <a href="#" class="hotdeal__item-item">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/228738/iphone-12-pro-xam-new-600x600-600x600.jpg" alt="Anh SP" class="item__img">
                        <h1 class="item__title">iPhone 12 Pro 256GB</h1>
                        <strong class="item__price">33.490.000₫</strong>
                        <div class="item__rate">
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <span>30 đánh giá</span>
                        </div>
                    </a>
                </div>
                <div class="hotdeal__item">
                    <div class="hotdeal__item-tagdeal">
                        <p class="tagdeal__hot">
                            Cháy hàng
                        </p>
                        <p class="tagdeal__tragop">
                            Trả góp <strong>0%</strong>
                        </p>
                        <p class="tagdeal__giamsoc">
                            Giảm sốc
                        </p>
                    </div>
                    <a href="#" class="hotdeal__item-item">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/228738/iphone-12-pro-xam-new-600x600-600x600.jpg" alt="Anh SP" class="item__img">
                        <h1 class="item__title">iPhone 12 Pro 256GB</h1>
                        <strong class="item__price">33.490.000₫</strong>
                        <div class="item__rate">
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <span>30 đánh giá</span>
                        </div>
                    </a>
                </div>
                <div class="hotdeal__item">
                    <div class="hotdeal__item-tagdeal">
                        <p class="tagdeal__hot">
                            Cháy hàng
                        </p>
                        <p class="tagdeal__tragop">
                            Trả góp <strong>0%</strong>
                        </p>
                        <p class="tagdeal__giamsoc">
                            Giảm sốc
                        </p>
                    </div>
                    <a href="#" class="hotdeal__item-item">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/228738/iphone-12-pro-xam-new-600x600-600x600.jpg" alt="Anh SP" class="item__img">
                        <h1 class="item__title">iPhone 12 Pro 256GB</h1>
                        <strong class="item__price">33.490.000₫</strong>
                        <div class="item__rate">
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <span>30 đánh giá</span>
                        </div>
                    </a>
                </div>
                <div class="hotdeal__item">
                    <div class="hotdeal__item-tagdeal">
                        <p class="tagdeal__hot">
                            Cháy hàng
                        </p>
                        <p class="tagdeal__tragop">
                            Trả góp <strong>0%</strong>
                        </p>
                        <p class="tagdeal__giamsoc">
                            Giảm sốc
                        </p>
                    </div>
                    <a href="#" class="hotdeal__item-item">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/228738/iphone-12-pro-xam-new-600x600-600x600.jpg" alt="Anh SP" class="item__img">
                        <h1 class="item__title">iPhone 12 Pro 256GB</h1>
                        <strong class="item__price">33.490.000₫</strong>
                        <div class="item__rate">
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <span>30 đánh giá</span>
                        </div>
                    </a>
                </div>
                <div class="hotdeal__item">
                    <div class="hotdeal__item-tagdeal">
                        <p class="tagdeal__hot">
                            Cháy hàng
                        </p>
                        <p class="tagdeal__tragop">
                            Trả góp <strong>0%</strong>
                        </p>
                        <p class="tagdeal__giamsoc">
                            Giảm sốc
                        </p>
                    </div>
                    <a href="#" class="hotdeal__item-item">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/228738/iphone-12-pro-xam-new-600x600-600x600.jpg" alt="Anh SP" class="item__img">
                        <h1 class="item__title">iPhone 12 Pro 256GB</h1>
                        <strong class="item__price">33.490.000₫</strong>
                        <div class="item__rate">
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <span>30 đánh giá</span>
                        </div>
                    </a>
                </div>
                <div class="hotdeal__item">
                    <div class="hotdeal__item-tagdeal">
                        <p class="tagdeal__hot">
                            Cháy hàng
                        </p>
                        <p class="tagdeal__tragop">
                            Trả góp <strong>0%</strong>
                        </p>
                        <p class="tagdeal__giamsoc">
                            Giảm sốc
                        </p>
                    </div>
                    <a href="#" class="hotdeal__item-item">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/228738/iphone-12-pro-xam-new-600x600-600x600.jpg" alt="Anh SP" class="item__img">
                        <h1 class="item__title">iPhone 12 Pro 256GB</h1>
                        <strong class="item__price">33.490.000₫</strong>
                        <div class="item__rate">
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <span>30 đánh giá</span>
                        </div>
                    </a>
                </div>
                <div class="hotdeal__item">
                    <div class="hotdeal__item-tagdeal">
                        <p class="tagdeal__hot">
                            Cháy hàng
                        </p>
                        <p class="tagdeal__tragop">
                            Trả góp <strong>0%</strong>
                        </p>
                        <p class="tagdeal__giamsoc">
                            Giảm sốc
                        </p>
                    </div>
                    <a href="#" class="hotdeal__item-item">
                        <img src="https://cdn.tgdd.vn/Products/Images/42/228738/iphone-12-pro-xam-new-600x600-600x600.jpg" alt="Anh SP" class="item__img">
                        <h1 class="item__title">iPhone 12 Pro 256GB</h1>
                        <strong class="item__price">33.490.000₫</strong>
                        <div class="item__rate">
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="active item__rate-star fas fa-star"></i>
                            <i class="item__rate-star fas fa-star"></i>
                            <span>30 đánh giá</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="hotdeal__item-button">
                <button class="button__left">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="button__right">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div> -->
    <div class="hotphone" style="margin-top:2rem;">
        <div class="container">
            <div class="hotphone__desc">
                <div class="hotphone__desc-title">
                    <h2>Điện thoại nổi bật nhất</h2>
                </div>
                <div class="hotphone__desc-phone">
                    <?php
                    $titlePhone = mysqli_fetch_all($connect->query("SELECT id,name from product where type = 1 and id!=25 and isVisible = 1 order by view asc limit 4"));
                    for ($i = 0; $i < 4; $i++) {
                        echo "<a href='./product/detail.php?id=" . $titlePhone[$i][0] . "'>" . $titlePhone[$i][1] . "</a>";
                    }
                    $sumPhone = mysqli_fetch_assoc($connect->query("SELECT COUNT(name) as count FROM product WHERE type=1 and isVisible = 1"));
                    echo "<a href='./product/phone.php'>Xem tất cả <strong>" . $sumPhone['count'] . "</strong> điện thoại</a>";
                    ?>
                </div>
            </div>
            <div class="hotphone__content">
                <a href="./product/detail.php?id=25" class="hotphone__content-item big">
                    <img src="https://cdn.tgdd.vn/Products/Images/42/220438/Feature/oppo-reno5-ft-4g.jpg" class="item__img" />
                    <h3 class="item__title">OPPO Reno5</h3>
                    <strong class="item__price">8.690.000₫</strong>
                    <div class="item__rate">
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="item__rate-star fas fa-star"></i>
                        <span>30 đánh giá</span>
                    </div>
                </a>
                <?php
                $resultPhone = $connect->query("SELECT * from product where type = 1 and id!=25 and isVisible = 1 order by view desc limit 6");
                for ($i = 0; $i < 3; $i++) {
                    $rowPhone = mysqli_fetch_assoc($resultPhone);
                    $countRate = mysqli_fetch_assoc($connect->query("SELECT COUNT(*) as count FROM rate WHERE id_product = ${rowPhone['id']}"));
                    echo "<a href='./product/detail.php?id=" . $rowPhone['id'] . "'class='hotphone__content-item'>
                                    <img src='" . substr($rowPhone['image'], 1) . "' class='item__img'/>
                                    <h3 class='item__title'>" . $rowPhone['name'] . "</h3>
                                    <strong class='item__price'>" . number_format($rowPhone['price']) . "₫</strong>
                                        <div class='item__rate'>
                                            " . exportStar($rowPhone['rate']) . "
                                            <span>" . $countRate['count'] . " đánh giá</span>
                                        </div>
                                </a>";
                }
                ?>
                <a href="./product/detail.php?id=167" class="hotphone__content-item big">
                    <img src="https://cdn.tgdd.vn/Products/Images/42/234315/Feature/samsung-galaxy-a32-4g-ft.jpg" class="item__img" />
                    <h3 class="item__title">Samsung Galaxy A32</h3>
                    <strong class="item__price">6.690.000₫</strong>
                    <div class="item__rate">
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="item__rate-star fas fa-star"></i>
                        <span>30 đánh giá</span>
                    </div>
                </a>
                <?php
                for ($i = 0; $i < 3; $i++) {
                    $rowPhone = mysqli_fetch_assoc($resultPhone);
                    $countRate = mysqli_fetch_assoc($connect->query("SELECT COUNT(*) as count FROM rate WHERE id_product = ${rowPhone['id']}"));
                    echo "<a href='./product/detail.php?id=" . $rowPhone['id'] . "'class='hotphone__content-item'>
                                    <img src='" . substr($rowPhone['image'], 1) . "' class='item__img'/>
                                    <h3 class='item__title'>" . $rowPhone['name'] . "</h3>
                                    <strong class='item__price'>" . number_format($rowPhone['price']) . "₫</strong>
                                        <div class='item__rate'>
                                            " . exportStar($rowPhone['rate']) . "
                                            <span>" . $countRate['count'] . " đánh giá</span>
                                        </div>
                                </a>";
                }
                ?>
            </div>
            <div class="hotphone__more">
                <?php
                echo "<a href='#'>Xem tất cả <strong>" . $sumPhone['count'] . "</strong> điện thoại</a>";
                ?>
            </div>
        </div>
    </div>

    <div class="hotlaptop">
        <div class="container">
            <div class="hotlaptop__desc">
                <div class="hotlaptop__desc-title">
                    <h2>Laptop nổi bật nhất</h2>
                </div>
                <div class="hotlaptop__desc-laptop">
                    <?php
                    $resultLaptop = $connect->query("SELECT * from product where type = 2 and isVisible = 1 order by view desc limit 6");
                    $titleLaptop = mysqli_fetch_all($connect->query("SELECT id,name from product where type = 2 and isVisible = 1 order by view asc limit 1"));
                    for ($i = 0; $i < 1; $i++) {
                        echo "<a href='./product/detail.php?id=" . $titleLaptop[$i][0] . "'>" . $titleLaptop[$i][1] . "</a>";
                    }
                    $sumLaptop = mysqli_fetch_assoc($connect->query("SELECT COUNT(name) as count FROM product WHERE type=2 and isVisible = 1"));
                    echo "<a href='./product/laptop.php'>Xem tất cả <strong>" . $sumLaptop['count'] . "</strong> laptop</a>";
                    ?>
                    <!--  <a href="#">Laptop Asus</a>
                        <a href="#">Laptop HP</a>
                        <a href="#">Laptop Lenovo</a>
                        <a href="#">Macbook Pro</a>
                        <a href="#">Xem tất cả <strong>100</strong> laptop</a> -->
                </div>
            </div>
            <div class="hotlaptop__content">
                <a href="#" class="hotlaptop__content-item big">
                    <img src="https://cdn.tgdd.vn/Products/Images/44/232192/Feature/lenovo-3-2021.jpg" class="item__img" />
                    <h3 class="item__title">Lenovo IdeaPad Slim 5 15ITL05 (82FG001PVN)</h3>
                    <strong class="item__price">17.690.000₫</strong>
                    <div class="item__rate">
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="item__rate-star fas fa-star"></i>
                        <span>30 đánh giá</span>
                    </div>
                </a>
                <?php
                for ($i = 0; $i < 3; $i++) {
                    $rowLaptop = mysqli_fetch_assoc($resultLaptop);
                    $countRate = mysqli_fetch_assoc($connect->query("SELECT COUNT(*) as count FROM rate WHERE id_product = ${rowPhone['id']}"));
                    echo "<a href='./product/detail.php?id=" . $rowLaptop['id'] . "'class='hotlaptop__content-item'>
                                    <img src='" . substr($rowLaptop['image'], 1) . "' class='item__img'/>
                                    <h3 class='item__title'>" . $rowLaptop['name'] . "</h3>
                                    <strong class='item__price'>" . number_format($rowLaptop['price']) . "₫</strong>
                                        <div class='item__rate'>
                                            " . exportStar($rowLaptop['rate']) . "
                                            <span>" . $countRate['count'] . " đánh giá</span>
                                        </div>
                                </a>";
                }
                ?>
            </div>
            <div class="hotlaptop__more">
                <?php
                echo "<a href='./product/laptop.php'>Xem tất cả <strong>" . $sumLaptop['count'] . "</strong> laptop</a>";
                ?>
            </div>
        </div>
    </div>

    <div class="hottablet">
        <div class="container">
            <div class="hottablet__desc">
                <div class="hottablet__desc-title">
                    <h2>Tablet nổi bật nhất</h2>
                </div>
                <div class="hottablet__desc-tablet">
                    <?php
                    $titleTablet = mysqli_fetch_all($connect->query("SELECT id,name from product where type = 3 and isVisible = 1 order by view asc limit 4"));
                    for ($i = 0; $i < 4; $i++) {
                        echo "<a href='./product/detail.php?id=" . $titleTablet[$i][0] . "'>" . $titleTablet[$i][1] . "</a>";
                    }
                    $sumTablet = mysqli_fetch_assoc($connect->query("SELECT COUNT(name) as count FROM product WHERE type=3 and isVisible = 1"));
                    echo "<a href='./product/tablet.php'>Xem tất cả <strong>" . $sumTablet['count'] . "</strong> tablet</a>";
                    ?>
                </div>
            </div>
            <div class="hottablet__content">
                <a href="./product/detail.php?id=166" class="hottablet__content-item big">
                    <img src="https://cdn.tgdd.vn/Products/Images/522/228144/Feature/samsung-galaxy-tab-a7-2020-ft.jpg" class="item__img" />
                    <h3 class="item__title">Samsung Galaxy Tab A7 (2020)</h3>
                    <strong class="item__price">7.390.000₫</strong>
                    <div class="item__rate">
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="item__rate-star fas fa-star"></i>
                        <span>30 đánh giá</span>
                    </div>
                </a>
                <?php
                $resultTablet = $connect->query("SELECT * from product where type = 3 and id != 166 and isVisible = 1 order by view desc limit 6");
                for ($i = 0; $i < 3; $i++) {
                    $rowTablet = mysqli_fetch_assoc($resultTablet);
                    $countRate = mysqli_fetch_assoc($connect->query("SELECT COUNT(*) as count FROM rate WHERE id_product = ${rowTablet['id']}"));
                    echo "<a href='./product/detail.php?id=" . $rowTablet['id'] . "'class='hottablet__content-item'>
                                    <img src='" . substr($rowTablet['image'], 1) . "' class='item__img'/>
                                    <h3 class='item__title'>" . $rowTablet['name'] . "</h3>
                                    <strong class='item__price'>" . number_format($rowTablet['price']) . "₫</strong>
                                        <div class='item__rate'>
                                            " . exportStar($rowTablet['rate']) . "
                                            <span>" . $countRate['count'] . " đánh giá</span>
                                        </div>
                                </a>";
                }
                ?>
            </div>
            <div class="hottablet__more">
                <?php echo "<a href='./product/tablet.php'>Xem tất cả <strong>" . $sumTablet['count'] . "</strong> máy tính bảng</a>"; ?>
            </div>
        </div>
    </div>

    <div class="hotwatch">
        <div class="container">
            <div class="hotwatch__desc">
                <div class="hotwatch__desc-title">
                    <h2>Đồng hồ thông minh</h2>
                </div>
                <div class="hotwatch__desc-watch">
                    <?php
                    $titleWatch = mysqli_fetch_all($connect->query("SELECT id,name from product where type = 4 and isVisible = 1 order by view asc limit 3"));
                    for ($i = 0; $i < 2; $i++) {
                        echo "<a href='./product/detail.php?id=" . $titleWatch[$i][0] . "'>" . $titleWatch[$i][1] . "</a>";
                    }
                    $sumWatch = mysqli_fetch_assoc($connect->query("SELECT COUNT(name) as count FROM product WHERE type=4 and isVisible = 1"));
                    echo "<a href='./product/watch.php'>Xem tất cả <strong>" . $sumWatch['count'] . "</strong> đồng hồ thông minh.</a>";
                    ?>
                </div>
            </div>

            <div class="hotwatch__content">
                <?php
                $resultWatch = $connect->query("SELECT * from product where type = 4 and isVisible = 1 order by view desc limit 5");
                for ($i = 0; $i < 5; $i++) {
                    $rowWatch = mysqli_fetch_assoc($resultWatch);
                    $countRate = mysqli_fetch_assoc($connect->query("SELECT COUNT(*) as count FROM rate WHERE id_product = ${rowWatch['id']}"));
                    echo "<a href='./product/detail.php?id=" . $rowWatch['id'] . "'class='hotwatch__content-item'>
                                    <img src='" . substr($rowWatch['image'], 1) . "' class='item__img'/>
                                    <h3 class='item__title'>" . $rowWatch['name'] . "</h3>
                                    <strong class='item__price'>" . number_format($rowWatch['price']) . "₫</strong>
                                        <div class='item__rate'>
                                            " . exportStar($rowWatch['rate']) . "
                                            <span>" . $countRate['count'] . " đánh giá</span>
                                        </div>
                                </a>";
                }
                ?>
            </div>
            <div class="hotwatch__more">
                <?php echo "<a href='./product/watch.php'>Xem tất cả <strong>" . $sumWatch['count'] . "</strong> đồng hồ</a>"; ?>
            </div>
        </div>
    </div>

    <!-- <div class="hotpc">
        <div class="container">
            <div class="hotpc__desc">
                <div class="hotpc__desc-title">
                    <h2>Máy tính</h2>
                </div>
                <div class="hotpc__desc-pc">
                    <a href="#">Dell</a>
                    <a href="#">Acer</a>
                    <a href="#">Aus</a>
                    <a href="#">iMac</a>
                    <a href="#">Xem tất cả <strong>100</strong> máy tính</a>
                </div>
            </div>

            <div class="hotpc__content">
                <a href="#" class="hotpc__content-item">
                    <img src="https://cdn.tgdd.vn/Products/Images/5697/228346/lcd-samsung-gaming-24-inch-full-hd-144hz-4ms-lc24-093020-113031-400x400.jpg" class="item__img" />
                    <h3 class="item__title">Apple Watch S6 LTE 40mm viền nhôm dây cao su xanh</h3>
                    <strong class="item__price">5.190.000₫</strong>
                    <div class="item__rate">
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="item__rate-star fas fa-star"></i>
                        <span>30 đánh giá</span>
                    </div>
                </a>
                <a href="#" class="hotpc__content-item">
                    <img src="https://cdn.tgdd.vn/Products/Images/5697/236191/viewsonic-lcd-gaming-vx2458-p-mhd-24-inch-full-hd-400x400.jpg" class="item__img" />
                    <h3 class="item__title">Đồng hồ thông minh Mi Watch</h3>
                    <strong class="item__price">5.190.000₫</strong>
                    <div class="item__rate">
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="item__rate-star fas fa-star"></i>
                        <span>30 đánh giá</span>
                    </div>
                </a>
                <a href="#" class="hotpc__content-item">
                    <img src="https://cdn.tgdd.vn/Products/Images/5697/231411/lcd-asus-tuf-gaming-vg249q1r-238-inch-full-hd-165h-1-400x400.jpg" class="item__img" />
                    <h3 class="item__title">Samsung Galaxy Watch Active 2 40mm viền nhôm dây silicone</h3>
                    <strong class="item__price">5.190.000₫</strong>
                    <div class="item__rate">
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="item__rate-star fas fa-star"></i>
                        <span>30 đánh giá</span>
                    </div>
                </a>
                <a href="#" class="hotpc__content-item">
                    <img src="https://cdn.tgdd.vn/Products/Images/5697/236192/viewsonic-lcd-gaming-xg2405-24-inch-full-hd-144hz-400x400.jpg" class="item__img" />
                    <h3 class="item__title">Samsung Galaxy Watch 3 41mm viền thép bạc dây da</h3>
                    <strong class="item__price">9.090.000₫</strong>
                    <div class="item__rate">
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="item__rate-star fas fa-star"></i>
                        <span>30 đánh giá</span>
                    </div>
                </a>
                <a href="#" class="hotpc__content-item">
                    <img src="https://cdn.tgdd.vn/Products/Images/5697/219440/asus-tuf-gaming-full-hd-238-inch-144hz-vg249q-090820-020848-400x400.jpg" class="item__img" />
                    <h3 class="item__title">Apple Watch S5 LTE 44mm viền nhôm dây cao su hồng</h3>
                    <strong class="item__price">5.190.000₫</strong>
                    <div class="item__rate">
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="active item__rate-star fas fa-star"></i>
                        <i class="item__rate-star fas fa-star"></i>
                        <span>30 đánh giá</span>
                    </div>
                </a>
            </div>
        </div>
    </div> -->

    <?php
    include_once('./footer.php');
    ?>

    <script src="./assets/script/index.js"></script>
</body>

</html>