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
function exportStar($number){
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
if (!empty($rowComment)) {
    foreach ($rowComment as $item) {
        //lấy rank từ db
        $rankResult = $connect->query("SELECT rank.name FROM user,rank WHERE user.rank = $item[2] AND rank.id = user.rank") or die("mysqli_error");
        $rowRank = mysqli_fetch_assoc($rankResult);
        //Lấy tên từ db
        $nameResult = $connect->query("SELECT user.name FROM user WHERE  user.id = $item[2]") or die("mysqli_error");
        $rowName = mysqli_fetch_assoc($nameResult);
        //Lấy số sao đánh giá từ db
        $starResult = $connect->query("SELECT star FROM rate WHERE id_user = $item[2] and id_product = ${data['id']}") or die("mysqli_error");
        $rowStar = mysqli_fetch_assoc($starResult);
        echo "
                            <div class='comment__content-item'>
                            <h3 class='item__name'>${rowName["name"]}<i class='fas fa-check-circle' title='${rowRank["name"]}'></i></h3>
                            <span class='item__time'>$item[4]</span>
                            <div class='item__rate'>";
        echo exportStar($rowStar['star']);
        echo "
                            </div>
                            <h4 class='item__comment'>$item[3]</h4>
                            </div>
                        ";
    }
}
