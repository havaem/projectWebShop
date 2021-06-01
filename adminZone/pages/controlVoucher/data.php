<?php
include("../../../config.php");
$dataVoucher = mysqli_fetch_all($connect->query("SELECT * from voucher"));
$num = 0;
foreach ($dataVoucher as $item) {
    $detail = $item[1] == 1 ? $item[4]."đ" : $item[3]."%";
    echo <<<XXX
                    <tr>
                        <th scope="row">$num</th>
                        <td>$item[1]</td>
                        <td>$item[2]</td>
                        <td>$detail</td>
                        <td>$item[5]</td>
                        <td>$item[6]</td>
                        <td>$item[7]</td>
                        <td>
                            <button type="button" data-toggle="modal" data-select="$item[0]" data-target="#exampleModal$num" class="btn btn-primary btn-fw">
                                    <i class="mdi mdi-cloud-download"></i>Sửa</button>
                            <button type="button" class="btn btn-danger btn-fw deleteCoupon" data-idSelect="$item[0]">
                                    <i class="mdi mdi-alert-outline"></i>Xóa</button>
                        </td>
                    </tr>
 
        XXX;
    $renderSelect = $item[1] == 1 ?
        "<option value='1' selected>Giảm theo tiền</option><option value='2'>Giảm theo %</option>"
        : "<option value='1'>Giảm theo tiền</option><option value='2' selected>Giảm theo %</option>";
    $renderDetail = $item[1] == 1 ? $item[4] : $item[3];
    echo <<< XXX
            <div class="modal fade" id="exampleModal$num" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
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
                            <label for="Code$num" class="col-sm-3 col-form-label">Code</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="Code$num" value="$item[2]">
                            </div>
                            </div>
                            <div class="form-group row">
                                <label for="Type$num" class="col-sm-3 col-form-label">Loại</label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-lg Type$num">
                                        $renderSelect
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Detail$num" class="col-sm-3 col-form-label">Giảm</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="Detail$num" value="$renderDetail">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Times$num" class="col-sm-3 col-form-label">Lượt</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="Times$num" value="$item[7]">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ExpiryDate$num" class="col-sm-3 col-form-label">Ngày hết hạn</label>
                                <div class="col-sm-9">
                                    <input value="$item[6]" type="date" class="form-control" id="ExpiryDate$num">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ĐÓNG</button>
                        <button type="button" class="btn btn-success saveInfoCoupon" data-dismiss="modal" data-index="$num" data-idselect="$item[0]">LƯU THAY ĐỔI</button>
                    </div>
                </div>
            </div>
        </div>
    XXX;
    $num++;
}
?>
