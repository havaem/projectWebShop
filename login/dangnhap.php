<?php
require './controllerLogin.php';
$_SESSION['status'] = null;
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
    <link rel="stylesheet" href="../assets/css/dangnhap.css" />
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
                <h2>Chào mừng bạn đến với TechShop</h2>
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
                <form action="./dangnhap.php" class="form__content-form" method="post">
                    <label for="username">Tên tài khoản :</label>
                    <input value="<?php echo $username; ?>" type="text" name="username" id="username" placeholder="Nhập tên tài khoản của bạn" maxlength="16" required autocomplete="off">
                    <!-- <p id="username-error">Tên tài khoản đã tồn tại</p> -->
                    <label for="password">Mật khẩu :</label>
                    <input value="<?php echo $password; ?>" type="password" name="password" id="password" placeholder="Nhập mật khẩu của bạn" maxlength="32" required>
                    <button class="form__submit" type="submit" name="login">ĐĂNG NHẬP</button>
                </form>
                <div class="form__content__forgot">
                    <a href="./quenmatkhau.php">Quên mật khẩu?</a>
                </div>
            </div>
        </div>
    </div>
    <?php
      include_once('../footer.php');
    ?>

   
  </body>
</html>
