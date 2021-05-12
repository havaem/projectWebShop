<?php
include_once('./config.php');
$id_product = 5;
$allStar = mysqli_fetch_row($connect->query("SELECT SUM(star) from rate where id_product = $id_product"))[0];
$rateTimes = mysqli_fetch_row($connect->query("SELECT COUNT(star) from rate where id_product = $id_product"))[0];
// echo $allStar;
// echo $rateTimes;
// $rateAverage = round($allStar / $rateTimes);
// echo $rateAverage;
// echo $rateTimes;
?>
<!DOCTYPE html>
<html lang="vn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nam</title>
    <!-- Source CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="./assets/css/notify.css">
    <script src="./assets/script/notyf.min.js"></script>
</head>

<body>
    <button class="btn">HIHI</button>
    <script>
        var notyf = new Notyf({
            duration: 1000,
            ripple: true,
            dismissible: true,
        });
        document.querySelector(".btn").onclick= () => {
            notyf.success('Your changes have been successfully saved!');
        }
        // notyf.error('Please fill out the form');
    </script>
</body>

</html>