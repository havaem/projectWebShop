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
                            <h4 class="page-title">Danh sách admin</h4>
                        </div>
                        <table class="table table-hover table-bordered table-responsive-xl mt-3">
                            <thead class="">
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col" class="text-center">Tên tài khoản</th>
                                    <th scope="col" class="text-center">Họ và tên</th>
                                    <th scope="col" class="text-center">Quyền</th>
                                    <th scope="col" class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody class="ajax-here">

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
    <!-- <script src="../../assets/vendors/js/vendor.bundle.base.js"></script> -->
    <script src="../../assets/vendors/js/vendor.bundle.addons.js"></script>
    <script src="../../assets/js/shared/off-canvas.js"></script>
    <script src="../../assets/js/shared/misc.js"></script>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            querybtnTogglePermission = () => [...document.querySelectorAll(".btnTogglePermission")];
            ajax = document.querySelector(".ajax-here");
            const renderData = () => {
                $.ajax({
                    url: "./data.php",
                    type: "POST",
                    success: function(data) {
                        ajax.innerHTML = data;
                        btnTogglePermission = querybtnTogglePermission();
                        for (i = 0; i < btnTogglePermission.length; i++) {
                            btnTogglePermission[i].onclick = function() {
                                console.log(this.getAttribute('data-idSelect'));
                                $.ajax({
                                    url: "<?= $domain . "/adminZone/actions/actionToggleLevelAdmin.php" ?>",
                                    type: "POST",
                                    data: {
                                        id: this.getAttribute('data-idSelect')
                                    },
                                    success: function(data) {
                                        console.log(data);
                                        renderData();
                                    }
                                })
                            }
                        }

                    }
                })
            }
            renderData();
        });
    </script>
</body>

</html>