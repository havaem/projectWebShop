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
                    <h4 class="modal-title btnAddNewProduct" id="myLargeModalLabel">THÊM SẢN PHẨM</h4>
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
                                            <button type="button" class="btn btn-warning btn-fw btnContentMore" data-show="">Xem thêm</button>
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
                    <button type="button" class="btn btn-success btnSubmit" data-dismiss="modal">THÊM</button>
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
        //Get data to add new Product 
        btnSubmit = document.querySelector(".btnSubmit");
        btnSubmit.onclick = function() {
            // idProductInput = ; // id sản phẩm
            newProductInputType = document.querySelector("#newProductInputType").value;
            newProductInputManu = document.querySelector("#newProductInputManu").value;
            newProductInputName = document.querySelector("#newProductInputName").value;
            newProductInputPrice = document.querySelector("#newProductInputPrice").value;
            newProductInputQuanity = document.querySelector("#newProductInputQuanity").value;
            newProductShow = document.querySelector(".newProductShow").checked === true ? '1' : '0';
            newDescriptionProduct = document.querySelector("#newDescriptionProduct").value
            //Điện thoại
            if (newProductInputType == 1) {
                newPhoneInputScreen = document.querySelector("#newPhoneInputScreen").value
                newPhoneInputOS = document.querySelector("#newPhoneInputOS").value
                newPhoneInputFCAM = document.querySelector("#newPhoneInputFCAM").value
                newPhoneInputBCAM = document.querySelector("#newPhoneInputBCAM").value
                newPhoneInputCPU = document.querySelector("#newPhoneInputCPU").value
                newPhoneInputRAM = document.querySelector("#newPhoneInputRAM").value
                newPhoneInputROM = document.querySelector("#newPhoneInputROM").value
                newPhoneInputSIM = document.querySelector("#newPhoneInputSIM").value
                newPhoneInputPIN = document.querySelector("#newPhoneInputPIN").value
            }
            //Laptop
            else if (newProductInputType == 2) {
                newLaptopInputCPU = document.querySelector("#newLaptopInputCPU").value
                newLaptopInputRAM = document.querySelector("#newLaptopInputRAM").value
                newLaptopInputROM = document.querySelector("#newLaptopInputROM").value
                newLaptopInputScreen = document.querySelector("#newLaptopInputScreen").value
                newLaptopInputVGA = document.querySelector("#newLaptopInputVGA").value
                newLaptopInputConnector = document.querySelector("#newLaptopInputConnector").value
                newLaptopInputOS = document.querySelector("#newLaptopInputOS").value
                newLaptopInputDesign = document.querySelector("#newLaptopInputDesign").value
                newLaptopInputSize = document.querySelector("#newLaptopInputSize").value
                newLaptopInputReleaseDate = document.querySelector("#newLaptopInputReleaseDate").value
            }
            //Máy tính bảng
            else if (newProductInputType == 3) {
                newTabletInputScreen = document.querySelector("#newTabletInputScreen").value
                newTabletInputOS = document.querySelector("#newTabletInputOS").value
                newTabletInputCPU = document.querySelector("#newTabletInputCPU").value
                newTabletInputRAM = document.querySelector("#newTabletInputRAM").value
                newTabletInputROM = document.querySelector("#newTabletInputROM").value
                newTabletInputcamF = document.querySelector("#newTabletInputcamF").value
                newTabletInputCamB = document.querySelector("#newTabletInputCamB").value
                newTabletInputPin = document.querySelector("#newTabletInputPin").value
            }
            // Đồng hồ thông minh
            else if (newProductInputType == 4) {
                newWatchInputScreen = document.querySelector("#newWatchInputScreen").value
                newWatchInputScreenSize = document.querySelector("#newWatchInputScreenSize").value
                newWatchInputTimePin = document.querySelector("#newWatchInputTimePin").value
                newWatchInputOS = document.querySelector("#newWatchInputOS").value
                newWatchInputOSConnect = document.querySelector("#newWatchInputOSConnect").value
                newWatchInputScreenMaterial = document.querySelector("#newWatchInputScreenMaterial").value
                newWatchInputScreenHeight = document.querySelector("#newWatchInputScreenHeight").value
                newWatchInputConnect = document.querySelector("#newWatchInputConnect").value
                newWatchInputLanguage = document.querySelector("#newWatchInputLanguage").value
                newWatchInputFollowHealth = document.querySelector("#newWatchInputFollowHealth").value
            }
            //Lưu ảnh vào storage
            let fd = new FormData();
            let newProductInputImage = $('#newProductInputImage')[0].files;
            if (newProductInputImage.length > 0) {
                fd.append('file', newProductInputImage[0]);
                fd.set('nameProduct', newProductInputName);
                fd.set('typeProduct', newProductInputType);
                $.ajax({
                    url: '<?= $domain . "/adminZone/actions/actionUploadImage.php" ?>',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        let imgSource = data;
                        //điện thoại 
                        if (newProductInputType == 1) {
                            $.ajax({
                                url: '<?= $domain . "/adminZone/actions/actionAddProduct.php" ?>',
                                type: 'POST',
                                data: {
                                    type: newProductInputType,
                                    manufacturer: newProductInputManu,
                                    name: newProductInputName,
                                    price: newProductInputPrice,
                                    quanity: newProductInputQuanity,
                                    isVisible: newProductShow,
                                    img: imgSource,
                                    desc: newDescriptionProduct,
                                    phoneScreen: newPhoneInputScreen,
                                    phoneOS: newPhoneInputOS,
                                    phoneFCAM: newPhoneInputFCAM,
                                    phoneBCAM: newPhoneInputBCAM,
                                    phoneCPU: newPhoneInputCPU,
                                    phoneRAM: newPhoneInputRAM,
                                    phoneROM: newPhoneInputROM,
                                    phoneSIM: newPhoneInputSIM,
                                    phonePIN: newPhoneInputPIN,
                                },
                                success: function(data) {
                                    window.location.reload();
                                    renderData();
                                    loadTab2();
                                },
                            });
                        } else if (newProductInputType == 2) {
                            $.ajax({
                                url: '<?= $domain . "/adminZone/actions/actionAddProduct.php" ?>',
                                type: 'POST',
                                data: {
                                    type: newProductInputType,
                                    manufacturer: newProductInputManu,
                                    name: newProductInputName,
                                    price: newProductInputPrice,
                                    quanity: newProductInputQuanity,
                                    isVisible: newProductShow,
                                    desc: newDescriptionProduct,
                                    img: imgSource,
                                    laptopCPU: newLaptopInputCPU,
                                    laptopRAM: newLaptopInputRAM,
                                    laptopROM: newLaptopInputROM,
                                    laptopScreen: newLaptopInputScreen,
                                    laptopVGA: newLaptopInputVGA,
                                    laptopConnector: newLaptopInputConnector,
                                    laptopOS: newLaptopInputOS,
                                    laptopDesign: newLaptopInputDesign,
                                    laptopSize: newLaptopInputSize,
                                    laptopReleaseDate: newLaptopInputReleaseDate,
                                },
                                success: function(data) {
                                    window.location.reload();
                                    renderData();
                                    loadTab2();
                                },
                            });
                        } else if (newProductInputType == 3) {
                            $.ajax({
                                url: '<?= $domain . "/adminZone/actions/actionAddProduct.php" ?>',
                                type: 'POST',
                                data: {
                                    type: newProductInputType,
                                    manufacturer: newProductInputManu,
                                    name: newProductInputName,
                                    price: newProductInputPrice,
                                    quanity: newProductInputQuanity,
                                    isVisible: newProductShow,
                                    desc: newDescriptionProduct,
                                    img: imgSource,
                                    tabletScreen: newTabletInputScreen,
                                    tabletOS: newTabletInputOS,
                                    tabletCPU: newTabletInputCPU,
                                    tabletRAM: newTabletInputRAM,
                                    tabletROM: newTabletInputROM,
                                    tabletcamF: newTabletInputcamF,
                                    tabletCamB: newTabletInputCamB,
                                    tabletPin: newTabletInputPin,
                                },
                                success: function(data) {
                                    window.location.reload();
                                    renderData();
                                    loadTab2();
                                },
                            });
                        } else if (newProductInputType == 4) {
                            $.ajax({
                                url: '<?= $domain . "/adminZone/actions/actionAddProduct.php" ?>',
                                type: 'POST',
                                data: {
                                    type: newProductInputType,
                                    manufacturer: newProductInputManu,
                                    name: newProductInputName,
                                    price: newProductInputPrice,
                                    quanity: newProductInputQuanity,
                                    isVisible: newProductShow,
                                    desc: newDescriptionProduct,
                                    img: imgSource,
                                    watchScreen: newWatchInputScreen,
                                    watchScreenSize: newWatchInputScreenSize,
                                    watchTimePin: newWatchInputTimePin,
                                    watchOS: newWatchInputOS,
                                    watchOSConnect: newWatchInputOSConnect,
                                    watchScreenMaterial: newWatchInputScreenMaterial,
                                    watchScreenHeight: newWatchInputScreenHeight,
                                    watchConnect: newWatchInputConnect,
                                    watchLanguage: newWatchInputLanguage,
                                    watchFollowHealth: newWatchInputFollowHealth,
                                },
                                success: function(data) {
                                    window.location.reload();
                                    renderData();
                                    loadTab2();
                                },
                            });
                        }

                    },
                });
            }
            // không upload ảnh
            else {
                //điện thoại 
                if (newProductInputType == 1) {
                    $.ajax({
                        url: '<?= $domain . "/adminZone/actions/actionAddProduct.php" ?>',
                        type: 'POST',
                        data: {
                            type: newProductInputType,
                            manufacturer: newProductInputManu,
                            name: newProductInputName,
                            price: newProductInputPrice,
                            quanity: newProductInputQuanity,
                            isVisible: newProductShow,
                            desc: newDescriptionProduct,
                            phoneScreen: newPhoneInputScreen,
                            phoneOS: newPhoneInputOS,
                            phoneFCAM: newPhoneInputFCAM,
                            phoneBCAM: newPhoneInputBCAM,
                            phoneCPU: newPhoneInputCPU,
                            phoneRAM: newPhoneInputRAM,
                            phoneROM: newPhoneInputROM,
                            phoneSIM: newPhoneInputSIM,
                            phonePIN: newPhoneInputPIN,
                        },
                        success: function(data) {
                            window.location.reload();
                            renderData();
                            loadTab2();
                        },
                    });
                } else if (newProductInputType == 2) {
                    $.ajax({
                        url: '<?= $domain . "/adminZone/actions/actionAddProduct.php" ?>',
                        type: 'POST',
                        data: {
                            type: newProductInputType,
                            manufacturer: newProductInputManu,
                            name: newProductInputName,
                            price: newProductInputPrice,
                            quanity: newProductInputQuanity,
                            isVisible: newProductShow,
                            desc: newDescriptionProduct,
                            laptopCPU: newLaptopInputCPU,
                            laptopRAM: newLaptopInputRAM,
                            laptopROM: newLaptopInputROM,
                            laptopScreen: newLaptopInputScreen,
                            laptopVGA: newLaptopInputVGA,
                            laptopConnector: newLaptopInputConnector,
                            laptopOS: newLaptopInputOS,
                            laptopDesign: newLaptopInputDesign,
                            laptopSize: newLaptopInputSize,
                            laptopReleaseDate: newLaptopInputReleaseDate,
                        },
                        success: function(data) {
                            window.location.reload();
                            renderData();
                            loadTab2();
                        },
                    });
                } else if (newProductInputType == 3) {
                    $.ajax({
                        url: '<?= $domain . "/adminZone/actions/actionAddProduct.php" ?>',
                        type: 'POST',
                        data: {
                            type: newProductInputType,
                            manufacturer: newProductInputManu,
                            name: newProductInputName,
                            price: newProductInputPrice,
                            quanity: newProductInputQuanity,
                            isVisible: newProductShow,
                            desc: newDescriptionProduct,
                            tabletScreen: newTabletInputScreen,
                            tabletOS: newTabletInputOS,
                            tabletCPU: newTabletInputCPU,
                            tabletRAM: newTabletInputRAM,
                            tabletROM: newTabletInputROM,
                            tabletcamF: newTabletInputcamF,
                            tabletCamB: newTabletInputCamB,
                            tabletPin: newTabletInputPin,
                        },
                        success: function(data) {
                            window.location.reload();
                            renderData();
                            loadTab2();
                        },
                    });
                } else if (newProductInputType == 4) {
                    $.ajax({
                        url: '<?= $domain . "/adminZone/actions/actionAddProduct.php" ?>',
                        type: 'POST',
                        data: {
                            type: newProductInputType,
                            manufacturer: newProductInputManu,
                            name: newProductInputName,
                            price: newProductInputPrice,
                            quanity: newProductInputQuanity,
                            isVisible: newProductShow,
                            desc: newDescriptionProduct,
                            watchScreen: newWatchInputScreen,
                            watchScreenSize: newWatchInputScreenSize,
                            watchTimePin: newWatchInputTimePin,
                            watchOS: newWatchInputOS,
                            watchOSConnect: newWatchInputOSConnect,
                            watchScreenMaterial: newWatchInputScreenMaterial,
                            watchScreenHeight: newWatchInputScreenHeight,
                            watchConnect: newWatchInputConnect,
                            watchLanguage: newWatchInputLanguage,
                            watchFollowHealth: newWatchInputFollowHealth,
                        },
                        success: function(data) {
                            window.location.reload();
                            renderData();
                            loadTab2();
                        },
                    });
                }
            }
        };

        //<------ Form new ------->
        newProductInputType = document.querySelector("#newProductInputType"); // Loại sản phẩm đã chọn
        newInputInfoType = document.querySelector(".newInputInfoType");
        newTab2 = document.querySelector("#new-profile-tab");
        //2 sẽ load lại data dựa theo type

        newProductInputType.addEventListener("change", function() {
            loadTab2();
        })
        loadTab2 = () => {
            let valueSwitch = newProductInputType.value;
            if (valueSwitch == 1) {
                newInputInfoType.innerHTML = `<div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-3'>
                                        <label for='newPhoneInputScreen' class='col-2 col-form-label'>Screen</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[1]) ? $dataProductType[1] : null ?>' class='form-control' id='newPhoneInputScreen' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-3'>
                                        <label for='newPhoneInputOS' class='col-2 col-form-label'>OS</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[2]) ? $dataProductType[2] : null ?>'  class='form-control' id='newPhoneInputOS' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-3'>
                                        <label for='newPhoneInputFCAM' class='col-2 col-form-label'>FCAM</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[3]) ? $dataProductType[3] : null ?>'  class='form-control' id='newPhoneInputFCAM' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-3'>
                                        <label for='newPhoneInputBCAM' class='col-2 col-form-label'>BCAM</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[4]) ? $dataProductType[4] : null ?>'  class='form-control' id='newPhoneInputBCAM' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-3'>
                                        <label for='newPhoneInputCPU' class='col-2 col-form-label'>CPU</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[5]) ? $dataProductType[5] : null ?>'  class='form-control' id='newPhoneInputCPU' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-3'>
                                        <label for='newPhoneInputRAM' class='col-2 col-form-label'>RAM</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[6]) ? $dataProductType[6] : null ?>'  class='form-control' id='newPhoneInputRAM' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-3'>
                                        <label for='newPhoneInputROM' class='col-2 col-form-label'>ROM</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[7]) ? $dataProductType[7] : null ?>'  class='form-control' id='newPhoneInputROM' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-3'>
                                        <label for='newPhoneInputSIM' class='col-2 col-form-label'>SIM</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[8]) ? $dataProductType[8] : null ?>'  class='form-control' id='newPhoneInputSIM' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-3'>
                                        <label for='newPhoneInputPIN' class='col-2 col-form-label'>PIN</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[9]) ? $dataProductType[9] : null ?>'  class='form-control' id='newPhoneInputPIN' required />
                                        </div>
                                    </div>`;
            } else if (valueSwitch == 2) {
                newInputInfoType.innerHTML = `<div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4'>
                                        <label for='newLaptopInputCPU' class='col-2 col-form-label'>CPU</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[1]) ? $dataProductType[1] : null ?>'  class='form-control' id='newLaptopInputCPU' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4'>
                                        <label for='newLaptopInputRAM' class='col-2 col-form-label'>RAM</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[2]) ? $dataProductType[2] : null ?>'  class='form-control' id='newLaptopInputRAM' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4'>
                                        <label for='newLaptopInputROM' class='col-2 col-form-label'>ROM</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[3]) ? $dataProductType[3] : null ?>'  class='form-control' id='newLaptopInputROM' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4'>
                                        <label for='newLaptopInputScreen' class='col-2 col-form-label'>Screen</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[4]) ? $dataProductType[4] : null ?>'  class='form-control' id='newLaptopInputScreen' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4'>
                                        <label for='newLaptopInputVGA' class='col-2 col-form-label'>VGA</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[5]) ? $dataProductType[5] : null ?>'  class='form-control' id='newLaptopInputVGA' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4'>
                                        <label for='newLaptopInputConnector' class='col-2 col-form-label'>Connector</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[6]) ? $dataProductType[6] : null ?>'  class='form-control' id='newLaptopInputConnector' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4'>
                                        <label for='newLaptopInputOS' class='col-2 col-form-label'>OS</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[7]) ? $dataProductType[7] : null ?>'  class='form-control' id='newLaptopInputOS' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4'>
                                        <label for='newLaptopInputDesign' class='col-2 col-form-label'>Design</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[8]) ? $dataProductType[8] : null ?>'  class='form-control' id='newLaptopInputDesign' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4'>
                                        <label for='newLaptopInputSize' class='col-2 col-form-label'>Size</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[9]) ? $dataProductType[9] : null ?>'  class='form-control' id='newLaptopInputSize' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4'>
                                        <label for='newLaptopInputReleaseDate' class='col-2 col-form-label'>RDate</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[10]) ? $dataProductType[10] : null ?>'  class='form-control' id='newLaptopInputReleaseDate' required />
                                        </div>
                                    </div>`;
            } else if (valueSwitch == 3) {
                newInputInfoType.innerHTML = `<div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4'>
                                        <label for='newTabletInputScreen' class='col-2 col-form-label'>Screen</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[1]) ? $dataProductType[1] : null ?>'  class='form-control' id='newTabletInputScreen' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4'>
                                        <label for='newTabletInputOS' class='col-2 col-form-label'>OS</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[2]) ? $dataProductType[2] : null ?>'  class='form-control' id='newTabletInputOS' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4'>
                                        <label for='newTabletInputCPU' class='col-2 col-form-label'>CPU</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[3]) ? $dataProductType[3] : null ?>'  class='form-control' id='newTabletInputCPU' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4'>
                                        <label for='newTabletInputRAM' class='col-2 col-form-label'>RAM</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[4]) ? $dataProductType[4] : null ?>'  class='form-control' id='newTabletInputRAM' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4'>
                                        <label for='newTabletInputROM' class='col-2 col-form-label'>ROM</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[5]) ? $dataProductType[5] : null ?>'  class='form-control' id='newTabletInputROM' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4'>
                                        <label for='newTabletInputcamF' class='col-2 col-form-label'>camF</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[6]) ? $dataProductType[6] : null ?>'  class='form-control' id='newTabletInputcamF' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4'>
                                        <label for='newTabletInputCamB' class='col-2 col-form-label'>CamB</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[7]) ? $dataProductType[7] : null ?>'  class='form-control' id='newTabletInputCamB' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-4'>
                                        <label for='newTabletInputPin' class='col-2 col-form-label'>Pin</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[8]) ? $dataProductType[8] : null ?>'  class='form-control' id='newTabletInputPin' required />
                                        </div>
                                    </div>`;
            } else if (valueSwitch == 4) {
                newInputInfoType.innerHTML = `<div class='form-group row col-xs-12 col-md-6 col-lg-6 col-xl-6'>
                                        <label for='newWatchInputScreen' class='col-2 col-form-label'>Screen</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[1]) ? $dataProductType[1] : null ?>'  class='form-control' id='newWatchInputScreen' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-6'>
                                        <label for='newWatchInputScreenSize' class='col-2 col-form-label'>ScreenSize</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[2]) ? $dataProductType[2] : null ?>'  class='form-control' id='newWatchInputScreenSize' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-6'>
                                        <label for='newWatchInputTimePin' class='col-2 col-form-label'>TimePin</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[3]) ? $dataProductType[3] : null ?>'  class='form-control' id='newWatchInputTimePin' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-6'>
                                        <label for='newWatchInputOS' class='col-2 col-form-label'>OS</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[4]) ? $dataProductType[4] : null ?>'  class='form-control' id='newWatchInputOS' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-6'>
                                        <label for='newWatchInputOSConnect' class='col-2 col-form-label'>OSConnect</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[5]) ? $dataProductType[5] : null ?>'  class='form-control' id='newWatchInputOSConnect' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-6'>
                                        <label for='newWatchInputScreenMaterial' class='col-2 col-form-label'>ScreenMaterial</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[6]) ? $dataProductType[6] : null ?>'  class='form-control' id='newWatchInputScreenMaterial' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-6'>
                                        <label for='newWatchInputScreenHeight' class='col-2 col-form-label'>ScreenHeight</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[7]) ? $dataProductType[7] : null ?>'  class='form-control' id='newWatchInputScreenHeight' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-6'>
                                        <label for='newWatchInputConnect' class='col-2 col-form-label'>Connect</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[8]) ? $dataProductType[8] : null ?>'  class='form-control' id='newWatchInputConnect' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-6'>
                                        <label for='newWatchInputLanguage' class='col-2 col-form-label'>Language</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[9]) ? $dataProductType[9] : null ?>'  class='form-control' id='newWatchInputLanguage' required />
                                        </div>
                                    </div>
                                    <div class='form-group row col-xs-12 col-md-6 col-lg-4 col-xl-6'>
                                        <label for='newWatchInputFollowHealth' class='col-2 col-form-label'>FollowHealth</label>
                                        <div class='col-10'>
                                            <input type='text' value='<?= isset($dataProductType[10]) ? $dataProductType[10] : null ?>'  class='form-control' id='newWatchInputFollowHealth' required />
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
        btnContentMore = document.querySelector(".btnContentMore");
        btnContentMore.onclick = function() {
            if (newDescriptionProduct.value) {
                newDescriptionProduct.value += '\n';
            }
            newDescriptionProduct.value += `<button class="paragraph__more">Xem thêm !</button>`;
        }
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
        //Get all btn delete product
        btnDeleteProduct = document.getElementsByClassName("btnDeleteProduct");
        querybtnDeleteProduct = () => document.getElementsByClassName("btnDeleteProduct");
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
                            window.location.href = `<?= $domain . "/adminZone/pages/controlProduct/editData.php?id=" ?>${this.getAttribute('data-idSelect')}`;
                        }
                    }
                    btnDeleteProduct = querybtnDeleteProduct();
                    for (i = 0; i < btnDeleteProduct.length; i++) {
                        btnDeleteProduct[i].onclick = function() {
                            if (window.confirm('Bạn thực sự muốn xóa ?')) {
                                $.ajax({
                                    url: "<?= $domain . "/adminZone/actions/actionDeleteProduct.php" ?>",
                                    type: "POST",
                                    data: {
                                        id: this.getAttribute('data-idSelect')
                                    },
                                    success: function(data) {
                                        if (data == 0) {
                                            notyf.error("Xóa thất bại");
                                        } else {
                                            notyf.success("Xóa thành công!");
                                            renderData();
                                            loadTab2();
                                        }
                                    }
                                })
                            }
                        }
                    }
                    isVisibleCB = [...document.querySelectorAll(".isVisibleCB")];
                    for (i = 0; i < isVisibleCB.length; i++) {
                        isVisibleCB[i].onclick = function() {
                            // console.log(this.getAttribute('data-idSelect'))
                            $.ajax({
                                url: "<?= $domain . "/adminZone/actions/actionToggleProductShow.php" ?>",
                                type: "POST",
                                data: {
                                    id: this.getAttribute('data-idSelect')
                                },
                                success: function(data) {
                                    loadTab2();
                                    renderData();
                                    notyf.success("Thay đổi trạng thái thành công!");
                                }
                            })
                        }
                    }
                }
            })
        }

        loadTab2(); // tự động chạy lần đầu khi load xong
        renderData();
    </script>
    <!-- <script src="../../assets/vendors/js/vendor.bundle.base.js"></script> -->
    <script src="../../assets/vendors/js/vendor.bundle.addons.js"></script>
    <script src="../../assets/js/shared/off-canvas.js"></script>
    <script src="../../assets/js/shared/misc.js"></script>
</body>

</html>