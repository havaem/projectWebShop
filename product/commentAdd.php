<?php
include("../config.php");
$rate = isset($_POST['rate']) ? (int)$_POST['rate'] : 0;
$id_product = isset($_POST['id_product']) ? $_POST['id_product'] : 0;
$id_user = isset($_POST['id_user']) ? $_POST['id_user'] : 0;
$comment = isset($_POST['comment']) ? $_POST['comment'] : '';
$currentDay = date_create()->format('Y-m-d H:i:s');
// Đánh giá sao thế comment trống
if ($comment === '' && $rate !== 0) {
    // Kiểm tra đã từng đánh giá chưa
    if (mysqli_num_rows($rated = $connect->query("SELECT * FROM rate WHERE id_product = $id_product  AND id_user = $id_user "))  == 0) {
        $connect->query("INSERT INTO rate(id_product, id_user, star) VALUES ($id_product,$id_user,$rate)");
        $rateTimes = mysqli_fetch_row($connect->query("SELECT COUNT(star) from rate where id_product = $id_product"))[0];
        if ($rateTimes != 0) {
            $allStar = mysqli_fetch_row($connect->query("SELECT SUM(star) from rate where id_product = $id_product"))[0];
            $rateAverage = round($allStar / $rateTimes);
            // Cập nhật rate trong product
            $connect->query("UPDATE product SET rate='$rateAverage' WHERE id = $id_product");
        } else {
            // Cập nhật rate trong product
            $connect->query("UPDATE product SET rate='$rate' WHERE id = $id_product");
        }
    }
    // Tồn tại thì update lại rate 
    else {
        $connect->query("UPDATE rate SET star = $rate WHERE rate.id_product = $id_product AND rate.id_user = $id_user");
        $rateTimes = mysqli_fetch_row($connect->query("SELECT COUNT(star) from rate where id_product = $id_product"))[0];
        $allStar = mysqli_fetch_row($connect->query("SELECT SUM(star) from rate where id_product = $id_product"))[0];
        $rateAverage = round($allStar / $rateTimes);
        // Cập nhật rate trong product
        $connect->query("UPDATE product SET rate='$rateAverage' WHERE id = $id_product");
    }
} else if ($comment !== '' && $rate === 0) {
    $connect->query("INSERT INTO comment(id_product, id_user, comment, release_date) VALUES ($id_product,$id_user,'$comment','$currentDay')");
} else {
    // Thêm comment 
    $connect->query("INSERT INTO comment(id_product, id_user, comment, release_date) VALUES ($id_product,$id_user,'$comment','$currentDay')");
    if (mysqli_num_rows($rated = $connect->query("SELECT * FROM rate WHERE id_product = $id_product  AND id_user = $id_user "))  == 0) {
        $connect->query("INSERT INTO rate(id_product, id_user, star) VALUES ($id_product,$id_user,$rate)");
        $allStar = mysqli_fetch_row($connect->query("SELECT SUM(star) from rate where id_product = $id_product"))[0];
        $rateAverage = round($allStar / $rateTimes);
        $connect->query("UPDATE product SET rate='$rateAverage' WHERE id = $id_product");
    } else {
        $connect->query("UPDATE rate SET star = $rate WHERE rate.id_product = $id_product AND rate.id_user = $id_user") or die("mysqli_error");
        $allStar = mysqli_fetch_row($connect->query("SELECT SUM(star) from rate where id_product = $id_product"))[0];
        $rateAverage = round($allStar / $rateTimes);
        $connect->query("UPDATE product SET rate='$rateAverage' WHERE id = $id_product");
    }
}
