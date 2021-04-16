<?php 
session_start();
include("../config.php");
$rowWatch = mysqli_fetch_all($connect->query("SELECT * from product where type = 4"));
?>
<!DOCTYPE html>
<html lang="vn">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TECHSHOP ✔</title>
    <link rel="icon" href="../assets/image/icon.png" sizes="" />
    <!-- Reset CSS -->
    <link rel="stylesheet" href="../assets/css/reset.css" />
    <!-- Source CSS -->
    <link rel="stylesheet" href="../assets/css/watch.css" />
    <!-- FontAwesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />
    <link rel="stylesheet" type="text/css" href="../assets/icon/flaticon.css" />
  </head>
  <body>
  <?php
            include_once('../header.php');
        ?>
    <div class="brand">
      <div class="container">
        <a href="" class="brand__item">
          <img
            class="brand__item-img"
            src="../assets/image/nhanhieu/Apple7077-b_26.jpg"
            alt=""
          />
        </a>
        <a href="" class="brand__item">
          <img
            class="brand__item-img"
            src="../assets/image/nhanhieu/samsung.jpg"
            alt=""
          />
        </a>
        <a href="" class="brand__item">
          <img
            class="brand__item-img"
            src="../assets/image/nhanhieu/Huawei522-b_4.jpg"
            alt=""
          />
        </a>
        <a href="" class="brand__item">
          <img
            class="brand__item-img"
            src="../assets/image/nhanhieu/oppo.jpg"
            alt=""
          />
        </a>
        <a href="" class="brand__item">
          <img
            class="brand__item-img"
            src="../assets/image/nhanhieu/Garmin.png"
            alt=""
          />
        </a>
        <a href="" class="brand__item">
          <img
            class="brand__item-img"
            src="../assets/image/nhanhieu/Xiaomi.jpg"
            alt=""
          />
        </a>
        <a href="" class="brand__item">
          <img
            class="brand__item-img"
            src="../assets/image/nhanhieu/Huami-Amazfi.jpg"
            alt=""
          />
        </a>
      </div>
    </div>
    <div class="filter">
      <div class="container">
        <h1 class="filter__title">Chọn mức giá :</h1>
        <a href="" class="filter__item"> Dưới 3 triệu </a>
        <a href="" class="filter__item"> Từ 3 đến 8 triệu </a>
        <a href="" class="filter__item"> Từ 8 đến 15 triệu </a>
        <a href="" class="filter__item"> Từ 15 đến 20 triệu </a>
        <a href="" class="filter__item"> Từ 20 đến 25 triệu </a>
        <a href="" class="filter__item"> Trên 25 triệu </a>
      </div>
    </div>
    <div class="watch">
      <div class="container">
        <div class="watch__desc">
          <div class="watch__desc-title">
            <h2>Đồng hồ còn hàng</h2>
          </div>
        </div>
        <!-- 20 items -->
        <div class="watch__content">
            <!-- <a href="#"class="watch__content-item">
                <img src="https://cdn.tgdd.vn/Products/Images/7077/229033/apple-watch-s6-lte-40mm-vien-nhom-day-cao-su-ava-400x400.jpg" class="item__img"/>
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
            </a> -->
            <?php
              foreach ($rowWatch as $watch) {
                $price = number_format($watch[4]);
                echo "
                        <a href='./detail.php?id=$watch[0]' class='watch__content-item'>
                          <img
                            src='$watch[3]'
                            class='item__img'
                          />
                          <h3 class='item__title'>$watch[2]</h3>
                          <strong class='item__price'>$price</strong>";
                        if($watch[6] == 5){
                          echo "
                          <div class='item__rate'>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='active item__rate-star fas fa-star'></i>
                            ";
                        }
                        if($watch[6] == 4){
                          echo "
                          <div class='item__rate'>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='item__rate-star fas fa-star'></i>
                            ";
                        }
                        if($watch[6] == 3){
                          echo "
                          <div class='item__rate'>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='item__rate-star fas fa-star'></i>
                            <i class='item__rate-star fas fa-star'></i>
                            ";
                        }
                        if($watch[6] == 2){
                          echo "
                          <div class='item__rate'>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='item__rate-star fas fa-star'></i>
                            <i class='item__rate-star fas fa-star'></i>
                            <i class='item__rate-star fas fa-star'></i>
                            ";
                        }
                        if($watch[6] == 1){
                          echo "
                          <div class='item__rate'>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='item__rate-star fas fa-star'></i>
                            <i class='item__rate-star fas fa-star'></i>
                            <i class='item__rate-star fas fa-star'></i>
                            <i class='item__rate-star fas fa-star'></i>
                            ";
                        }
              
                echo "
                            <span>30 đánh giá</span>
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
            include_once('../footer.php');
        ?>
  </body>
</html>
