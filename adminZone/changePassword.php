<?php
session_start();
include("../config.php");
$idAdminLogin = $_SESSION['idAdminLogin'];
$dataAdmin = mysqli_fetch_assoc($connect->query("SELECT * from admin where id = $idAdminLogin"));
?>
<!DOCTYPE html>
<html lang="vn">

    <head>
        <meta charset="utf-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>TECHSHOP ADMIN</title>
        <link
            rel="stylesheet"
            href="./assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
        <link
            rel="stylesheet"
            href="./assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link
            rel="stylesheet"
            href="./assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
        <link rel="stylesheet" href="./assets/vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="./assets/vendors/css/vendor.bundle.addons.css">
        <link rel="stylesheet" href="./assets/css/shared/style.css">
        <link rel="stylesheet" href="./assets/css/demo_1/style.css">
        <link rel="shortcut icon" href="./assets/images/favicon.ico"/>
        <link rel="stylesheet" href="./../assets/css/notify.css">
        <script src="./../assets/script/notyf.min.js"></script>
        <script src="./../assets/script/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <div class="container-scroller">
            <?php
        require("./navbar.php");
        ?>
            <div class="container-fluid page-body-wrapper">
                <?php
            require("./sidebar.php");
            ?>
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="col-12">
                            <div class="page-header">
                                <h4 class="page-title">Đổi mật khẩu</h4>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <form class="forms-sample" autocomplete="off"  onsubmit="return false">
                                        <div class="form-group">
                                            <label for="oldPassword">Mật khẩu cũ</label>
                                            <input
                                                type="password"
                                                class="form-control"
                                                id="oldPassword"
                                                placeholder="Enter old password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="newPassword">Mật khẩu mới</label>
                                            <input
                                                type="password"
                                                class="form-control"
                                                id="newPassword"
                                                placeholder="Enter new password"
                                                autocomplete="new-password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="reNewPassword">Nhập lại mật khẩu mới</label>
                                            <input
                                                type="password"
                                                class="form-control"
                                                id="reNewPassword"
                                                placeholder="Enter new password"
                                                autocomplete="new-password" required>
                                        </div>
                                        <button type="submit" class="btn btn-success mr-2 submitbtn">Lưu</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        require("./footer.php");
                    ?>
                </div>
            </div>
        </div>
        <script>
            var notyf = new Notyf({
                duration: 1800,
                ripple: true,
                dismissible: true,
                position: {
                    x: 'right',
                    y: 'bottom'
                }
            });
            submitbtn = document.querySelector(".submitbtn");
            submitbtn.onclick = ()=>{
                oldPW = document.querySelector("#oldPassword").value;
                newPW = document.querySelector("#newPassword").value;
                reNewPW = document.querySelector("#reNewPassword").value;
                if(oldPW && newPW && reNewPW){
                    checkOldPassword = false;
                    // Kiem tra mk cu
                    $.ajax({
                        url: "<?=$domain."/adminZone/actions/actionCheckOldPasswordAdmin.php"?>",
                        type:"POST",
                        data: {
                            oldPW
                        },
                        success: function(data) {
                            if(data == 1) checkOldPassword = true;
                            if(checkOldPassword){
                                if(oldPW != newPW){
                                    if(newPW == reNewPW){
                                        $.ajax({
                                            url: "<?=$domain."/adminZone/actions/actionChangePasswordAdmin.php"?>",
                                            type:"POST",
                                            data: {
                                                newPW
                                            },
                                            success: function(data) {
                                                notyf.success("Đổi mật khẩu thành công!");
                                            },
                                            error: function(data) {
                                                notyf.error("Đổi mật khẩu không thành công!");
                                            }
                                        })
                                    }
                                    else{
                                        notyf.error("Password nhập lại không đúng!");
                                    }
                                }
                                else{
                                    notyf.error("Password không khác nhau!");
                                }
                            } else{
                                notyf.error("Password cũ không đúng!");
                        }
                    }
                })    
                }
            }


        </script>
        <!-- <script src="./assets/vendors/js/vendor.bundle.base.js"></script> -->
        <script src="./assets/vendors/js/vendor.bundle.addons.js"></script>
        <script src="./assets/js/shared/off-canvas.js"></script>
        <script src="./assets/js/shared/misc.js"></script>
    </body>

</html>