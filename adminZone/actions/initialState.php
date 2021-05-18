<?php
include("../../../config.php");
if (!isset($_SESSION['idAdminLogin'])) {
    header('Location: ../../../index.php');
}
$idAdminLogin = $_SESSION['idAdminLogin'];
$dataAdmin = mysqli_fetch_assoc($connect->query("SELECT * from admin where id = $idAdminLogin"));
$sumView = mysqli_fetch_assoc($connect->query("SELECT SUM(view) as sum FROM product"))['sum'];
$sumBuy = mysqli_fetch_assoc($connect->query("SELECT COUNT(id_order) as sum FROM theorder"))['sum'];
$sumUser = mysqli_fetch_assoc($connect->query("SELECT COUNT(id) as sum FROM user"))['sum'];
$sumRate = mysqli_fetch_assoc($connect->query("SELECT COUNT(id_product) as sum FROM rate"))['sum'];
$sumOrder = mysqli_fetch_assoc($connect->query("SELECT COUNT(id_order) as sum FROM theorder"))['sum'];
$sumOrderPrice = mysqli_fetch_assoc($connect->query("SELECT SUM(price) as sum FROM theorder"))['sum'];
$sumComment = mysqli_fetch_assoc($connect->query("SELECT COUNT(id) as sum FROM comment"))['sum'];
$tableViewProduct = mysqli_fetch_all($connect->query("SELECT name,view,type FROM product ORDER by view DESC LIMIT 4"));
// table User Create
$resultTableUserCreateData = $connect->query("SELECT date_created FROM user");
$tableUserCreate = array(0,0,0,0,0,0,0,0,0,0,0,0);
while($tableUserCreateData = mysqli_fetch_assoc($resultTableUserCreateData)){
    $now = date("Y");
    $dateCr = strtotime($tableUserCreateData['date_created']);
    if($now == date('Y',$dateCr)){
        $dateCr = date('m',$dateCr);
        for($i = 0;$i<count($tableUserCreate);$i++){
            if((int)$dateCr === $i){
                $tableUserCreate[$i]+=1;
            }
        }
    }
}
// table Order
$resultTableOrder = $connect->query("SELECT order_time FROM theorder");
$tableOrder = array(0,0,0,0,0,0,0,0,0,0,0,0);
while($tableUserCreateData = mysqli_fetch_assoc($resultTableOrder)){
    $now = date("Y");
    $dateCr = strtotime($tableUserCreateData['order_time']);
    if($now == date('Y',$dateCr)){
        $dateCr = date('m',$dateCr);
        for($i = 0;$i<count($tableOrder);$i++){
            if((int)$dateCr === $i){
                $tableOrder[$i]+=1;
            }
        }
    }
}
//tableUserSignUpSuccess
$tableUserSignUpSuccess = mysqli_fetch_all($connect->query("SELECT name,date_created FROM user ORDER by date_created DESC LIMIT 5"));