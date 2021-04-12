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
    <link rel="stylesheet" href="./assets/css/matkhaumoi.css" />
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
            <div class="form__error">
              <p>Nhập mật khẩu mới</p>
            </div>
            <div class="form__content">
                <form action="" class="form__content-form">
                    <input type="password" name="password" id="password" placeholder="Nhập mật khẩu của bạn" minlength="8" maxlength="32" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Bao gồm chữ thường, chữ hoa và số ví dụ : vohoaiNam123 ">
                    <input type="password" name="repassword" id="repassword" placeholder="Nhập mật khẩu của bạn" minlength="8" maxlength="32" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Bao gồm chữ thường, chữ hoa và số ví dụ : vohoaiNam123" >
                    <button class="form__submit" type="submit">Xác nhận</button>
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
