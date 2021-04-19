<?php
session_start();
include("../config.php");
$rowLaptop = $connect->query("SELECT * from product where type = 2");
$dt = ceil(mysqli_num_rows($rowLaptop) / 10);
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
    <link rel="stylesheet" href="../assets/css/laptop.css" />
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
                <img class="brand__item-img" src="../assets/image/nhanhieu/MacBook.png" alt="" />
            </a>
            <a href="" class="brand__item">
                <img class="brand__item-img" src="../assets/image/nhanhieu/Asus.png" alt="" />
            </a>
            <a href="" class="brand__item">
                <img class="brand__item-img" src="../assets/image/nhanhieu/HP44.jpg" alt="" />
            </a>
            <a href="" class="brand__item">
                <img class="brand__item-img" src="../assets/image/nhanhieu/Acer.jpg" alt="" />
            </a>
            <a href="" class="brand__item">
                <img class="brand__item-img" src="../assets/image/nhanhieu/Dell.jpg" alt="" />
            </a>
            <a href="" class="brand__item">
                <img class="brand__item-img" src="../assets/image/nhanhieu/MSI.png" alt="" />
            </a>
            <a href="" class="brand__item">
                <img class="brand__item-img" src="../assets/image/nhanhieu/LG.jpg" alt="" />
            </a>
        </div>
    </div>
    <div class="filter">
        <div class="container">
            <h1 class="filter__title">Chọn mức giá :</h1>
            <a href="" class="filter__item"> Dưới 10 triệu </a>
            <a href="" class="filter__item"> Từ 10 đến 15 triệu </a>
            <a href="" class="filter__item"> Từ 15 đến 20 triệu </a>
            <a href="" class="filter__item"> Từ 20 đến 25 triệu </a>
            <a href="" class="filter__item"> Từ 25 đến 50 triệu </a>
            <a href="" class="filter__item"> Trên 50 triệu </a>
        </div>
    </div>
    <div class="laptop">
        <div class="container">
            <div class="laptop__desc">
                <div class="laptop__desc-title">
                    <h2>Laptop còn hàng</h2>
                </div>
            </div>
            <!-- 16 items -->
            <div class="laptop__content">

            </div>
            <div class="laptop__more">
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
            dt = <?php echo $dt; ?>;
            if (dt == 0) {
                $(".laptop__more").css("display", "none");
            }
            amount = 10;
            $.ajax({
                url: "./productData.php",
                type: 'POST',
                data: {
                    amount: amount,
                    type: 2,
                },
                success: function(data) {
                    $(".laptop__content").html(data);
                }
            });
            dt--;
            $(".laptop__more").click(() => {
                amount += 10;
                dt--;
                if (dt == 0) {
                    $(".laptop__more").css("display", "none");
                }
                $.ajax({
                    url: "./productData.php",
                    type: 'POST',
                    data: {
                        amount: amount,
                        type: 2,
                    },
                    success: function(data) {
                        $(".laptop__content").html(data);
                    }
                });
            })
        });
    </script>
</body>

</html>