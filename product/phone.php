<?php
session_start();
include("../config.php");
$rowPhone = mysqli_fetch_all($connect->query("SELECT * from product where type = 1"));
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
  <link rel="stylesheet" href="../assets/css/phone.css" />
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link rel="stylesheet" type="text/css" href="../assets/icon/flaticon.css" />
</head>

<body>
  <?php
  include_once('../header.php');
  ?>
  <div class="brand">
    <div class="container">
      <a href="" class="brand__item">
        <img class="brand__item-img" src="../assets/image/nhanhieu/iphone.jpg" alt="" />
      </a>
      <a href="" class="brand__item">
        <img class="brand__item-img" src="../assets/image/nhanhieu/samsung.jpg" alt="" />
      </a>
      <a href="" class="brand__item">
        <img class="brand__item-img" src="../assets/image/nhanhieu/oppo.jpg" alt="" />
      </a>
      <a href="" class="brand__item">
        <img class="brand__item-img" src="../assets/image/nhanhieu/Xiaomi42-b_45.jpg" alt="" />
      </a>
      <a href="" class="brand__item">
        <img class="brand__item-img" src="../assets/image/nhanhieu/Realme42-b_37.png" alt="" />
      </a>
      <a href="" class="brand__item">
        <img class="brand__item-img" src="../assets/image/nhanhieu/Vsmart42-b_40.png" alt="" />
      </a>
      <a href="" class="brand__item">
        <img class="brand__item-img" src="../assets/image/nhanhieu/Nokia42-b_21.jpg" alt="" />
      </a>
    </div>
  </div>
  <div class="filter">
    <div class="container">
      <h1 class="filter__title">Chọn mức giá :</h1>
      <a href="" class="filter__item"> Dưới 2 triệu </a>
      <a href="" class="filter__item"> Từ 2 đến 4 triệu </a>
      <a href="" class="filter__item"> Từ 4 đến 7 triệu </a>
      <a href="" class="filter__item"> Từ 7 đến 13 triệu </a>
      <a href="" class="filter__item"> Từ 13 đến 20 triệu </a>
      <a href="" class="filter__item"> Trên 20 triệu </a>
    </div>
  </div>
  <div class="phone">
    <div class="container">
      <div class="phone__desc">
        <div class="phone__desc-title">
          <h2>Điện thoại còn hàng</h2>
        </div>
      </div>
      <div class="phone__content">
        <!-- <a href="#" class="phone__content-item">
            <img
              src="https://cdn.tgdd.vn/Products/Images/42/213031/iphone-12-xanh-duong-new-600x600-600x600.jpg"
              class="item__img"
            />
            <h3 class="item__title">Samsung Galaxy S21 Ultra 5G 128GB</h3>
            <strong class="item__price">27.990.000₫</strong>
            <div class="item__rate">
              <i class="active item__rate-star fas fa-star"></i>
              <i class="active item__rate-star fas fa-star"></i>
              <i class="active item__rate-star fas fa-star"></i>
              <i class="active item__rate-star fas fa-star"></i>
              <i class="item__rate-star fas fa-star"></i>
              <span>30 đánh giá</span>
            </div>
          </a>
          <a href="#" class="phone__content-item">
            <img
              src="https://cdn.tgdd.vn/Products/Images/42/213031/iphone-12-xanh-duong-new-600x600-600x600.jpg"
              class="item__img"
            />
            <h3 class="item__title">iPhone 12 64GB</h3>
            <strong class="item__price">22.490.000₫</strong>
            <div class="item__rate">
              <i class="active item__rate-star fas fa-star"></i>
              <i class="active item__rate-star fas fa-star"></i>
              <i class="active item__rate-star fas fa-star"></i>
              <i class="active item__rate-star fas fa-star"></i>
              <i class="item__rate-star fas fa-star"></i>
              <span>30 đánh giá</span>
            </div>
          </a>
          <a href="#" class="phone__content-item">
            <img
              src="https://cdn.tgdd.vn/Products/Images/42/229228/xiaomi-redmi-note-10-pro-thumb-xam-600x600-600x600.jpg"
              class="item__img"
            />
            <h3 class="item__title">Xiaomi Redmi Note 10 Pro (8GB/128GB)</h3>
            <strong class="item__price">7.490.000₫</strong>
            <div class="item__rate">
              <i class="active item__rate-star fas fa-star"></i>
              <i class="active item__rate-star fas fa-star"></i>
              <i class="active item__rate-star fas fa-star"></i>
              <i class="active item__rate-star fas fa-star"></i>
              <i class="item__rate-star fas fa-star"></i>
              <span>30 đánh giá</span>
            </div>
          </a>
          <a href="#" class="phone__content-item">
            <img
              src="https://cdn.tgdd.vn/Products/Images/42/226436/vsmart-live-4-xanh-la-600x600.jpg"
              class="item__img"
            />
            <h3 class="item__title">OPPO A15</h3>
            <strong class="item__price">3.490.000₫</strong>
            <div class="item__rate">
              <i class="active item__rate-star fas fa-star"></i>
              <i class="active item__rate-star fas fa-star"></i>
              <i class="active item__rate-star fas fa-star"></i>
              <i class="active item__rate-star fas fa-star"></i>
              <i class="item__rate-star fas fa-star"></i>
              <span>30 đánh giá</span>
            </div>
          </a>
          <a href="#" class="phone__content-item">
            <img
              src="https://cdn.tgdd.vn/Products/Images/42/228950/vivo-y51-bac-600x600-600x600.jpg"
              class="item__img"
            />
            <h3 class="item__title">Vsmart Live 4 4GB</h3>
            <strong class="item__price">4.090.000₫</strong>
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
        foreach ($rowPhone as $phone) {
          $price = number_format($phone[4]);
          echo "
                  <a href='./detail.php?id=$phone[0]' class='phone__content-item'>
                    <img
                      src='$phone[3]'
                      class='item__img'
                    />
                    <h3 class='item__title'>$phone[2]</h3>
                    <strong class='item__price'>$price</strong>";
                  if($phone[6] == 5){
                    echo "
                    <div class='item__rate'>
                      <i class='active item__rate-star fas fa-star'></i>
                      <i class='active item__rate-star fas fa-star'></i>
                      <i class='active item__rate-star fas fa-star'></i>
                      <i class='active item__rate-star fas fa-star'></i>
                      <i class='active item__rate-star fas fa-star'></i>
                      ";
                  }
                  if($phone[6] == 4){
                    echo "
                    <div class='item__rate'>
                      <i class='active item__rate-star fas fa-star'></i>
                      <i class='active item__rate-star fas fa-star'></i>
                      <i class='active item__rate-star fas fa-star'></i>
                      <i class='active item__rate-star fas fa-star'></i>
                      <i class='item__rate-star fas fa-star'></i>
                      ";
                  }
                  if($phone[6] == 3){
                    echo "
                    <div class='item__rate'>
                      <i class='active item__rate-star fas fa-star'></i>
                      <i class='active item__rate-star fas fa-star'></i>
                      <i class='active item__rate-star fas fa-star'></i>
                      <i class='item__rate-star fas fa-star'></i>
                      <i class='item__rate-star fas fa-star'></i>
                      ";
                  }
                  if($phone[6] == 2){
                    echo "
                    <div class='item__rate'>
                      <i class='active item__rate-star fas fa-star'></i>
                      <i class='active item__rate-star fas fa-star'></i>
                      <i class='item__rate-star fas fa-star'></i>
                      <i class='item__rate-star fas fa-star'></i>
                      <i class='item__rate-star fas fa-star'></i>
                      ";
                  }
                  if($phone[6] == 1){
                    echo "
                    <div class='item__rate'>
                      <i class='active item__rate-star fas fa-star'></i>
                      <i class='item__rate-star fas fa-star'></i>
                      <i class='item__rate-star fas fa-star'></i>
                      <i class='item__rate-star fas fa-star'></i>
                      <i class='item__rate-star fas fa-star'></i>
                      ";
                  }
                  $countRate = mysqli_fetch_assoc($connect->query("SELECT COUNT(*) as count FROM rate WHERE id_product = $phone[0]"));
          echo "
                      <span>".$countRate['count']." đánh giá</span>
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