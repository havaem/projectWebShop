<?php
include("config.php");
$idUserLogin = null;
if (isset($_SESSION['idUserLogin'])) {
    $idUserLogin  = (int)$_SESSION['idUserLogin'];
    $resultUser = $connect->query("SELECT * from user where id = $idUserLogin") or die('false to connect to user');
    $rowUser = mysqli_fetch_assoc($resultUser);
}

?>

<div class="header">
    <div class="container">
        <div class="header__main">
            <a href="http://localhost/projectWebshop/index.php" class="header__main-logo">
                <!-- <img src="./assets/image/logo.png" alt=""> -->
                <h1>TechShop</h1>
                <h1 class="mobile-logo">T</h1>
            </a>
            <form action="" class="header__main-search">
                <input type="text" class="search__input" placeholder="Bạn tìm gì...">
                <button type="submit" class="search__button">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <div class="header__main-mini">
                <a href="" class="mini__cart">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Giỏ hàng</span>
                </a>
                <!-- <a href="" class="mini__history">
                    <span>LỊCH SỬ <br />MUA HÀNG</span>
                </a> -->
                <?php
                if (isset($idUserLogin)) {
                    echo <<<XXX
                            <div class="mini__history mini__user">
                                <span>${rowUser['name']}</span>
                                <div class="mini__user-sub">
                                    <a href="http://localhost/projectWebshop/dashboard/user.php">PROFILE</a>
                                     <a class="mini__user-logout" href="http://localhost/projectWebshop/login/dangxuat.php">LOGOUT</a>
                                </div>
                            </div>
                        XXX;
                } else {
                    echo <<<XXX
                        <a href="http://localhost/projectWebshop/login/dangnhap.php" class="mini__history">
                        <span>ĐĂNG NHẬP</span>
                        </a>
                        XXX;
                }
                ?>


            </div>
        </div>
        <div class="header__nav">
            <div class="header__nav-item">
                <a href="http://localhost/projectWebshop/product/phone.php" class="item__title">
                    <i class="item__icon flaticon-phone"></i>
                    <span>Điện thoại</span>
                </a>
            </div>
            <div class="header__nav-item">
                <a href="http://localhost/projectWebshop/product/laptop.php" class="item__title">
                    <i class="item__icon flaticon-analytics"></i>
                    <span>Laptop</span>
                </a>
            </div>
            <div class="header__nav-item">
                <a href="http://localhost/projectWebshop/product/tablet.php" class="item__title">
                    <i class="item__icon fas fa-tablet-alt"></i>
                    <span>Tablet</span>
                </a>
            </div>
            <div class="header__nav-item">
                <a href="#" class="item__title">
                    <i class="item__icon flaticon-headphones"></i>
                    <span style="margin-right: 1rem;">Phụ kiện</span>
                    <i class="fas fa-sort-down" style="font-size: 1.8rem;transform: translateY(-25%);"></i>
                    <i class="fas fa-sort-up" style="font-size: 1.8rem;transform: translateY(25%);"></i>
                </a>
                <div class="item__subitem">
                    <a href="#" class="item__subitem-item">Sạc dự phòng</a>
                    <a href="#" class="item__subitem-item">Tai nghe</a>
                    <a href="#" class="item__subitem-item">Bàn phím</a>
                    <a href="#" class="item__subitem-item">Chuột</a>
                    <a href="#" class="item__subitem-item">Miếng dán màn hình</a>
                </div>
            </div>
            <div class="header__nav-item">
                <a href="http://localhost/projectWebshop/product/watch.php" class="item__title">
                    <i class="item__icon flaticon-smartwatch"></i>
                    <span>Đồng hồ thông minh</span>
                </a>

            </div>
            <div class="header__nav-item">
                <a href="http://localhost/projectWebshop/product/pc.php" class="item__title">
                    <i class="item__icon fas fa-desktop"></i>
                    <span>PC, Máy in</span>
                </a>
            </div>
        </div>
    </div>
</div>
