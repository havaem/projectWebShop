<?php
session_start();
if(isset($_SESSION['idAdminLogin'])){
    header('Location: ./pages/dashboard/dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="vn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN✔</title>
    <link rel="icon" href="../assets/image/icon.png" sizes="">
    <!-- Reset CSS -->
    <link rel="stylesheet" href="../assets/css/reset.css">
    <!-- Source CSS -->
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/icon/flaticon.css">
    <script src="../assets/script/jquery-3.6.0.min.js"></script>
    <script src="../assets/script/notyf.min.js"></script>
    <link rel="stylesheet" href="../assets/css/notify.css">
</head>

<body>
    <div class="container">
        <div class="overlay"></div>
        <form action="./index.php" method="post" class="form">
            <h1 class="form__title">
                ĐĂNG NHẬP
            </h1>
            <div class="form__username">
                <h2 class="form__username-title form-title">Tài khoản: </h2>
                <input value="" type="text" class="form__username-input form-input" placeholder="Nhập tài khoản" autocomplete="off" required />
            </div>
            <div class="form__password">
                <h2 class="form__password-title form-title">Mật khẩu: </h2>
                <input value="" type="password" class="form__password-input form-input" placeholder="Nhập mật khẩu" autocomplete="off" required />
            </div>
            <button class="form__button" name="adminLogin">ĐĂNG NHẬP</button>
        </form>
    </div>
</body>
<script>
    var notyf = new Notyf({
        duration: 2000,
        ripple: true,
        dismissible: true,
        position: {
            x: 'right',
            y: 'bottom',
        }
    });
    form = document.querySelector(".form");
    form.onsubmit = function(event) {
        event.preventDefault();
    }
    btnLogin = document.querySelector(".form__button");
    inpUsername = document.querySelector(".form__username-input")
    inpPassword = document.querySelector(".form__password-input")
    btnLogin.onclick = () => {
        $.ajax({
            url: "./actions/actionLogin.php",
            type: "POST",
            data: {
                username: inpUsername.value,
                password: inpPassword.value
            },
            success: function(data) {
                if(data == 1){
                    notyf.success('Đăng nhập thành công !!');
                    setTimeout(()=>{
                        window.location.href = './pages/dashboard/dashboard.php';
                    },2000)
                }
                else{
                    notyf.error('Sai tên tài khoản hoặc mật khẩu !!');
                }
            },
            error: function(data) {
                console.log(data);
            }
        })
    }
</script>

</html>