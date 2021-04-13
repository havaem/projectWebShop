<?php
  require './controllerLogin.php';
  if($_SESSION['status'] !== 'ForgotPassword'){
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
    <link rel="stylesheet" href="../assets/css/matkhaumoi.css" />
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
                <h2>Đổi mật khẩu</h2>
                <h3>Thành viên mới ? Đăng kí <a href="./dangky.php">tại đây</a></h3>
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
                <form action="./matkhaumoi.php" class="form__content-form" method="post">
                    <input type="password" name="password" id="password" placeholder="Nhập mật khẩu của bạn" minlength="8" maxlength="32" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Bao gồm chữ thường, chữ hoa và số ví dụ : vohoaiNam123 ">
                    <input type="password" name="repassword" id="repassword" placeholder="Nhập lại mật khẩu của bạn" minlength="8" maxlength="32" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Bao gồm chữ thường, chữ hoa và số ví dụ : vohoaiNam123" >
                    <button class="form__submit" type="submit" name="newPassword">Xác nhận</button>
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
