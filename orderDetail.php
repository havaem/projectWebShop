<?php
    session_start();
    include("./config.php");
    if (!isset($_SESSION['idUserLogin'])) {
        header('location: ../login/dangnhap.php');
        exit();
    }
    $idUser = $_SESSION['idUserLogin'];
    $idOrder = $_GET['id']; // mã đơn hàng
    // Nếu user ko mua đơn hàng đó thì sẽ ko hiện và redirect
    $dataOrder = mysqli_fetch_all($connect->query("SELECT * from theorder where id_user = '$idUser'"));
    //Nếu nhỏ hơn 0 thì chưa từng mua hàng
    if(count($dataOrder) > 0){
        $isBuy = false;
        for($i=0;$i<count($dataOrder);$i++){
            if($dataOrder[$i][0] == $idOrder){
                $isBuy = true;
            }
        }
        if($isBuy){
            $dataOrder = mysqli_fetch_row($connect->query("SELECT * from theorder where id = $idOrder"));
            $dataOrderDetail = mysqli_fetch_all($connect->query("SELECT * from orderdetail where id_order = $idOrder"));
        }
        else{
            header('location: ./index.php');
            exit();
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
    <link rel="stylesheet" href="./assets/css/orderDetail.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/icon/flaticon.css">
    <script src="./assets/script/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="order">
        <div class="container">
            <div class="order__title">
                <h1>CHI TIẾT ĐƠN HÀNG</h1>
                <h3>MÃ VẬN ĐƠN: <?=$idOrder?></h3>
            </div>
            <button class="order__download noPrint" onclick="window.print();" title="Tải xuống đơn hàng">
                <i class="fas fa-file-download"></i>
            </button>
            <div class="order__content">
                <div class="order__content-product">
                    <?php 
                        foreach ($dataOrderDetail as $item){
                            $dataProduct = mysqli_fetch_row($connect->query("SELECT name,image from product where id = $item[2]"));
                            $priceFormatted = number_format($item[4],"0",".",".");
                            $srcImg = substr($dataProduct[1],1);
                            echo <<<XXX
                                <div class="product__item">
                                    <div class="product__item-left">
                                        <img src="$srcImg" alt="">
                                        <p>$dataProduct[0]</p>
                                    </div>
                                    <div class="product__item-right">
                                        <p>Số lượng: $item[3]</p>
                                        <p>${priceFormatted}đ</p>
                                    </div>
                                </div>
                            XXX;
                        }
                    ?>
                    
                    <!--  <div class="product__item">
                        <div class="product__item-left">
                            <img src="http://localhost/projectWebshop./assets/image/products/phone/Samsung-Galaxy-S21+5G-256GB/N%E1%BB%81n.jpg" alt="">
                            <p>iPhone 13 Pro Max 128GB từng được Nam sử dụng</p>
                        </div>
                        <div class="product__item-right">
                            <p>Số lượng: 1</p>
                            <p>24.440.000đ</p>
                        </div>
                    </div> -->
                </div>
                <div class="order__content-info">
                    <div class="info__item">
                        <label for="">TÊN KHÁCH HÀNG</label>
                        <input type="text" value="<?=$dataOrder[2]?>" disabled/>
                    </div>
                    <div class="info__item">
                        <label for="">SỐ ĐIỆN THOẠI</label>
                        <input type="text" value="<?=$dataOrder[5]?>" disabled/>
                    </div>
                    <div class="info__item">
                        <label for="">ĐỊA CHỈ</label>
                        <input type="text" value="<?=$dataOrder[4]?>" disabled/>
                    </div>
                    <div class="info__item">
                        <label for="">GHI CHÚ ĐƠN HÀNG</label>
                        <input type="text" value="<?=$dataOrder[6]?>" disabled/>
                    </div>
                </div>
                <div class="order__content-status  noPrint" data-status="<?=$dataOrder[9]?>">
                    <?php
                        $statusText='';
                        switch ($dataOrder[9]) {
                            case 1:
                                $statusText = "Đã giao hàng";
                                break;
                            case 2:
                                $statusText = "Đang giao hàng";
                                break;
                            case 3:
                                $statusText = "Đơn hàng bị hủy";
                                break;
                            case 4:
                                $statusText = "Đang xác nhận";
                                break;
                            default:
                                break;
                        }
                    ?>
                    <p><?=$statusText?></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
