<?php
session_start();
include("../../actions/initialState.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TECHSHOP ADMIN</title>
    <link rel="stylesheet" href="../../assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="../../assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="../../assets/css/shared/style.css">
    <link rel="stylesheet" href="../../assets/css/demo_1/style.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
    <link rel="stylesheet" href="../../../assets/css/notify.css">
    <script src="../../../assets/script/notyf.min.js"></script>
    <script src="../../../assets/script/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container-scroller">
        <?php
        require("../../navbar.php");
        ?>
        <div class="container-fluid page-body-wrapper">
            <?php
            require("../../sidebar.php");
            ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-12">
                        <div class="page-header">
                            <h4 class="page-title">Đổi thông tin người dùng</h4>
                        </div>
                        <table class="table table-hover table-bordered table-responsive-sm">
                            <thead class="">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên tài khoản</th>
                                    <th scope="col">Họ và tên</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                //Ajax here
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                require("../../footer.php");
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
                y: 'bottom',
            }
        });
        var saveInfoUser = [...document.querySelectorAll(".saveInfoUser")];
        queryAgain = () => document.getElementsByClassName("saveInfoUser");
        var deleteUser = [...document.querySelectorAll(".deleteUser")];
        deleteUserF = () => document.getElementsByClassName("deleteUser");
        renderData = () => {
            $.ajax({
                url: "<?= $domain . "/adminZone/pages/controlAccount/data.php" ?>",
                type: 'POST',
                data: {},
                success: function(data) {
                    tbody = document.querySelector(".tbody").innerHTML = data;
                    saveInfoUser = queryAgain();
                    deleteUser = deleteUserF();
                    for (var i = 0; i < saveInfoUser.length; i++) {
                        saveInfoUser[i].onclick = function() {
                            nameInput = document.querySelector(`#inputName${this.getAttribute('data-index')}`);
                            emailInput = document.querySelector(`#inputMail${this.getAttribute('data-index')}`);
                            addresslInput = document.querySelector(`#inputAddress${this.getAttribute('data-index')}`);
                            passwordInput = document.querySelector(`#inputPassword${this.getAttribute('data-index')}`);
                            checkBoxInput = document.querySelector(`.cb${this.getAttribute('data-index')}`).checked == true ? 'true' : 'false';
                            $.ajax({
                                url: "<?= $domain . "/adminZone/actions/actionUpdateInfoUser.php" ?>",
                                type: 'POST',
                                data: {
                                    id: this.getAttribute('data-idSelect'),
                                    name: nameInput.value,
                                    email: emailInput.value,
                                    address: addresslInput.value,
                                    password: passwordInput.value,
                                    isBanned: checkBoxInput
                                },
                                success: function(data) {
                                    notyf.success(data);
                                    renderData();
                                }
                            });
                        }
                    }
                    for (var i = 0; i < deleteUser.length; i++) {
                        deleteUser[i].onclick = function() {
                            $.ajax({
                                url: "<?= $domain . "/adminZone/actions/actionDeleteUser.php" ?>",
                                type: 'POST',
                                data: {
                                    id: this.getAttribute('data-idSelect'),
                                },
                                success: function(data) {
                                    notyf.success(data);
                                    renderData();
                                }
                            });
                        }
                    }

                }
            });
        }
        renderData();
    </script>
    <!-- <script src="../../assets/vendors/js/vendor.bundle.base.js"></script> -->
    <script src="../../assets/vendors/js/vendor.bundle.addons.js"></script>
    <script src="../../assets/js/shared/off-canvas.js"></script>
    <script src="../../assets/js/shared/misc.js"></script>
</body>

</html>