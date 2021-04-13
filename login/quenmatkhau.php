<?php
require './controllerLogin.php';
?>
<!DOCTYPE html>
<html lang="vn">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TECHSHOP ✔</title>
    <link rel="icon" href="../assets/image/icon.png" sizes="" />
    <!-- Reset CSS -->
    <link rel="stylesheet" href="../assets/css/reset.css" />
    <!-- Source CSS -->
    <link rel="stylesheet" href="../assets/css/nhapCodeQMK.css" />
    <!-- FontAwesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />
    <link rel="stylesheet" type="text/css" href="../assets/icon/flaticon.css" />
  </head>
  <body>
    <?php
      include_once('../header.php');
    ?>
    
    <div class="form">
        <div class="container">
            <div class="form__title">
                <h2>Bạn quên mật khẩu ?</h2>
                <h3>Thành viên mớii ? Đăng kí <a href="./dangky.php">tại đây</a></h3>
            </div>
            <?php
                if(count($errors)>0){
                    echo '<div class="form__error">';
                    foreach($errors as $showerror){
                        echo '<p>'.$showerror.'</p>';
                    }
                    echo '</div>';
                }
            ?> 
            <div class="form__content">
                <form action="./quenmatkhau.php" class="form__content-form" method="post">
                    <label for="email">Email của bạn :</label>
                    <input type="email" name="email" id="email" placeholder="Nhập email của bạn" required>
                    <button class="form__submit" type="submit" name="forgotPassword">GỬI OTP</button>
                </form>
            </div>
        </div>
    </div>
    <?php
      include_once('../footer.php');
    ?>
    <script>
     
      
    </script>
  </body>
</html>
