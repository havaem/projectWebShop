<!DOCTYPE html>
<html lang="vn">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TECHSHOP ✔</title>
    <link rel="icon" href="./assets/image/icon.png" sizes="" />
    <!-- Reset CSS -->
    <link rel="stylesheet" href="./assets/css/reset.css" />
    <!-- Source CSS -->
    <link rel="stylesheet" href="./assets/css/nhapCodeQMK.css" />
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
            <div class="form__error">
              <p>Email bạn vừa nhập không tồn tại!</p>
            </div>
            <div class="form__content">
                <form action="" class="form__content-form">
                    <label for="username">Email của bạn :</label>
                    <input type="text" name="username" id="username" placeholder="Nhập tên tài khoản của bạn" maxlength="16" required autocomplete="off">
                    <button class="form__submit" type="submit">GỬI OTP</button>
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
