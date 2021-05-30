<?php
include("../config.php");
$type = (int)$_REQUEST["type"];
$amount = $_REQUEST["amount"];
$filterByManufacturer = isset($_REQUEST["filterByManufacturer"]) ? $_REQUEST["filterByManufacturer"] : 0;
$filterByPrice = isset($_REQUEST["filterByPrice"]) ? $_REQUEST["filterByPrice"] : 0;
if (!isset($type) && !isset($amount)) {
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
$data = mysqli_fetch_all($connect->query("SELECT * from product where type = $type and isVisible = 1 limit $amount"));

function exportNumberManu($type,$num){
  if($type == 1){
    switch ($num) {
      case 1: return 1;
      case 2: return 2;
      case 3: return 3;
      case 4: return 4;
      case 5: return 5;
      case 6: return 6;
      case 7: return 7;
    }
  }
  if($type == 2){
    switch ($num) {
      case 1: return 1;
      case 2: return 16;
      case 3: return 20;
      case 4: return 15;
      case 5: return 21;
      case 6: return 22;
    }
  }
  if($type == 3){
    switch ($num) {
      case 1: return 1;
      case 2: return 2;
      case 3: return 17;
      case 4: return 18;
      case 5: return 19;
      case 6: return 23;
      case 7: return 22;
    }
  }
  if($type == 4){
    switch ($num) {
      case 1: return 1;
      case 2: return 2;
      case 3: return 17;
      case 4: return 3;
      case 5: return 13;
      case 6: return 4;
      case 7: return 24;
    }
  }
}


//Filter for 1
if($type === 1){
  //Filter only manu
  if($filterByManufacturer !=0 && $filterByPrice==0){
    $query = $connect->query("SELECT * from product where type = $type and manufacturer=$filterByManufacturer and isVisible = 1 limit $amount");
    $data = mysqli_fetch_all($query);
  }
  //Filter only price
  if($filterByManufacturer ==0 && $filterByPrice!=0){
    if($filterByPrice == 1){
      $query = $connect->query("SELECT * from product where type = $type and price < 2000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 2){
      $query = $connect->query("SELECT * from product where type = $type and price >= 2000000 and price <= 4000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 3){
      $query = $connect->query("SELECT * from product where type = $type and price >= 4000000 and price <= 7000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 4){
      $query = $connect->query("SELECT * from product where type = $type and price >= 7000000 and price <= 13000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 5){
      $query = $connect->query("SELECT * from product where type = $type and price >= 13000000 and price <= 20000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 6){
      $query = $connect->query("SELECT * from product where type = $type and price >= 20000000 and isVisible = 1 limit $amount");
    }
    $data = mysqli_fetch_all($query);
  }
  //Filter both
  if($filterByManufacturer !=0 && $filterByPrice!=0){
    if($filterByPrice == 1){
      $query = $connect->query("SELECT * from product where type = $type and manufacturer=$filterByManufacturer and price < 2000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 2){
      $query = $connect->query("SELECT * from product where type = $type and manufacturer=$filterByManufacturer and price >= 2000000 and price <= 4000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 3){
      $query = $connect->query("SELECT * from product where type = $type and manufacturer=$filterByManufacturer and price >= 4000000 and price <= 7000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 4){
      $query = $connect->query("SELECT * from product where type = $type and manufacturer=$filterByManufacturer and price >= 7000000 and price <= 13000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 5){
      $query = $connect->query("SELECT * from product where type = $type and manufacturer=$filterByManufacturer and price >= 13000000 and price <= 20000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 6){
      $query = $connect->query("SELECT * from product where type = $type and manufacturer=$filterByManufacturer and price >= 20000000 and isVisible = 1 limit $amount");
    }
    $data = mysqli_fetch_all($query);
  }
}
//Filter for 2
if($type === 2){
  //Filter only manu
  if($filterByManufacturer !=0 && $filterByPrice==0){
    $manu = exportNumberManu($type,$filterByManufacturer);
    $query = $connect->query("SELECT * from product where type = $type and manufacturer='$manu' and isVisible = 1 limit $amount");
    $data = mysqli_fetch_all($query);
  }
  //Filter only price
  if($filterByManufacturer ==0 && $filterByPrice!=0){
    if($filterByPrice == 1){
      $query = $connect->query("SELECT * from product where type = $type and price < 10000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 2){
      $query = $connect->query("SELECT * from product where type = $type and price >= 10000000 and price <= 15000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 3){
      $query = $connect->query("SELECT * from product where type = $type and price >= 15000000 and price <= 20000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 4){
      $query = $connect->query("SELECT * from product where type = $type and price >= 20000000 and price <= 25000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 5){
      $query = $connect->query("SELECT * from product where type = $type and price >= 25000000 and price <= 50000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 6){
      $query = $connect->query("SELECT * from product where type = $type and price >= 50000000 and isVisible = 1 limit $amount");
    }
    $data = mysqli_fetch_all($query);
  }
  //Filter both
  if($filterByManufacturer !=0 && $filterByPrice!=0){
    $manu = exportNumberManu($type,$filterByManufacturer);
    if($filterByPrice == 1){
      $query = $connect->query("SELECT * from product where type = $type and price < 10000000 and manufacturer='$manu' and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 2){
      $query = $connect->query("SELECT * from product where type = $type and price >= 10000000 and price <= 15000000  and manufacturer='$manu' and price <= 15000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 3){
      $query = $connect->query("SELECT * from product where type = $type and price >= 15000000 and price <= 20000000  and manufacturer='$manu' and price <= 20000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 4){
      $query = $connect->query("SELECT * from product where type = $type and price >= 20000000 and price <= 25000000  and manufacturer='$manu' and price <= 25000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 5){
      $query = $connect->query("SELECT * from product where type = $type and price >= 25000000 and price <= 50000000  and manufacturer='$manu' and price <= 50000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 6){
      $query = $connect->query("SELECT * from product where type = $type and price >= 50000000 and manufacturer='$manu' and isVisible = 1 limit $amount");
    }
    $data = mysqli_fetch_all($query);
  }
}
//Filter for 3
if($type === 3){
  //Filter only manu
  if($filterByManufacturer !=0 && $filterByPrice==0){
    $manu = exportNumberManu($type,$filterByManufacturer);
    $query = $connect->query("SELECT * from product where type = $type and manufacturer='$manu' and isVisible = 1 limit $amount");
    $data = mysqli_fetch_all($query);
  }
  //Filter only price
  if($filterByManufacturer ==0 && $filterByPrice!=0){
    if($filterByPrice == 1){
      $query = $connect->query("SELECT * from product where type = $type and price < 3000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 2){
      $query = $connect->query("SELECT * from product where type = $type and price >= 3000000 and price <= 8000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 3){
      $query = $connect->query("SELECT * from product where type = $type and price >= 8000000 and price <= 15000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 4){
      $query = $connect->query("SELECT * from product where type = $type and price >= 15000000 and price <= 20000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 5){
      $query = $connect->query("SELECT * from product where type = $type and price >= 20000000 and price <= 25000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 6){
      $query = $connect->query("SELECT * from product where type = $type and price >= 25000000 and isVisible = 1 limit $amount");
    }
    $data = mysqli_fetch_all($query);
  }
  //Filter both
  if($filterByManufacturer !=0 && $filterByPrice!=0){
    $manu = exportNumberManu($type,$filterByManufacturer);
    if($filterByPrice == 1){
      $query = $connect->query("SELECT * from product where type = $type and price < 3000000 and manufacturer='$manu' and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 2){
      $query = $connect->query("SELECT * from product where type = $type and price >= 3000000 and price <= 8000000 and manufacturer='$manu' and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 3){
      $query = $connect->query("SELECT * from product where type = $type and price >= 8000000 and price <= 15000000  and manufacturer='$manu' and price <= 20000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 4){
      $query = $connect->query("SELECT * from product where type = $type and price >= 15000000 and price <= 20000000 and manufacturer='$manu' and price <= 25000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 5){
      $query = $connect->query("SELECT * from product where type = $type and price >= 20000000 and price <= 25000000 and manufacturer='$manu' and price <= 50000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 6){
      $query = $connect->query("SELECT * from product where type = $type and price >= 25000000 and manufacturer='$manu' and isVisible = 1 limit $amount");
    }
    $data = mysqli_fetch_all($query);
  }
}
//Filter for 4
if($type === 4){
  //Filter only manu
  if($filterByManufacturer !=0 && $filterByPrice==0){
    $manu = exportNumberManu($type,$filterByManufacturer);
    $query = $connect->query("SELECT * from product where type = $type and manufacturer='$manu' and isVisible = 1 limit $amount");
    $data = mysqli_fetch_all($query);
  }
  //Filter only price
  if($filterByManufacturer ==0 && $filterByPrice!=0){
    if($filterByPrice == 1){
      $query = $connect->query("SELECT * from product where type = $type and price < 3000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 2){
      $query = $connect->query("SELECT * from product where type = $type and price >= 3000000 and price <= 8000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 3){
      $query = $connect->query("SELECT * from product where type = $type and price >= 8000000 and price <= 15000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 4){
      $query = $connect->query("SELECT * from product where type = $type and price >= 15000000 and price <= 20000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 5){
      $query = $connect->query("SELECT * from product where type = $type and price >= 20000000 and price <= 25000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 6){
      $query = $connect->query("SELECT * from product where type = $type and price >= 25000000 and isVisible = 1 limit $amount");
    }
    $data = mysqli_fetch_all($query);
  }
  //Filter both
  if($filterByManufacturer !=0 && $filterByPrice!=0){
    $manu = exportNumberManu($type,$filterByManufacturer);
    if($filterByPrice == 1){
      $query = $connect->query("SELECT * from product where type = $type and price < 3000000 and manufacturer='$manu' and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 2){
      $query = $connect->query("SELECT * from product where type = $type and price >= 3000000 and price <= 8000000 and manufacturer='$manu' and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 3){
      $query = $connect->query("SELECT * from product where type = $type and price >= 8000000 and price <= 15000000  and manufacturer='$manu' and price <= 20000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 4){
      $query = $connect->query("SELECT * from product where type = $type and price >= 15000000 and price <= 20000000 and manufacturer='$manu' and price <= 25000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 5){
      $query = $connect->query("SELECT * from product where type = $type and price >= 20000000 and price <= 25000000 and manufacturer='$manu' and price <= 50000000 and isVisible = 1 limit $amount");
    }
    if($filterByPrice == 6){
      $query = $connect->query("SELECT * from product where type = $type and price >= 25000000 and manufacturer='$manu' and isVisible = 1 limit $amount");
    }
    $data = mysqli_fetch_all($query);
  }
}
foreach ($data as $item) {
  $price = number_format($item[4]);
  echo "
      <a href='./detail.php?id=$item[0]' class='" . $cl . "__content-item'>
        <img
          src='$item[3]'
          class='item__img'
        />
        <h3 class='item__title'>$item[2]</h3>
        <strong class='item__price'>$price ₫</strong>";
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
  if ($item[6] == 0) {
    echo "
        <div class='item__rate'>
          <i style='font-size:14px;color:#dfdfdf;' class='far fa-star'></i>
          <i style='font-size:14px;color:#dfdfdf;' class='far fa-star'></i>
          <i style='font-size:14px;color:#dfdfdf;' class='far fa-star'></i>
          <i style='font-size:14px;color:#dfdfdf;' class='far fa-star'></i>
          <i style='font-size:14px;color:#dfdfdf;' class='far fa-star'></i>
          ";
  }
  $countRate = mysqli_fetch_assoc($connect->query("SELECT COUNT(*) as count FROM rate WHERE id_product = $item[0]"));
  echo "
          <span>" . $countRate['count'] . " đánh giá</span>
        </div>
      </a>
      ";
}