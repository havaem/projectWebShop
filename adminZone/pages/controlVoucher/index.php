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
                            <h4 class="page-title">Quản lý coupon</h4>
                        </div>
                        <button class="btn btn-success mb-2" data-target="#exampleModal" data-toggle="modal">THÊM COUPON MỚI</button>
                        <table class="table table-hover table-bordered table-responsive-md">
                            <thead class="">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Loại</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Chi tiết</th>
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col">Ngày hết hạn</th>
                                    <th scope="col">Lượt sử dụng</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                <!-- //Ajax here -->
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tạo coupon mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample">
                        <div class="form-group row">
                            <label for="newCode" class="col-sm-3 col-form-label">Code</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="newCode">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="newType" class="col-sm-3 col-form-label">Loại</label>
                            <div class="col-sm-9">
                                <select class="form-control form-control-lg" id="newType">
                                    <option value="1">Giảm theo tiền</option>
                                    <option value="2">Giảm theo %</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="newDetail" class="col-sm-3 col-form-label">Giảm</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="newDetail">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="newTimes" class="col-sm-3 col-form-label">Lượt</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="newTimes">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="newExpiryDate" class="col-sm-3 col-form-label">Ngày hết hạn</label>
                            <div class="col-sm-9">
                                <input type="date" value="" class="form-control" id="newExpiryDate">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ĐÓNG</button>
                    <button type="button" class="btn btn-success addInfoCoupon" data-dismiss="modal" data-index="0" data-idselect="1">LƯU THAY ĐỔI</button>
                </div>
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
        document.querySelector(".addInfoCoupon").onclick = function() {
            newCode = document.querySelector("#newCode");
            newType = document.querySelector("#newType");
            newDetail = document.querySelector("#newDetail");
            newTimes = document.querySelector("#newTimes");
            newExpiryDate = document.querySelector("#newExpiryDate");
            $.ajax({
                url: "<?= $domain . "/adminZone/actions/actionAddVoucher.php" ?>",
                type: 'POST',
                data: {
                    newCode: newCode.value,
                    newType: newType.value,
                    newDetail: newDetail.value,
                    newTimes: newTimes.value,
                    newExpiryDate: newExpiryDate.value,
                },
                success: function(data) {
                    notyf.success(data);
                    renderData();
                }
            });
        }
        var saveInfoCoupon = [...document.querySelectorAll(".saveInfoCoupon")];
        queryAgain = () => document.getElementsByClassName("saveInfoCoupon");
        var deleteCoupon = [...document.querySelectorAll(".deleteCoupon")];
        deleteCouponF = () => document.getElementsByClassName("deleteCoupon");
        renderData = () => {
            $.ajax({
                url: "<?= $domain . "/adminZone/pages/controlVoucher/data.php" ?>",
                type: 'POST',
                data: {},
                success: function(data) {
                    tbody = document.querySelector(".tbody").innerHTML = data;
                    saveInfoCoupon = queryAgain();
                    deleteCoupon = deleteCouponF();
                    for (var i = 0; i < saveInfoCoupon.length; i++) {
                        saveInfoCoupon[i].onclick = function() {
                            Code = document.querySelector(`#Code${this.getAttribute('data-index')}`);
                            Type = document.querySelector(`.Type${this.getAttribute('data-index')}`);
                            Detail = document.querySelector(`#Detail${this.getAttribute('data-index')}`);
                            Times = document.querySelector(`#Times${this.getAttribute('data-index')}`);
                            ExpiryDate = document.querySelector(`#ExpiryDate${this.getAttribute('data-index')}`);
                            $.ajax({
                                url: "<?= $domain . "/adminZone/actions/actionUpdateVoucher.php" ?>",
                                type: 'POST',
                                data: {
                                    id: this.getAttribute('data-idSelect'),
                                    Code: Code.value,
                                    Type: Type.value,
                                    Detail: Detail.value,
                                    Times: Times.value,
                                    ExpiryDate: ExpiryDate.value,
                                },
                                success: function(data) {
                                    notyf.success(data);
                                    renderData();
                                }
                            });
                        }
                    }
                    for (var i = 0; i < deleteCoupon.length; i++) {
                        deleteCoupon[i].onclick = function() {
                            if (window.confirm('Bạn thực sự muốn xóa ?')) {
                                $.ajax({
                                    url: "<?= $domain . "/adminZone/actions/actionDeleteCoupon.php" ?>",
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