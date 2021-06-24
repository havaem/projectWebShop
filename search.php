<?php
session_start();
include("./config.php");
$keyword = isset($_GET['keyword']) ? strtolower($_GET['keyword']) : '';
$dataShow = mysqli_fetch_all($connect->query("SELECT * FROM `product` WHERE `name` LIKE '%$keyword%' ORDER BY `id` ASC"));

?>
<!DOCTYPE html>
<html lang="vn">

    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>TECHSHOP ✔</title>
        <link rel="icon" href="./assets/image/icon.png" sizes=""/>
        <!-- Reset CSS -->
        <link rel="stylesheet" href="./assets/css/reset.css"/>
        <!-- Source CSS -->
        <link rel="stylesheet" href="./assets/css/phone.css"/>
        <link rel="stylesheet" href="./assets/css/laptop.css"/>
        <link rel="stylesheet" href="./assets/css/tablet.css"/>
        <link rel="stylesheet" href="./assets/css/watch.css"/>
        <!-- FontAwesome -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <link rel="stylesheet" type="text/css" href="./assets/icon/flaticon.css"/>
        <script src="./assets/script/jquery-3.6.0.min.js"></script>
    </head>

    <body>
        <?php
    include_once('./header.php');
    ?>
        <div class="phone" style="padding-top:10rem">
            <div class="container">
                <div class="phone__desc">
                    <div class="phone__desc-title">
                        <h2>Kết quả tìm kiếm cho : <?=$keyword?></h2>
                    </div>
                </div>
                <div class="phone__content">
                    <?php
                        foreach ($dataShow as $item) {
                            $price = number_format($item[4]);
                            $img = substr($item[3],1);
                            $cl = '';
                            switch ($item[1]) {
                            case 1:
                                $cl = "phone";
                                break;
                            case 2:
                                $cl = "laptop";
                                break;
                            case 3:
                                $cl = "tablet";
                                break;
                            case 4:
                                $cl = "watch";
                                break;
                            case 5:
                                $cl = "pc";
                                break;
                            default:
                                break;
                            }
                            echo "
                                <a href='./product/detail.php?id=$item[0]' class='" . $cl . "__content-item'>
                                    <img
                                    src='$img'
                                    class='item__img'
                                    />
                                    <h3 class='item__title'>$item[2]</h3>
                                    <strong class='item__price'>$price ₫</strong>";
                            if ($item[6] == 5) {
                                echo "
                                    <div class='item__rate'>
                                    <i class='active item__rate-star fas fa-star'></i>
                                    <i class='active item__rate-star fas fa-star'></i>
                                    <i class='active item__rate-star fas fa-star'></i>
                                    <i class='active item__rate-star fas fa-star'></i>
                                    <i class='active item__rate-star fas fa-star'></i>
                                    ";
                            }
                            if ($item[6] == 4) {
                                echo "
                                    <div class='item__rate'>
                                    <i class='active item__rate-star fas fa-star'></i>
                                    <i class='active item__rate-star fas fa-star'></i>
                                    <i class='active item__rate-star fas fa-star'></i>
                                    <i class='active item__rate-star fas fa-star'></i>
                                    <i class='item__rate-star fas fa-star'></i>
                                    ";
                            }
                            if ($item[6] == 3) {
                                echo "
                                    <div class='item__rate'>
                                    <i class='active item__rate-star fas fa-star'></i>
                                    <i class='active item__rate-star fas fa-star'></i>
                                    <i class='active item__rate-star fas fa-star'></i>
                                    <i class='item__rate-star fas fa-star'></i>
                                    <i class='item__rate-star fas fa-star'></i>
                                    ";
                            }
                            if ($item[6] == 2) {
                                echo "
                                    <div class='item__rate'>
                                    <i class='active item__rate-star fas fa-star'></i>
                                    <i class='active item__rate-star fas fa-star'></i>
                                    <i class='item__rate-star fas fa-star'></i>
                                    <i class='item__rate-star fas fa-star'></i>
                                    <i class='item__rate-star fas fa-star'></i>
                                    ";
                            }
                            if ($item[6] == 1) {
                                echo "
                                    <div class='item__rate'>
                                    <i class='active item__rate-star fas fa-star'></i>
                                    <i class='item__rate-star fas fa-star'></i>
                                    <i class='item__rate-star fas fa-star'></i>
                                    <i class='item__rate-star fas fa-star'></i>
                                    <i class='item__rate-star fas fa-star'></i>
                                    ";
                            }
                            if ($item[6] == 0) {
                                echo "
                                    <div class='item__rate'>
                                    <i style='font-size:14px;color:#dfdfdf;' class='far fa-star'></i>
                                    <i style='font-size:14px;color:#dfdfdf;' class='far fa-star'></i>
                                    <i style='font-size:14px;color:#dfdfdf;' class='far fa-star'></i>
                                    <i style='font-size:14px;color:#dfdfdf;' class='far fa-star'></i>
                                    <i style='font-size:14px;color:#dfdfdf;' class='far fa-star'></i>
                                    ";
                            }
                            $countRate = mysqli_fetch_assoc($connect->query("SELECT COUNT(*) as count FROM rate WHERE id_product = $item[0]"));
                            echo "
                                    <span>" . $countRate['count'] . " đánh giá</span>
                                    </div>
                                </a>
                                ";
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="service">
            <div class="service-container">
                <div class="service__item">
                    <div class="service__item-icon">
                        <i class="fas fa-truck-moving"></i>
                    </div>
                    <div class="service__item-title">
                        <p>Giao hàng nhanh chóng</p>
                    </div>
                </div>
                <div class="service__item">
                    <div class="service__item-icon">
                        <i class="fas fa-piggy-bank"></i>
                    </div>
                    <div class="service__item-title">
                        <p>Thanh toán: tiền mặt, visa / master, trả góp</p>
                    </div>
                </div>
                <div class="service__item">
                    <div class="service__item-icon">
                        <i class="fas fa-tablet-alt"></i>
                    </div>
                    <div class="service__item-title">
                        <p>Trải nghiệm sản phẩm tại nhà</p>
                    </div>
                </div>
                <div class="service__item">
                    <div class="service__item-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="service__item-title">
                        <p>Lỗi đổi tại nhà nhanh chóng</p>
                    </div>
                </div>
                <div class="service__item">
                    <div class="service__item-icon">
                        <i class="fab fa-servicestack"></i>
                    </div>
                    <div class="service__item-title">
                        <p>Hỗ trợ suốt thời gian sử dụng. Hotline: 1800.1763</p>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
    include_once('./footer.php');
    ?>
        
    </body>

</html>