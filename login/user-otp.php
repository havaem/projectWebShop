<?php
require_once "./controllerLogin.php";
if($_SESSION['status'] != "VerifiedAccount" && $_SESSION['status'] != "ForgotPassword"){
  header('Location: dangnhap.php');
}
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
    <link rel="stylesheet" href="../assets/css/quenmatkhau.css" />
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
                <h2>Nhập mã xác minh</h2>
                <h3>Thành viên mớii ? Đăng kí <a href="./dangky.php">tại đây</a></h3>
            </div>
            <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="form__error">
                            <?php
                            foreach($errors as $showerror){
                                echo "<p>".$showerror."</p>";
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
            <div class="form__content">
                <form action="./user-otp.php" class="form__content-form" method="POST">
                    <label for="otp">Mã xác minh của bạn :</label>
                    <input type="text" name="otp" id="otp" placeholder="Mã xác minh đã được gửi đến bạn" minlength="6" maxlength="6">
                    <button type="submit" class="form__submit" name="checkOTP">Xác nhận</button>
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
