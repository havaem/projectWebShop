<?php
$id = isset($_POST['id']) ? $_POST['id'] : 0;
$dataUserSelect = mysqli_fetch_assoc($connect->query("SELECT * from user where id= $id"));
$passwordUserSelect = "";
?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
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
                        <label for="exampleInputName" class="col-sm-3 col-form-label">Tên</label>
                        <div class="col-sm-9">
                            <input value="<?=$dataUserSelect['name']?>" type="text" class="form-control" id="exampleInputName">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input value="<?=$dataUserSelect['email']?>" type="email" class="form-control" id="exampleInputEmail2">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputAddress" class="col-sm-3 col-form-label">Địa chỉ</label>
                        <div class="col-sm-9">
                            <input value="<?=$dataUserSelect['address']?>" type="text" class="form-control" id="exampleInputAddress">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword" class="col-sm-3 col-form-label">Mật khẩu</label>
                        <div class="col-sm-9">
                            <input type="password" value="<?=$passwordUserSelect?>" class="form-control" id="exampleInputPassword">
                        </div>
                    </div>
                    <div class="form-check row float-right mr-3">
                        <div class="form-check form-check-flat">
                            <label class="form-check-label">
                                <?php
                                    if($dataUserSelect['isBanned']=="false"){
                                        echo "<input type='checkbox' class='form-check-input' checked> Hoạt động <i class='input-helper'></i></label>";
                                    }
                                    else{
                                        echo "<input type='checkbox' class='form-check-input'> Hoạt động <i class='input-helper'></i></label>";
                                    }
                                ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">ĐÓNG</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">LƯU THAY ĐỔI</button>
            </div>
        </div>
    </div>
</div>