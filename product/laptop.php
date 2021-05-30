<?php
session_start();
include("../config.php");
$filterByManufacturer = isset($_GET["manu"]) ? (int)$_GET["manu"] : 0;
// 1: iPhone, 2: SamSung , 3: Oppo, 4: Xiaomi, 5: Realme, 6: Vsmart, 7: Nokia
$filterByPrice = isset($_GET["price"]) ? (int)$_GET["price"] : 0;
// 1: Dưới 2 triệu, 2: từ 2 đến 4 , 3: từ 4 đến 7, 4: từ 7 đến 13, 5: từ 13 đến 20, 6: trên 20

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
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>TECHSHOP ✔</title>
        <link rel="icon" href="../assets/image/icon.png" sizes=""/>
        <!-- Reset CSS -->
        <link rel="stylesheet" href="../assets/css/reset.css"/>
        <!-- Source CSS -->
        <link rel="stylesheet" href="../assets/css/laptop.css"/>
        <!-- FontAwesome -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <link rel="stylesheet" type="text/css" href="../assets/icon/flaticon.css"/>
        <script src="../assets/script/jquery-3.6.0.min.js"></script>
    </head>

    <body>
        <?php
    include_once('../header.php');
    ?>
        <div class="brand">
            <div class="container">
                <a href="<?=renderFilterManuLink(1,$filterByPrice)?>" class="brand__item">
                    <img class="brand__item-img" src="../assets/image/nhanhieu/MacBook.png" alt=""/>
                </a>
                <a href="<?=renderFilterManuLink(2,$filterByPrice)?>" class="brand__item">
                    <img class="brand__item-img" src="../assets/image/nhanhieu/Asus.png" alt=""/>
                </a>
                <a href="<?=renderFilterManuLink(3,$filterByPrice)?>" class="brand__item">
                    <img class="brand__item-img" src="../assets/image/nhanhieu/HP44.jpg" alt=""/>
                </a>
                <a href="<?=renderFilterManuLink(4,$filterByPrice)?>" class="brand__item">
                    <img class="brand__item-img" src="../assets/image/nhanhieu/Acer.jpg" alt=""/>
                </a>
                <a href="<?=renderFilterManuLink(5,$filterByPrice)?>" class="brand__item">
                    <img class="brand__item-img" src="../assets/image/nhanhieu/Dell.jpg" alt=""/>
                </a>
                <a href="<?=renderFilterManuLink(6,$filterByPrice)?>" class="brand__item">
                    <img class="brand__item-img" src="../assets/image/nhanhieu/LG.jpg" alt=""/>
                </a>
            </div>
        </div>
        <div class="filter">
            <div class="container">
                <h1 class="filter__title">Chọn mức giá :</h1>
                <a href="<?=renderFilterPriceLink(1,$filterByManufacturer)?>" class="filter__item">
                    Dưới 10 triệu
                </a>
                <a href="<?=renderFilterPriceLink(2,$filterByManufacturer)?>" class="filter__item">
                    Từ 10 đến 15 triệu
                </a>
                <a href="<?=renderFilterPriceLink(3,$filterByManufacturer)?>" class="filter__item">
                    Từ 15 đến 20 triệu
                </a>
                <a href="<?=renderFilterPriceLink(4,$filterByManufacturer)?>" class="filter__item">
                    Từ 20 đến 25 triệu
                </a>
                <a href="<?=renderFilterPriceLink(5,$filterByManufacturer)?>" class="filter__item">
                    Từ 25 đến 50 triệu
                </a>
                <a href="<?=renderFilterPriceLink(6,$filterByManufacturer)?>" class="filter__item">
                    Trên 50 triệu
                </a>
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
                <div class="laptop__content"></div>
                <div class="laptop__more">
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
            $(document).ready(function () {
                var filterByManufacturer = <?=$filterByManufacturer?>;
                var filterByPrice = <?=$filterByPrice?>;
                if (dt == 0) {
                    $(".laptop__more").css("display", "none");
                }
                var amount = 10;
                var dt;
                $.ajax({
                    url: "./productQuery.php",
                    type: 'POST',
                    data: {
                        amount,
                        type: 2,
                        filterByManufacturer,
                        filterByPrice
                    },
                    success: function (data) {
                        console.log(data)
                        dt = data-1;
                        if(dt>0){
                            document.querySelector(".laptop__more").innerHTML = "<a class='laptop__more-button href='javascript:void(0)'>Xem thêm</a>";
                        }
                        $(".laptop__more-button").click(() => {
                            amount += 10;
                            dt--;
                            console.log(dt);
                            if (dt == 0) {
                            $(".laptop__more").css("display", "none");
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
                            type: 2,
                            filterByManufacturer,
                            filterByPrice
                        },
                        success: function (data) {
                            $(".laptop__content").html(data);
                        }
                    });
                }

                renderData(filterByManufacturer,filterByPrice);
            });
        </script>
    </body>

</html>