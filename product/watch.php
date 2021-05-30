<?php
session_start();
  
include("../config.php");
$filterByManufacturer = isset($_GET["manu"]) ? (int)$_GET["manu"] : 0;
$filterByPrice = isset($_GET["price"]) ? (int)$_GET["price"] : 0;

function renderFilterManuLink($num,$filterByPrice){
    return "?manu=$num&price=$filterByPrice";
}

function renderFilterPriceLink($num,$filterByManufacturer){
    return "?manu=$filterByManufacturer&price=$num";
}
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
            <a href="<?=renderFilterManuLink(1,$filterByPrice)?>" class="brand__item">
                <img class="brand__item-img" src="../assets/image/nhanhieu/Apple7077-b_26.jpg" alt="" />
            </a>
            <a href="<?=renderFilterManuLink(2,$filterByPrice)?>" class="brand__item">
                <img class="brand__item-img" src="../assets/image/nhanhieu/samsung.jpg" alt="" />
            </a>
            <a href="<?=renderFilterManuLink(3,$filterByPrice)?>" class="brand__item">
                <img class="brand__item-img" src="../assets/image/nhanhieu/Huawei522-b_4.jpg" alt="" />
            </a>
            <a href="<?=renderFilterManuLink(4,$filterByPrice)?>" class="brand__item">
                <img class="brand__item-img" src="../assets/image/nhanhieu/oppo.jpg" alt="" />
            </a>
            <a href="<?=renderFilterManuLink(5,$filterByPrice)?>" class="brand__item">
                <img class="brand__item-img" src="../assets/image/nhanhieu/Garmin.png" alt="" />
            </a>
            <a href="<?=renderFilterManuLink(6,$filterByPrice)?>" class="brand__item">
                <img class="brand__item-img" src="../assets/image/nhanhieu/Xiaomi.jpg" alt="" />
            </a>
            <a href="<?=renderFilterManuLink(7,$filterByPrice)?>" class="brand__item">
                <img class="brand__item-img" src="../assets/image/nhanhieu/Huami-Amazfi.jpg" alt="" />
            </a>
        </div>
    </div>
    <div class="filter">
        <div class="container">
            <h1 class="filter__title">Chọn mức giá :</h1>
            <a href="<?=renderFilterPriceLink(1,$filterByManufacturer)?>" class="filter__item"> Dưới 3 triệu </a>
            <a href="<?=renderFilterPriceLink(2,$filterByManufacturer)?>" class="filter__item"> Từ 3 đến 8 triệu </a>
            <a href="<?=renderFilterPriceLink(3,$filterByManufacturer)?>" class="filter__item"> Từ 8 đến 15 triệu </a>
            <a href="<?=renderFilterPriceLink(4,$filterByManufacturer)?>" class="filter__item"> Từ 15 đến 20 triệu </a>
            <a href="<?=renderFilterPriceLink(5,$filterByManufacturer)?>" class="filter__item"> Từ 20 đến 25 triệu </a>
            <a href="<?=renderFilterPriceLink(6,$filterByManufacturer)?>" class="filter__item"> Trên 25 triệu </a>
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

            </div>
            <div class="watch__more">
                <!-- <a href="javascript:void(0)">Xem thêm</a> -->
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
            var filterByManufacturer = <?=$filterByManufacturer?>;
                var filterByPrice = <?=$filterByPrice?>;
                if (dt == 0) {
                    $(".watch__more").css("display", "none");
                }
                var amount = 10;
                var dt;
                $.ajax({
                    url: "./productQuery.php",
                    type: 'POST',
                    data: {
                        amount,
                        type: 4,
                        filterByManufacturer,
                        filterByPrice
                    },
                    success: function (data) {
                        console.log(data)
                        dt = data-1;
                        if(dt>0){
                            document.querySelector(".watch__more").innerHTML = "<a class='watch__more-button href='javascript:void(0)'>Xem thêm</a>";
                        }
                        $(".watch__more-button").click(() => {
                            amount += 10;
                            dt--;
                            console.log(dt);
                            if (dt == 0) {
                            $(".watch__more").css("display", "none");
                            }
                            renderData(filterByManufacturer,filterByPrice);
                        })
                    }
                });
                const renderData = (filterByManufacturer, filterByPrice) => {
                    $.ajax({
                        url: "./productData.php",
                        type: 'POST',
                        data: {
                            amount,
                            type: 4,
                            filterByManufacturer,
                            filterByPrice
                        },
                        success: function (data) {
                            $(".watch__content").html(data);
                        }
                    });
                }

                renderData(filterByManufacturer,filterByPrice);
        });
    </script>
</body>

</html>