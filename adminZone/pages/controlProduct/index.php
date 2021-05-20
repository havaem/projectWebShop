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
                            <h4 class="page-title">Quản lý sản phẩm</h4>
                        </div>
                        <button class="btn btn-success mb-2" data-target=".addNewProduct" data-toggle="modal">THÊM SẢN PHẨM MỚI</button>
                        <table class="table table-hover table-bordered table-responsive">
                            <thead class="">
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th class="text-center" scope="col">Loại sản phẩm</th>
                                    <th class="text-center" scope="col">Giá bán</th>
                                    <th class="text-center" scope="col">Kho</th>
                                    <th class="text-center" scope="col">Trang chủ</th>
                                    <th class="text-center" scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody class="loadDataHere">

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
    <div class="modal fade addNewProduct" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">THÊM SẢN PHẨM</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="new-home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">THÔNG TIN SẢN PHẨM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="new-profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">CẤU HÌNH SẢN PHẨM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="new-contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">MÔ TẢ SẢN PHẨM</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="new-home-tab">
                            <form class="forms-sample mt-3">
                                <div class="form-group">
                                    <label for="newProductInputType">Loại sản phẩm</label>
                                    <select class="form-control form-control-lg" id="newProductInputType">
                                        <option value="1">Điện thoại</option>
                                        <option value="2">Laptop</option>
                                        <option value="3">Máy tính bảng</option>
                                        <option value="4">Đồng hồ thông minh</option>
                                        <!-- <option value="5">Màn hình máy tính</option> -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="newProductInputManu">Hãng sản xuất</label>
                                    <select class="form-control form-control-lg" id="newProductInputManu">
                                        <option value="1">Apple</option>
                                        <option value="2">Samsung</option>
                                        <option value="3">Huawei</option>
                                        <option value="4">Lenovo</option>
                                        <option value="5">Masstel</option>
                                        <option value="6">Oppo</option>
                                        <option value="7">Xiaomi</option>
                                        <option value="8">Vivo</option>
                                        <option value="9">Mi Watch</option>
                                        <option value="10">BeU</option>
                                        <option value="11">Kidcare</option>
                                        <option value="12">Suunto</option>
                                        <option value="13">Garmin Lily</option>
                                        <option value="14">Huami</option>
                                        <option value="15">Acer</option>
                                        <option value="16">Asus</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="newProductInputImage" class="col-sm-3 col-form-label">Ảnh sản phẩm</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="newProductInputImage" accept="image/png, image/jpeg" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="newProductInputName" class="col-sm-3 col-form-label">Tên sản phẩm</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="newProductInputName" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="newProductInputPrice" class="col-sm-3 col-form-label">Giá sản phẩm</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="newProductInputPrice" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="newProductInputQuanity" class="col-sm-3 col-form-label">Số lượng</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="newProductInputQuanity" required />
                                    </div>
                                </div>

                                <div class="form-check row float-right mr-3">
                                    <div class="form-check form-check-flat">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input newProductShow" required /> Hiển thị <i class="input-helper"></i></label>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade mt-3 tab2" id="profile" role="tabpanel" aria-labelledby="new-profile-tab">
                            <div class="container col-12">
                                <div class="row InputInfoType newInputInfoType">

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="new-contact-tab">
                            <div class="container col-12 mt-3">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <div class="d-flex justify-content-center col-12" role="group" aria-label="Button group">
                                            <button type="button" class="btn btn-primary btn-fw btnContentTitle" data-show="">TITLE</button>
                                            <button type="button" class="btn btn-primary btn-fw btnContentH1" data-show="">H1</button>
                                            <button type="button" class="btn btn-primary btn-fw btnContentH2" data-show="">H2</button>
                                            <button type="button" class="btn btn-primary btn-fw btnContentP" data-show="">P</button>
                                            <button type="button" class="btn btn-primary btn-fw btnContentIMG" data-show="">IMG</button>
                                        </div>
                                        <textarea class="form-control mt-3" id="newDescriptionProduct" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ĐÓNG</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">LƯU THAY ĐỔI</button>
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
        //<------ Form new ------->
        newProductInputType = document.querySelector("#newProductInputType"); // Loại sản phẩm đã chọn
        newInputInfoType = document.querySelector(".newInputInfoType");
        newTab2 = document.querySelector("#new-profile-tab");
        //click tab 2 sẽ load lại data dựa theo type
        newTab2.onclick = function() {
            let valueSwitch = newProductInputType.value;
            if (valueSwitch == 1) {
                newInputInfoType.innerHTML = `<div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-3">
                                        <label for="newPhoneInputScreen" class="col-2 col-form-label">Screen</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newPhoneInputScreen" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-3">
                                        <label for="newPhoneInputOS" class="col-2 col-form-label">OS</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newPhoneInputOS" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-3">
                                        <label for="newPhoneInputFCAM" class="col-2 col-form-label">FCAM</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newPhoneInputFCAM" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-3">
                                        <label for="newPhoneInputBCAM" class="col-2 col-form-label">BCAM</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newPhoneInputBCAM" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-3">
                                        <label for="newPhoneInputCPU" class="col-2 col-form-label">CPU</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newPhoneInputCPU" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-3">
                                        <label for="newPhoneInputRAM" class="col-2 col-form-label">RAM</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newPhoneInputRAM" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-3">
                                        <label for="newPhoneInputROM" class="col-2 col-form-label">ROM</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newPhoneInputROM" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-3">
                                        <label for="newPhoneInputSIM" class="col-2 col-form-label">SIM</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newPhoneInputSIM" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-3">
                                        <label for="newPhoneInputPIN" class="col-2 col-form-label">PIN</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newPhoneInputPIN" required />
                                        </div>
                                    </div>`;
            } else if (valueSwitch == 2) {
                newInputInfoType.innerHTML = `<div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4">
                                        <label for="newLaptopInputCPU" class="col-2 col-form-label">CPU</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newLaptopInputCPU" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4">
                                        <label for="newLaptopInputRAM" class="col-2 col-form-label">RAM</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newLaptopInputRAM" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4">
                                        <label for="newLaptopInputROM" class="col-2 col-form-label">ROM</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newLaptopInputROM" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4">
                                        <label for="newLaptopInputScreen" class="col-2 col-form-label">Screen</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newLaptopInputScreen" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4">
                                        <label for="newLaptopInputVGA" class="col-2 col-form-label">VGA</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newLaptopInputVGA" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4">
                                        <label for="newLaptopInputConnector" class="col-2 col-form-label">Connector</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newLaptopInputConnector" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4">
                                        <label for="newLaptopInputOS" class="col-2 col-form-label">OS</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newLaptopInputOS" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4">
                                        <label for="newLaptopInputDesign" class="col-2 col-form-label">Design</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newLaptopInputDesign" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4">
                                        <label for="newLaptopInputSize" class="col-2 col-form-label">Size</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newLaptopInputSize" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4">
                                        <label for="newLaptopInputReleaseDate" class="col-2 col-form-label">RDate</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newLaptopInputReleaseDate" required />
                                        </div>
                                    </div>`;
            } else if (valueSwitch == 3) {
                newInputInfoType.innerHTML = `<div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4">
                                        <label for="newTabletInputScreen" class="col-2 col-form-label">Screen</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newTabletInputScreen" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4">
                                        <label for="newTabletInputOS" class="col-2 col-form-label">OS</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newTabletInputOS" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4">
                                        <label for="newTabletInputCPU" class="col-2 col-form-label">CPU</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newTabletInputCPU" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4">
                                        <label for="newTabletInputRAM" class="col-2 col-form-label">RAM</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newTabletInputRAM" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4">
                                        <label for="newTabletInputROM" class="col-2 col-form-label">ROM</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newTabletInputROM" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4">
                                        <label for="newTabletInputcamF" class="col-2 col-form-label">camF</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newTabletInputcamF" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4">
                                        <label for="newTabletInputCamB" class="col-2 col-form-label">CamB</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newTabletInputCamB" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4">
                                        <label for="newTabletInputPin" class="col-2 col-form-label">Pin</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newTabletInputPin" required />
                                        </div>
                                    </div>`;
            } else if (valueSwitch == 4) {
                newInputInfoType.innerHTML = `<div class="form-group row col-xs-12 col-md-6 col-lg-6 col-xl-6">
                                        <label for="newWatchInputScreen" class="col-2 col-form-label">Screen</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newWatchInputScreen" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-6">
                                        <label for="newWatchInputScreenSize" class="col-2 col-form-label">ScreenSize</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newWatchInputScreenSize" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-6">
                                        <label for="newWatchInputTimePin" class="col-2 col-form-label">TimePin</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newWatchInputTimePin" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-6">
                                        <label for="newWatchInputOS" class="col-2 col-form-label">OS</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newWatchInputOS" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-6">
                                        <label for="newWatchInputOSConnect" class="col-2 col-form-label">OSConnect</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newWatchInputOSConnect" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-6">
                                        <label for="newWatchInputScreenMaterial" class="col-2 col-form-label">ScreenMaterial</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newWatchInputScreenMaterial" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-6">
                                        <label for="newWatchInputScreenHeight" class="col-2 col-form-label">ScreenHeight</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newWatchInputScreenHeight" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-6">
                                        <label for="newWatchInputConnect" class="col-2 col-form-label">Connect</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newWatchInputConnect" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-6">
                                        <label for="newWatchInputLanguage" class="col-2 col-form-label">Language</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newWatchInputLanguage" required />
                                        </div>
                                    </div>
                                    <div class="form-group row col-xs-12 col-md-6 col-lg-4 col-xl-6">
                                        <label for="newWatchInputFollowHealth" class="col-2 col-form-label">FollowHealth</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="newWatchInputFollowHealth" required />
                                        </div>
                                    </div>`;
            }
        }

        // btnClipboard 
        btnContentTitle = document.querySelector(".btnContentTitle");
        btnContentH1 = document.querySelector(".btnContentH1");
        btnContentH2 = document.querySelector(".btnContentH2");
        btnContentP = document.querySelector(".btnContentP");
        btnContentIMG = document.querySelector(".btnContentIMG")
        newDescriptionProduct = document.querySelector("#newDescriptionProduct");
        btnContentTitle.onclick = function() {
            if (newDescriptionProduct.value) {
                newDescriptionProduct.value += '\n';
            }
            newDescriptionProduct.value += `<b class="paragraph__title"> </b>`;
        }
        btnContentH1.onclick = function() {
            if (newDescriptionProduct.value) {
                newDescriptionProduct.value += '\n';
            }
            newDescriptionProduct.value += `<h1 class="paragraph__h1"> </h1>`;
        }
        btnContentH2.onclick = function() {
            if (newDescriptionProduct.value) {
                newDescriptionProduct.value += '\n';
            }
            newDescriptionProduct.value += `<h2 class="paragraph__h2"> </h2>`;
        }
        btnContentP.onclick = function() {
            if (newDescriptionProduct.value) {
                newDescriptionProduct.value += '\n';
            }
            newDescriptionProduct.value += `<p class="paragraph__p"> </p>`;
        }
        btnContentIMG.onclick = function() {
            if (newDescriptionProduct.value) {
                newDescriptionProduct.value += '\n';
            }
            newDescriptionProduct.value += `<img class="paragraph__img" src="LINK" alt="">`;
        }
        //Get all btn edit product
        btnEditProduct = document.getElementsByClassName("btnEditProduct");
        querybtnEditProduct = () => document.getElementsByClassName("btnEditProduct");
        //Render data 
        loadDataHere = document.querySelector(".loadDataHere");
        renderData = () => {
            $.ajax({
                url: "<?= $domain . "/adminZone/pages/controlProduct/data.php" ?>",
                type: "POST",
                data: {},
                success: function(data) {
                    loadDataHere.innerHTML = data;
                    btnEditProduct = querybtnEditProduct();
                    for (i = 0; i < btnEditProduct.length; i++) {
                        btnEditProduct[i].onclick = function() {
                            // console.log(this.getAttribute('data-idSelect'))
                            window.location.href = `<?=$domain."/adminZone/pages/controlProduct/editData.php?id="?>${this.getAttribute('data-idSelect')}`;
                            /* $.ajax({
                                url: "<?= $domain . "/adminZone/pages/controlProduct/modalPopup.php" ?>",
                                type: "POST",
                                data: {
                                    id: this.getAttribute('data-idSelect')
                                },
                                success: function(data) {}
                            }) */
                        }
                    }
                }
            })
        }
        renderData();
    </script>
    <!-- <script src="../../assets/vendors/js/vendor.bundle.base.js"></script> -->
    <script src="../../assets/vendors/js/vendor.bundle.addons.js"></script>
    <script src="../../assets/js/shared/off-canvas.js"></script>
    <script src="../../assets/js/shared/misc.js"></script>
</body>

</html>