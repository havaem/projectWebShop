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
    <link rel="stylesheet" href="../assets/css/dangky.css" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/icon/flaticon.css" />
</head>

<body>
    <?php
    include_once('../header.php');
    ?>

    <div class="form">
        <div class="container">
            <div class="form__title">
                <h2>Tạo tài khoản TechShop</h2>
                <h3>Bạn đã là thành viên ? Đăng nhập <a href="./dangnhap.php">tại đây</a></h3>
            </div>
            <div class="form__error">
                <p>Tải khoản bạn vừa nhập đã tồn tại</p>
                <p>Email bạn vừa nhập đã tồn tại</p>
            </div>
            <div class="form__content">
                <form action="" class="form__content-form">
                    <div class="form__left">
                        <label for="username">Tên tài khoản :</label>
                        <input type="text" name="username" id="username" placeholder="Nhập tên tài khoản của bạn" minlength="8" maxlength="16" required autocomplete="off" pattern="[A-Za-z0-9]+" title="Tên tài khoản chỉ chứa kí tự và số. Tối thiểu là 8 kí tự">
                        <label for="password">Mật khẩu :</label>
                        <div class="form__left-password">
                            <input type="password" name="password" id="password" placeholder="Nhập mật khẩu của bạn" minlength="8" maxlength="32" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Bao gồm chữ thường, chữ hoa và số ví dụ : vohoaiNam123 ">
                            <i class="eye fas fa-eye"></i>
                        </div>
                        <label for="name">Họ và tên :</label>
                        <input type="text" name="name" min="5" id="name" placeholder="Nhập tên của bạn" pattern="^[^0-9]+$" title="Tên không được chứa số và tối thiểu 5 kí tự" required>
                        <label for="email">Email :</label>
                        <input type="email" name="email" id="email" placeholder="Nhập địa chỉ email của bạn" required>
                    </div>
                    <div class="form__right">
                        <label for="tel">Số điện thoại :</label>
                        <input type="number" name="tel" id="tel" placeholder="Nhập số điện thoại của bạn" pattern="(84|09|03|07|08|05)[0-9]{8}" required>
                        <label for="gender">Giới tính :</label>
                        <select name="gender" id="gender" value="1" required>
                            <option value="1">Nam</option>
                            <option value="2">Nữ</option>
                            <option value="3">Giới tính thứ ba</option>
                        </select>
                        <label for="birthday">Ngày tháng năm sinh</label>
                        <input type="date" min="1975-01-01" max="2020-01-01" name="birthday" id="birthday" required>

                        <label for="address">Địa chỉ :</label>
                        <input type="text" name="address" id="address" max="200" placeholder="Nhập địa chỉ của bạn" required>
                    </div>
                    <button class="form__submit" type="submit">ĐĂNG KÝ</button>


                </form>
            </div>
        </div>
    </div>

    <?php
    include_once('../footer.php');
    ?>

    <script>
        eye = document.querySelector('.eye');
        password = document.querySelector('#password');
        eyeStatus = true;
        eye.onclick = () => {
            if (eyeStatus === true) {
                eye.classList.add('fa-eye-slash');
                eye.classList.remove('fa-eye');
                eyeStatus = !eyeStatus;
                password.setAttribute("type", "text");
            } else {
                eye.classList.remove('fa-eye-slash');
                eye.classList.add('fa-eye');
                password.setAttribute("type", "password");
                eyeStatus = !eyeStatus;
            }
        }
    </script>
</body>

</html>