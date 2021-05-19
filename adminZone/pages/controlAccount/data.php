<?php
include("../../../config.php");
$dataUsers = mysqli_fetch_all($connect->query("SELECT * from user"));
$num = 0;
foreach ($dataUsers as $user) {
    echo <<<XXX
            
                    <tr>
                        <th scope="row">$num</th>
                        <td>$user[1]</td>
                        <td>$user[4]</td>
                        <td>
                            <div class="btn-group ">
                                <button type="button" data-toggle="modal" data-select="$user[0]" data-target="#exampleModal$num" class="btn btn-success btn-fw">
                                    <i class="mdi mdi-cloud-download"></i>Edit</button>
                                <button type="button" class="btn btn-danger btn-fw deleteUser" data-idSelect="$user[0]">
                                    <i class="mdi mdi-alert-outline"></i>Delete</button>
                            </div>
                        </td>
                    </tr>
 
        XXX;
    $dataUserSelect = mysqli_fetch_array($connect->query("SELECT * from user where id= $user[0]"));
    $active = $dataUserSelect[19] == "false" ?
        "<input type='checkbox' class='form-check-input cb$num' checked> Hoạt động <i class='input-helper'></i></label>" :
        "<input type='checkbox' class='form-check-input cb$num'> Hoạt động <i class='input-helper'></i></label>";
    $passwordUserSelect = "";
    echo <<< XXX
            <div class="modal fade" id="exampleModal$num" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa thông tin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample">
                            <div class="form-group row">
                                <label for="inputName$num" class="col-sm-3 col-form-label">Tên</label>
                                <div class="col-sm-9">
                                    <input value="$dataUserSelect[4]" type="text" class="form-control" id="inputName$num">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputMail$num" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input value="$dataUserSelect[6]" type="email" class="form-control" id="inputMail$num">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputAddress$num" class="col-sm-3 col-form-label">Địa chỉ</label>
                                <div class="col-sm-9">
                                    <input value="$dataUserSelect[8]" type="text" class="form-control" id="inputAddress$num">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword$num" class="col-sm-3 col-form-label">Mật khẩu</label>
                                <div class="col-sm-9">
                                    <input type="password" value="$passwordUserSelect" class="form-control" id="inputPassword$num">
                                </div>
                            </div>
                            <div class="form-check row float-right mr-3">
                                <div class="form-check form-check-flat">
                                    <label class="form-check-label">
                                    $active
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ĐÓNG</button>
                        <button type="button" class="btn btn-success saveInfoUser" data-dismiss="modal" data-index="$num" data-idSelect="$dataUserSelect[0]">LƯU THAY ĐỔI</button>
                    </div>
                </div>
            </div>
        </div>
    XXX;
    $num++;
}
?>
