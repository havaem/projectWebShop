<?php
include("../config.php");
$id = $_POST["id"];
// echo "<script>alert('commentData :' +".$id.")</script>";
$currentPage =  isset($_REQUEST["currentPage"]) ? $_REQUEST["currentPage"] : 1;
$data = mysqli_fetch_assoc($connect->query("SELECT * FROM product WHERE id = $id"));
$itemPerPage = 4;
$offset = ($currentPage - 1) * $itemPerPage;
$commentResult = $connect->query("SELECT * FROM comment WHERE id_product = $id order by release_date desc limit $itemPerPage OFFSET $offset") or die("mysqli_error");
$rowComment = mysqli_fetch_all($commentResult);
// Hiển thị số sao để đổ comment cho user 
function exportStar($number)
{
    switch ($number) {
        case 1:
            return "<i class='active fas fa-star'></i>
        <i class='fas fa-star'></i>
        <i class='fas fa-star'></i>
        <i class='fas fa-star'></i>
        <i class='fas fa-star'></i>";
        case 2:
            return "<i class='active fas fa-star'></i>
            <i class='active fas fa-star'></i>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>";
        case 3:
            return "<i class='active fas fa-star'></i>
            <i class='active fas fa-star'></i>
            <i class='active fas fa-star'></i>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>";
        case 4:
            return "<i class='active fas fa-star'></i>
            <i class='active fas fa-star'></i>
            <i class='active fas fa-star'></i>
            <i class='active fas fa-star'></i>
            <i class='fas fa-star'></i>";
        case 5:
            return "<i class='active fas fa-star'></i>
            <i class='active fas fa-star'></i>
            <i class='active fas fa-star'></i>
            <i class='active fas fa-star'></i>
            <i class='active fas fa-star'></i>";
    }
}
function exportLevel($level)
{
    switch ($level) {
        case "NewMember":
            return "new";
        case "VIP1":
            return "lv1";
        case "VIP2":
            return "lv2";
        case "VIP3":
            return "lv3";
        case "VIP4":
            return "lv4";
    }
}
if (!empty($rowComment)) {
    foreach ($rowComment as $item) {
        //lấy rank từ db
        $rowRank = mysqli_fetch_row($connect->query("SELECT rank.name FROM user,rank WHERE user.id = '$item[2]' AND rank.id = user.rank"))[0];
        //Lấy tên từ db
        $nameResult = $connect->query("SELECT name FROM user WHERE id = $item[2]") or die("mysqli_error");
        $rowName = mysqli_fetch_assoc($nameResult);
        //Lấy số sao đánh giá từ db
        $starResult = $connect->query("SELECT star FROM rate WHERE id_user = $item[2] and id_product = ${data['id']}") or die("mysqli_error");
        $rowStar = mysqli_fetch_assoc($starResult);
        $rate = exportStar($rowStar['star']);
        $level = exportLevel($rowRank);
        $avatar = mysqli_fetch_row($connect->query("SELECT avatar from user where id = $item[2]"))[0];
        echo <<<XXX
                <div class="comment__content-item">
                    <div class="item__left" title="$rowRank">
                        <img class="item__left-border" src="../assets/image/border/$level.png" alt="">
                        <img class="item__left-avatar" src="../dashboard/$avatar" alt="">
                    </div>
                    <div class="item__right">
                        <div class="item__right-name">
                            <span>${rowName["name"]}</span>
                        </div>
                        <span class="item__right-time">2021-05-29 14:34:43</span>
                        <div class="item__right-rate">
                            $rate
                        </div>
                        <p class="item__right-comment">
                            $item[3]
                        </p>
                    </div>
                </div>
        XXX;
    }
}
