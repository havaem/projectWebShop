<?php 
session_start();
include("../config.php");
$rowTablet = mysqli_fetch_all($connect->query("SELECT * from product where type = 3"));
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
    <link rel="stylesheet" href="../assets/css/tablet.css" />
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
            src="../assets/image/nhanhieu/iPad.jpg"
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
            src="../assets/image/nhanhieu/Lenovo.jpg"
            alt=""
          />
        </a>
        <a href="" class="brand__item">
          <img
            class="brand__item-img"
            src="../assets/image/nhanhieu/Masstel.png"
            alt=""
          />
        </a>
        <a href="" class="brand__item">
          <img
            class="brand__item-img"
            src="../assets/image/nhanhieu/Mobell.jpg"
            alt=""
          />
        </a>
        <a href="" class="brand__item">
          <img
            class="brand__item-img"
            src="../assets/image/nhanhieu/LG.jpg"
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
    <div class="tablet">
      <div class="container">
        <div class="tablet__desc">
          <div class="tablet__desc-title">
            <h2>Tablet còn hàng</h2>
          </div>
        </div>
        <!-- 20 items -->
        <div class="tablet__content">
            <!-- <a href="#"class="tablet__content-item">
                <img src="https://cdn.tgdd.vn/Products/Images/522/233257/huawei-t10s-600x600-600x600.jpg" class="item__img"/>
                <h3 class="item__title">Huawei MatePad T10s (Nền tảng Huawei Mobile Service)</h3>
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
              foreach ($rowTablet as $tablet) {
                $price = number_format($tablet[4]);
                echo "
                        <a href='./detail.php?id=$tablet[0]' class='tablet__content-item'>
                          <img
                            src='$tablet[3]'
                            class='item__img'
                          />
                          <h3 class='item__title'>$tablet[2]</h3>
                          <strong class='item__price'>$price</strong>";
                        if($tablet[6] == 5){
                          echo "
                          <div class='item__rate'>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='active item__rate-star fas fa-star'></i>
                            ";
                        }
                        if($tablet[6] == 4){
                          echo "
                          <div class='item__rate'>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='item__rate-star fas fa-star'></i>
                            ";
                        }
                        if($tablet[6] == 3){
                          echo "
                          <div class='item__rate'>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='item__rate-star fas fa-star'></i>
                            <i class='item__rate-star fas fa-star'></i>
                            ";
                        }
                        if($tablet[6] == 2){
                          echo "
                          <div class='item__rate'>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='active item__rate-star fas fa-star'></i>
                            <i class='item__rate-star fas fa-star'></i>
                            <i class='item__rate-star fas fa-star'></i>
                            <i class='item__rate-star fas fa-star'></i>
                            ";
                        }
                        if($tablet[6] == 1){
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
