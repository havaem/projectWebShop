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
                            <h4 class="page-title">Quản lý đơn hàng</h4>
                        </div>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">MỚI</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">ĐANG GIAO HÀNG</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">ĐÃ GIAO HÀNG</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table table-hover table-bordered table-responsive-xl mt-3">
                                    <thead class="">
                                        <tr>
                                            <th scope="col" class="text-center">Người mua</th>
                                            <th scope="col" class="text-center">Tên sản phẩm</th>
                                            <th scope="col" class="text-center">Giá bán</th>
                                            <th scope="col" class="text-center">Địa chỉ</th>
                                            <th scope="col" class="text-center">Đổi trạng thái</th>
                                            <th scope="col" class="text-center">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tab1">
                                        <!-- Ajax tab1 -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <table class="table table-hover table-bordered table-responsive-xl mt-3">
                                    <thead class="">
                                        <tr>
                                            <th scope="col" class="text-center">Người mua</th>
                                            <th scope="col" class="text-center">Tên sản phẩm</th>
                                            <th scope="col" class="text-center">Giá bán</th>
                                            <th scope="col" class="text-center">Địa chỉ</th>
                                            <th scope="col" class="text-center">Đổi trạng thái</th>
                                            <th scope="col" class="text-center">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tab2">
                                        <!-- Ajax tab2 -->

                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <table class="table table-hover table-bordered table-responsive-xl mt-3">
                                    <thead class="">
                                        <tr>
                                            <th scope="col" class="text-center">ID</th>
                                            <th scope="col" class="text-center">Người mua</th>
                                            <th scope="col" class="text-center">Tên sản phẩm</th>
                                            <th scope="col" class="text-center">Giá bán</th>
                                            <th scope="col" class="text-center">Địa chỉ</th>
                                            <th scope="col" class="text-center">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tab3">
                                        <!-- Ajax tab3 -->
                                    </tbody>
                                </table>
                            </div>
                        </div>

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
            var notyf = new Notyf({
                duration: 1800,
                ripple: true,
                dismissible: true,
                position: {
                    x: 'right',
                    y: 'bottom',
                }
            });
            const renderTab1 = () => {
                $.ajax({
                    url: './dataTab1.php',
                    type: 'POST',
                    success: function(data) {
                        $(".tab1").html(data);
                        btnDelivery = document.querySelectorAll(".btnDelivery");
                        for (i = 0; i < btnDelivery.length; i++) {
                            btnDelivery[i].onclick = function() {
                                $.ajax({
                                    url: "<?= $domain . "/adminZone/actions/actionTransNewToDelivery.php" ?>",
                                    type: "POST",
                                    data: {
                                        id: this.getAttribute("data-idSelect")
                                    },
                                    success: function(data) {
                                        notyf.success("Đang giao hàng!!");
                                        renderAll();
                                    }
                                })
                            }
                        }
                        btnBreak = document.querySelectorAll(".btnBreak");
                        for (i = 0; i < btnBreak.length; i++) {
                            btnBreak[i].onclick = function() {
                                $.ajax({
                                    url: "<?= $domain . "/adminZone/actions/actionCancelOrder.php" ?>",
                                    type: "POST",
                                    data: {
                                        id: this.getAttribute("data-idSelect")
                                    },
                                    success: function(data) {
                                        notyf.success("Hủy đơn hàng thành công!!");
                                        renderAll();
                                    }
                                })
                            }
                        }

                    }
                })
            }
            const renderTab2 = () => {
                $.ajax({
                    url: './dataTab2.php',
                    type: 'POST',
                    success: function(data) {
                        $(".tab2").html(data);
                        btnReceived = document.querySelectorAll(".btnReceived");
                        for (i = 0; i < btnReceived.length; i++) {
                            btnReceived[i].onclick = function() {
                                console.log('click')
                                $.ajax({
                                    url: "<?= $domain . "/adminZone/actions/actionTransDeliveryToGave.php" ?>",
                                    type: "POST",
                                    data: {
                                        id: this.getAttribute("data-idSelect")
                                    },
                                    success: function(data) {
                                        notyf.success("Đã giao hàng!!");
                                        renderAll();
                                    }
                                })
                            }
                        }
                        btnBreak = document.querySelectorAll(".btnBreak");
                        for (i = 0; i < btnBreak.length; i++) {
                            btnBreak[i].onclick = function() {
                                $.ajax({
                                    url: "<?= $domain . "/adminZone/actions/actionCancelOrder.php" ?>",
                                    type: "POST",
                                    data: {
                                        id: this.getAttribute("data-idSelect")
                                    },
                                    success: function(data) {
                                        notyf.success("Hủy đơn hàng thành công!!");
                                        renderAll();
                                    }
                                })
                            }
                        }

                    }
                })
            }
            const renderTab3 = () => {
                $.ajax({
                    url: './dataTab3.php',
                    type: 'POST',
                    success: function(data) {
                        $(".tab3").html(data);
                        btnOrderDelete = document.querySelectorAll(".btnOrderDelete");
                        for (i = 0; i < btnOrderDelete.length; i++) {
                            btnOrderDelete[i].onclick = function() {
                                if (window.confirm('Bạn thực sự muốn xóa ?')) {
                                    $.ajax({
                                        url: "<?= $domain . "/adminZone/actions/actionRemoveOrder.php" ?>",
                                        type: "POST",
                                        data: {
                                            id: this.getAttribute("data-idSelect")
                                        },
                                        success: function(data) {
                                            renderAll();
                                        }
                                    })
                                }
                            }
                        }
                    }
                })
            }
            const renderAll = () => {
                renderTab1();
                renderTab2();
                renderTab3();
            }
            renderAll();
        });
    </script>
</body>

</html>