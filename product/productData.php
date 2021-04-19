<?php
include("../config.php");
$type = (int)$_REQUEST["type"];
$amount = $_REQUEST["amount"];
if(!isset($type) && !isset($amount)){
    header("location: ../index.php");
}
$cl = '';
switch ($type) {
    case 1:
        $cl = "phone";
        break;
    case 2:
        $cl = "laptop";
        break;
    case 3:
        $cl = "tablet";
        break;
    case 4:
        $cl = "watch";
        break;
    case 5:
        $cl = "pc";
        break;
    default:
        break;
}
$data = mysqli_fetch_all($connect->query("SELECT * from product where type = $type limit $amount"));
foreach ($data as $item) {
    $price = number_format($item[4]);
    echo "
      <a href='./detail.php?id=$item[0]' class='".$cl."__content-item'>
        <img
          src='$item[3]'
          class='item__img'
        />
        <h3 class='item__title'>$item[2]</h3>
        <strong class='item__price'>$price</strong>";
    if ($item[6] == 5) {
        echo "
        <div class='item__rate'>
          <i class='active item__rate-star fas fa-star'></i>
          <i class='active item__rate-star fas fa-star'></i>
          <i class='active item__rate-star fas fa-star'></i>
          <i class='active item__rate-star fas fa-star'></i>
          <i class='active item__rate-star fas fa-star'></i>
          ";
    }
    if ($item[6] == 4) {
        echo "
        <div class='item__rate'>
          <i class='active item__rate-star fas fa-star'></i>
          <i class='active item__rate-star fas fa-star'></i>
          <i class='active item__rate-star fas fa-star'></i>
          <i class='active item__rate-star fas fa-star'></i>
          <i class='item__rate-star fas fa-star'></i>
          ";
    }
    if ($item[6] == 3) {
        echo "
        <div class='item__rate'>
          <i class='active item__rate-star fas fa-star'></i>
          <i class='active item__rate-star fas fa-star'></i>
          <i class='active item__rate-star fas fa-star'></i>
          <i class='item__rate-star fas fa-star'></i>
          <i class='item__rate-star fas fa-star'></i>
          ";
    }
    if ($item[6] == 2) {
        echo "
        <div class='item__rate'>
          <i class='active item__rate-star fas fa-star'></i>
          <i class='active item__rate-star fas fa-star'></i>
          <i class='item__rate-star fas fa-star'></i>
          <i class='item__rate-star fas fa-star'></i>
          <i class='item__rate-star fas fa-star'></i>
          ";
    }
    if ($item[6] == 1) {
        echo "
        <div class='item__rate'>
          <i class='active item__rate-star fas fa-star'></i>
          <i class='item__rate-star fas fa-star'></i>
          <i class='item__rate-star fas fa-star'></i>
          <i class='item__rate-star fas fa-star'></i>
          <i class='item__rate-star fas fa-star'></i>
          ";
    }
    $countRate = mysqli_fetch_assoc($connect->query("SELECT COUNT(*) as count FROM rate WHERE id_product = $item[0]"));
    echo "
          <span>" . $countRate['count'] . " đánh giá</span>
        </div>
      </a>
      ";
}
