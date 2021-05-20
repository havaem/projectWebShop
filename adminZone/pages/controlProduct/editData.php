<?php
include("../../../config.php");
session_start();
include("../../actions/initialState.php");
$id = $_GET['id'];
$dataProduct = mysqli_fetch_row($connect->query("SELECT * from product where id = $id"));
if ($dataProduct[1] == "1") {
    $dataProductType = mysqli_fetch_row($connect->query("SELECT * from phone where id = $id"));
}
if ($dataProduct[1] == "2") {
    $dataProductType = mysqli_fetch_row($connect->query("SELECT * from laptop where id = $id"));
}
if ($dataProduct[1] == "3") {
    $dataProductType = mysqli_fetch_row($connect->query("SELECT * from tablet where id = $id"));
}
if ($dataProduct[1] == "4") {
    $dataProductType = mysqli_fetch_row($connect->query("SELECT * from watch where id = $id"));
}

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
                            <h4 class="page-title">Chỉnh sửa sản phẩm <?= $dataProduct[0] ?>:</h4>
                        </div>
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
                                        <select class="form-control form-control-lg" id="newProductInputType" disabled>
                                            <option value="1" <?= $dataProduct[1] == 1 ? 'selected' : null ?>>Điện thoại</option>
                                            <option value="2" <?= $dataProduct[1] == 2 ? 'selected' : null ?>>Laptop</option>
                                            <option value="3" <?= $dataProduct[1] == 3 ? 'selected' : null ?>>Máy tính bảng</option>
                                            <option value="4" <?= $dataProduct[1] == 4 ? 'selected' : null ?>>Đồng hồ thông minh</option>
                                            <!-- <option value="5">Màn hình máy tính</option> -->
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="newProductInputManu">Hãng sản xuất</label>
                                        <select class="form-control form-control-lg" id="newProductInputManu">
                                            <option value="1" <?= $dataProduct[12] == 1 ? 'selected' : null ?>>Apple</option>
                                            <option value="2" <?= $dataProduct[12] == 2 ? 'selected' : null ?>>Samsung</option>
                                            <option value="3" <?= $dataProduct[12] == 3 ? 'selected' : null ?>>Huawei</option>
                                            <option value="4" <?= $dataProduct[12] == 4 ? 'selected' : null ?>>Lenovo</option>
                                            <option value="5" <?= $dataProduct[12] == 5 ? 'selected' : null ?>>Masstel</option>
                                            <option value="6" <?= $dataProduct[12] == 6 ? 'selected' : null ?>>Oppo</option>
                                            <option value="7" <?= $dataProduct[12] == 7 ? 'selected' : null ?>>Xiaomi</option>
                                            <option value="8" <?= $dataProduct[12] == 8 ? 'selected' : null ?>>Vivo</option>
                                            <option value="9" <?= $dataProduct[12] == 9 ? 'selected' : null ?>>Mi Watch</option>
                                            <option value="10" <?= $dataProduct[12] == 10 ? 'selected' : null ?>>BeU</option>
                                            <option value="11" <?= $dataProduct[12] == 11 ? 'selected' : null ?>>Kidcare</option>
                                            <option value="12" <?= $dataProduct[12] == 12 ? 'selected' : null ?>>Suunto</option>
                                            <option value="13" <?= $dataProduct[12] == 13 ? 'selected' : null ?>>Garmin Lily</option>
                                            <option value="14" <?= $dataProduct[12] == 14 ? 'selected' : null ?>>Huami</option>
                                            <option value="15" <?= $dataProduct[12] == 15 ? 'selected' : null ?>>Acer</option>
                                            <option value="16" <?= $dataProduct[12] == 16 ? 'selected' : null ?>>Asus</option>
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
                                            <input type="text" value="<?= $dataProduct[2] ?>" class="form-control" id="newProductInputName" required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newProductInputPrice" class="col-sm-3 col-form-label">Giá sản phẩm</label>
                                        <div class="col-sm-9">
                                            <input type="number" value="<?= $dataProduct[4] ?>" class="form-control" id="newProductInputPrice" required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newProductInputQuanity" class="col-sm-3 col-form-label">Số lượng</label>
                                        <div class="col-sm-9">
                                            <input type="number" value="<?= $dataProduct[5] ?>" class="form-control" id="newProductInputQuanity" required />
                                        </div>
                                    </div>
                                    <div class="form-check row float-left mt-0">
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input newProductShow" required <?= $dataProduct[13] == 1 ? 'checked' : null ?> /> Hiển thị <i class="input-helper"></i></label>
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
                                            <textarea class="form-control mt-3" id="newDescriptionProduct" rows="30" spellcheck="false">
                                                <?php echo trim($dataProduct[11]); ?>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="float-right mt-3 btn btn-success btnSubmit">LƯU THAY ĐỔI</button>
                    </div>
                </div>
                <?php
                require("../../footer.php");
                ?>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            //<------ Form new ------->
            newProductInputType = document.querySelector("#newProductInputType"); // Loại sản phẩm đã chọn
            newInputInfoType = document.querySelector(".newInputInfoType");
            newTab2 = document.querySelector("#new-profile-tab");
            newProductInputType.addEventListener("change", function() {
                console.log(newProductInputType.value)
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
            //Button submit
            btnSubmit = document.querySelector(".btnSubmit");
            btnSubmit.onclick = function() {
                idProductInput = <?= $dataProduct[0] ?>; // id sản phẩm
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
                    // fd.append('nameProduct', "<?= $dataProduct[2] ?>");
                    fd.set('nameProduct', "<?= $dataProduct[2] ?>");
                    fd.set('typeProduct', "<?= $dataProduct[1] ?>");
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
                                    url: '<?= $domain . "/adminZone/actions/actionUpdateInfoProduct.php" ?>',
                                    type: 'POST',
                                    data: {
                                        id: idProductInput,
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
                                        console.log(data)
                                    },
                                });
                            } else if (newProductInputType == 2) {
                                $.ajax({
                                    url: '<?= $domain . "/adminZone/actions/actionUpdateInfoProduct.php" ?>',
                                    type: 'POST',
                                    data: {
                                        id: idProductInput,
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
                                        console.log(data)
                                    },
                                });
                            } else if (newProductInputType == 3) {
                                $.ajax({
                                    url: '<?= $domain . "/adminZone/actions/actionUpdateInfoProduct.php" ?>',
                                    type: 'POST',
                                    data: {
                                        id: idProductInput,
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
                                        console.log(data)
                                    },
                                });
                            } else if (newProductInputType == 4) {
                                $.ajax({
                                    url: '<?= $domain . "/adminZone/actions/actionUpdateInfoProduct.php" ?>',
                                    type: 'POST',
                                    data: {
                                        id: idProductInput,
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
                                        console.log(data)
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
                            url: '<?= $domain . "/adminZone/actions/actionUpdateInfoProduct.php" ?>',
                            type: 'POST',
                            data: {
                                id: idProductInput,
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
                                console.log(data)
                            },
                        });
                    } else if (newProductInputType == 2) {
                        $.ajax({
                            url: '<?= $domain . "/adminZone/actions/actionUpdateInfoProduct.php" ?>',
                            type: 'POST',
                            data: {
                                id: idProductInput,
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
                                console.log(data)
                            },
                        });
                    } else if (newProductInputType == 3) {
                        $.ajax({
                            url: '<?= $domain . "/adminZone/actions/actionUpdateInfoProduct.php" ?>',
                            type: 'POST',
                            data: {
                                id: idProductInput,
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
                                console.log(data)
                            },
                        });
                    } else if (newProductInputType == 4) {
                        $.ajax({
                            url: '<?= $domain . "/adminZone/actions/actionUpdateInfoProduct.php" ?>',
                            type: 'POST',
                            data: {
                                id: idProductInput,
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
                                console.log(data)
                            },
                        });
                    }
                }

            };


            //Render data after loading the screen
            loadTab2();
        })
    </script>
    <!-- <script src="../../assets/vendors/js/vendor.bundle.base.js"></script> -->
    <script src="../../assets/vendors/js/vendor.bundle.addons.js"></script>
    <script src="../../assets/js/shared/off-canvas.js"></script>
    <script src="../../assets/js/shared/misc.js"></script>
</body>

</html>