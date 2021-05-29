<?php
$id = isset($_REQUEST["id"]) ? (int)$_REQUEST["id"] : 0;
if ($id !== 0) {
    $code = rand(100000, 999999);
    $connect = mysqli_connect('localhost', 'admin', 'admin', 'cnpm webshop');
    $connect->query("UPDATE user set otp = $code where id = $id") or die("Error");
    $resultEmail = $connect->query("SELECT email from user where id= $id") or die('mysqli_error');
    $rowEmail = mysqli_fetch_assoc($resultEmail);
    $email = $rowEmail['email'];
    $subject = "MÃ XÁC MINH";
    $message = "<p style=''>Mã xác minh của bạn là </p><b style='padding-left:30px;color:red;'>$code</b>";
    $sender = 'MIME-Version: 1.0' . "\r\n";
    $sender .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $sender .= "From: ADMIN TECHSHOP";
    if (mail($email, $subject, $message, $sender)) {
        echo "Mã xác minh đã được gửi đến email của bạn";
    }
}
