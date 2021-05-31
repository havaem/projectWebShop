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
$query=$connect->query("SELECT * from product where type = $type and isVisible = 1");
$data = mysqli_fetch_all($query);
//Filter for 1
if($type === 1){
  //Filter only manu
  if($filterByManufacturer !=0 && $filterByPrice==0){
    $query = $connect->query("SELECT * from product where type = $type and manufacturer=$filterByManufacturer and isVisible = 1");
    $data = mysqli_fetch_all($query);
  }
  //Filter only price
  if($filterByManufacturer ==0 && $filterByPrice!=0){
    if($filterByPrice == 1){
      $query = $connect->query("SELECT * from product where type = $type and price < 2000000 and isVisible = 1");
    }
    if($filterByPrice == 2){
      $query = $connect->query("SELECT * from product where type = $type and price >= 2000000 and price <= 4000000 and isVisible = 1");
    }
    if($filterByPrice == 3){
      $query = $connect->query("SELECT * from product where type = $type and price >= 4000000 and price <= 7000000 and isVisible = 1");
    }
    if($filterByPrice == 4){
      $query = $connect->query("SELECT * from product where type = $type and price >= 7000000 and price <= 13000000 and isVisible = 1");
    }
    if($filterByPrice == 5){
      $query = $connect->query("SELECT * from product where type = $type and price >= 13000000 and price <= 20000000 and isVisible = 1");
    }
    if($filterByPrice == 6){
      $query = $connect->query("SELECT * from product where type = $type and price >= 20000000 and isVisible = 1");
    }
    $data = mysqli_fetch_all($query);
  }
  //Filter both
  if($filterByManufacturer !=0 && $filterByPrice!=0){
    if($filterByPrice == 1){
      $query = $connect->query("SELECT * from product where type = $type and manufacturer=$filterByManufacturer and price < 2000000 and isVisible = 1");
    }
    if($filterByPrice == 2){
      $query = $connect->query("SELECT * from product where type = $type and manufacturer=$filterByManufacturer and price >= 2000000 and price <= 4000000 and isVisible = 1");
    }
    if($filterByPrice == 3){
      $query = $connect->query("SELECT * from product where type = $type and manufacturer=$filterByManufacturer and price >= 4000000 and price <= 7000000 and isVisible = 1");
    }
    if($filterByPrice == 4){
      $query = $connect->query("SELECT * from product where type = $type and manufacturer=$filterByManufacturer and price >= 7000000 and price <= 13000000 and isVisible = 1");
    }
    if($filterByPrice == 5){
      $query = $connect->query("SELECT * from product where type = $type and manufacturer=$filterByManufacturer and price >= 13000000 and price <= 20000000 and isVisible = 1");
    }
    if($filterByPrice == 6){
      $query = $connect->query("SELECT * from product where type = $type and manufacturer=$filterByManufacturer and price >= 20000000 and isVisible = 1");
    }
    $data = mysqli_fetch_all($query);
  }
}
//Filter for 2
if($type === 2){
  //Filter only manu
  if($filterByManufacturer !=0 && $filterByPrice==0){
    $manu = exportNumberManu($type,$filterByManufacturer);
    $query = $connect->query("SELECT * from product where type = $type and manufacturer='$manu' and isVisible = 1");
    $data = mysqli_fetch_all($query);
  }
  //Filter only price
  if($filterByManufacturer ==0 && $filterByPrice!=0){
    if($filterByPrice == 1){
      $query = $connect->query("SELECT * from product where type = $type and price < 10000000 and isVisible = 1");
    }
    if($filterByPrice == 2){
      $query = $connect->query("SELECT * from product where type = $type and price >= 10000000 and price <= 15000000 and isVisible = 1");
    }
    if($filterByPrice == 3){
      $query = $connect->query("SELECT * from product where type = $type and price >= 15000000 and price <= 20000000 and isVisible = 1");
    }
    if($filterByPrice == 4){
      $query = $connect->query("SELECT * from product where type = $type and price >= 20000000 and price <= 25000000 and isVisible = 1");
    }
    if($filterByPrice == 5){
      $query = $connect->query("SELECT * from product where type = $type and price >= 25000000 and price <= 50000000 and isVisible = 1");
    }
    if($filterByPrice == 6){
      $query = $connect->query("SELECT * from product where type = $type and price >= 50000000 and isVisible = 1");
    }
    $data = mysqli_fetch_all($query);
  }
  //Filter both
  if($filterByManufacturer !=0 && $filterByPrice!=0){
    $manu = exportNumberManu($type,$filterByManufacturer);
    if($filterByPrice == 1){
      $query = $connect->query("SELECT * from product where type = $type and price < 10000000 and manufacturer='$manu' and isVisible = 1");
    }
    if($filterByPrice == 2){
      $query = $connect->query("SELECT * from product where type = $type and price >= 10000000 and price <= 15000000  and manufacturer='$manu' and price <= 15000000 and isVisible = 1");
    }
    if($filterByPrice == 3){
      $query = $connect->query("SELECT * from product where type = $type and price >= 15000000 and price <= 20000000  and manufacturer='$manu' and price <= 20000000 and isVisible = 1");
    }
    if($filterByPrice == 4){
      $query = $connect->query("SELECT * from product where type = $type and price >= 20000000 and price <= 25000000  and manufacturer='$manu' and price <= 25000000 and isVisible = 1");
    }
    if($filterByPrice == 5){
      $query = $connect->query("SELECT * from product where type = $type and price >= 25000000 and price <= 50000000  and manufacturer='$manu' and price <= 50000000 and isVisible = 1");
    }
    if($filterByPrice == 6){
      $query = $connect->query("SELECT * from product where type = $type and price >= 50000000 and manufacturer='$manu' and isVisible = 1");
    }
    $data = mysqli_fetch_all($query);
  }
}
//Filter for 3
if($type === 3){
  //Filter only manu
  if($filterByManufacturer !=0 && $filterByPrice==0){
    $manu = exportNumberManu($type,$filterByManufacturer);
    $query = $connect->query("SELECT * from product where type = $type and manufacturer='$manu' and isVisible = 1");
    $data = mysqli_fetch_all($query);
  }
  //Filter only price
  if($filterByManufacturer ==0 && $filterByPrice!=0){
    if($filterByPrice == 1){
      $query = $connect->query("SELECT * from product where type = $type and price < 3000000 and isVisible = 1");
    }
    if($filterByPrice == 2){
      $query = $connect->query("SELECT * from product where type = $type and price >= 3000000 and price <= 8000000 and isVisible = 1");
    }
    if($filterByPrice == 3){
      $query = $connect->query("SELECT * from product where type = $type and price >= 8000000 and price <= 15000000 and isVisible = 1");
    }
    if($filterByPrice == 4){
      $query = $connect->query("SELECT * from product where type = $type and price >= 15000000 and price <= 20000000 and isVisible = 1");
    }
    if($filterByPrice == 5){
      $query = $connect->query("SELECT * from product where type = $type and price >= 20000000 and price <= 25000000 and isVisible = 1");
    }
    if($filterByPrice == 6){
      $query = $connect->query("SELECT * from product where type = $type and price >= 25000000 and isVisible = 1");
    }
    $data = mysqli_fetch_all($query);
  }
  //Filter both
  if($filterByManufacturer !=0 && $filterByPrice!=0){
    $manu = exportNumberManu($type,$filterByManufacturer);
    if($filterByPrice == 1){
      $query = $connect->query("SELECT * from product where type = $type and price < 3000000 and manufacturer='$manu' and isVisible = 1");
    }
    if($filterByPrice == 2){
      $query = $connect->query("SELECT * from product where type = $type and price >= 3000000 and price <= 8000000 and manufacturer='$manu' and isVisible = 1");
    }
    if($filterByPrice == 3){
      $query = $connect->query("SELECT * from product where type = $type and price >= 8000000 and price <= 15000000  and manufacturer='$manu' and isVisible = 1");
    }
    if($filterByPrice == 4){
      $query = $connect->query("SELECT * from product where type = $type and price >= 15000000 and price <= 20000000 and manufacturer='$manu' and isVisible = 1");
    }
    if($filterByPrice == 5){
      $query = $connect->query("SELECT * from product where type = $type and price >= 20000000 and price <= 25000000 and manufacturer='$manu' and isVisible = 1");
    }
    if($filterByPrice == 6){
      $query = $connect->query("SELECT * from product where type = $type and price >= 25000000 and manufacturer='$manu' and isVisible = 1");
    }
    $data = mysqli_fetch_all($query);
  }
}
//Filter for 4
if($type === 4){
  //Filter only manu
  if($filterByManufacturer !=0 && $filterByPrice==0){
    $manu = exportNumberManu($type,$filterByManufacturer);
    $query = $connect->query("SELECT * from product where type = $type and manufacturer='$manu' and isVisible = 1");
    $data = mysqli_fetch_all($query);
  }
  //Filter only price
  if($filterByManufacturer ==0 && $filterByPrice!=0){
    if($filterByPrice == 1){
      $query = $connect->query("SELECT * from product where type = $type and price < 3000000 and isVisible = 1");
    }
    if($filterByPrice == 2){
      $query = $connect->query("SELECT * from product where type = $type and price >= 3000000 and price <= 8000000 and isVisible = 1");
    }
    if($filterByPrice == 3){
      $query = $connect->query("SELECT * from product where type = $type and price >= 8000000 and price <= 15000000 and isVisible = 1");
    }
    if($filterByPrice == 4){
      $query = $connect->query("SELECT * from product where type = $type and price >= 15000000 and price <= 20000000 and isVisible = 1");
    }
    if($filterByPrice == 5){
      $query = $connect->query("SELECT * from product where type = $type and price >= 20000000 and price <= 25000000 and isVisible = 1");
    }
    if($filterByPrice == 6){
      $query = $connect->query("SELECT * from product where type = $type and price >= 25000000 and isVisible = 1");
    }
    $data = mysqli_fetch_all($query);
  }
  //Filter both
  if($filterByManufacturer !=0 && $filterByPrice!=0){
    $manu = exportNumberManu($type,$filterByManufacturer);
    if($filterByPrice == 1){
      $query = $connect->query("SELECT * from product where type = $type and price < 3000000 and manufacturer='$manu' and isVisible = 1");
    }
    if($filterByPrice == 2){
      $query = $connect->query("SELECT * from product where type = $type and price >= 3000000 and price <= 8000000 and manufacturer='$manu' and isVisible = 1");
    }
    if($filterByPrice == 3){
      $query = $connect->query("SELECT * from product where type = $type and price >= 8000000 and price <= 15000000  and manufacturer='$manu' and price <= 20000000 and isVisible = 1");
    }
    if($filterByPrice == 4){
      $query = $connect->query("SELECT * from product where type = $type and price >= 15000000 and price <= 20000000 and manufacturer='$manu' and price <= 25000000 and isVisible = 1");
    }
    if($filterByPrice == 5){
      $query = $connect->query("SELECT * from product where type = $type and price >= 20000000 and price <= 25000000 and manufacturer='$manu' and price <= 50000000 and isVisible = 1");
    }
    if($filterByPrice == 6){
      $query = $connect->query("SELECT * from product where type = $type and price >= 25000000 and manufacturer='$manu' and isVisible = 1");
    }
    $data = mysqli_fetch_all($query);
  }
}
echo ceil(mysqli_num_rows($query) /10);
?>