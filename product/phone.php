<?php
session_start();
include("../config.php");
$rowPhone = $connect->query("SELECT * from product where type = 1 and isVisible = 1");
$dt = ceil(mysqli_num_rows($rowPhone) /10);
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
    <script src="../assets/script/jquery-3.6.0.min.js"></script>
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

            </div>
            <div class="phone__more">
                <a href="javascript:void(0)">Xem thêm</a>
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
    <script>
        $(document).ready(function() {
            dt = <?php echo$dt; ?>;
            if (dt == 0) {
                $(".phone__more").css("display", "none");
            }
            amount = 10;
            $.ajax({
                url: "./productData.php",
                type: 'POST',
                data: {
                    amount: amount,
                    type: 1,
                },
                success: function(data) {
                    $(".phone__content").html(data);
                }
            });
            dt--;
            $(".phone__more").click(() => {
                amount+=10;
                dt--;
                if(dt == 0){
                    $(".phone__more").css("display","none");
                }
                $.ajax({
                    url: "./productData.php",
                    type: 'POST',
                    data: {
                        amount: amount,
                        type: 1,
                    },
                    success: function(data) {
                        $(".phone__content").html(data);
                    }
                });
            })
        });
    </script>
</body>

</html>