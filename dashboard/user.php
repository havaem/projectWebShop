<?php
require './controllerUserAction.php';
?>
<!DOCTYPE html>
<html lang="vn">

    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>TECHSHOP ✔</title>
        <link rel="icon" href="../assets/image/icon.png" sizes=""/>
        <!-- Reset CSS -->
        <link rel="stylesheet" href="../assets/css/reset.css"/>
        <!-- Source CSS -->
        <link rel="stylesheet" href="../assets/css/user.css"/>
        <!-- FontAwesome -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <link rel="stylesheet" type="text/css" href="../assets/icon/flaticon.css"/>
        <script src="../assets/script/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="../assets/css/notify.css">
        <script src="../assets/script/notyf.min.js"></script>
    </head>

    <body>
        <?php
            include_once('../header.php');
        ?>
        <div class="dashboard">
            <div class="container">
                <div class="dashboard__left">
                    <div class="dashboard__left-info">
                        <img src="<?php echo $avatar; ?>" alt="" class="info__img">
                        <span class="info__name"><?php echo $name ?></span>
                    </div>
                    <div class="dashboard__left-action">
                        <p class="action__type active" data-open="profile">Hồ sơ</p>
                        <p class="action__type" data-open="password">Mật khẩu</p>
                        <p class="action__type" data-open="rank">Xếp hạng</p>
                        <p class="action__type" data-open="voucher">Voucher</p>
                        <p class="action__type" data-open="history">Lịch sử mua hàng</p>
                    </div>
                </div>
                <div class="dashboard__right">
                    <?php
                        require("./dataFormProfile.php");
                    ?>
                    <?php
                        require("./dataFormPassword.php");
                    ?>
                    <?php
                        require("./dataFormRank.php");
                    ?>
                    <?php
                        require("./dataFormVoucher.php");
                    ?>
                    <?php
                        require("./dataFormHistory.php");
                    ?>

                </div>
            </div>
        </div>
        <?php
        include_once('../footer.php');
        ?>

        <script>
            var notyf = new Notyf({
                duration: 3000,
                position: {
                    x: 'left',
                    y: 'bottom'
                },
                ripple: true,
                dismissible: true
            });
            actiontype = document.getElementsByClassName('action__type');
            actionResult = document.getElementsByClassName('dashboard__right-content');
            for (var i = 0; i < actiontype.length; i++) {
                actiontype[i].onclick = function () {
                    for (var l = 0; l < actiontype.length; l++) {
                        actiontype[l]
                            .classList
                            .remove('active');
                    }
                    this
                        .classList
                        .add('active');
                    var getId = this.getAttribute('data-open');
                    var showID = document.getElementById(getId);
                    showID
                        .classList
                        .remove('active');
                    var getId = this.getAttribute('data-open');
                    var showID = document.getElementById(getId);
                    for (var j = 0; j < actionResult.length; j++) {
                        actionResult[j]
                            .classList
                            .remove('active');
                    }
                    showID
                        .classList
                        .toggle('active');
                }
            }
            // Form Password
            updatePasswordUser = document.querySelector(".updatePasswordUser");
            updatePasswordUser.onclick = () => {
                console.log('click')
                let oldPassword = document.querySelector(".oldPassword").value;
                let newPassword = document.querySelector(".newPassword").value;
                let renewPassword = document.querySelector(".renewPassword").value;
                let otp = document.querySelector(".otp").value;
                if(oldPassword && newPassword && renewPassword && otp){
                    if(oldPassword == newPassword){
                        notyf.error("Mật khẩu mới trùng mật khẩu cũ!!");
                    }
                    else{
                        if(newPassword != renewPassword){
                            notyf.error("Mật khẩu nhập lại không đúng!!!!");
                        }
                        else{
                            if (window.getComputedStyle(document.querySelector(".sendotp")).display === "none") {
                                $.ajax({
                                    url : "../actions/actionUpdatePasswordUser.php",
                                    type :"POST",
                                    data :{
                                        newPassword,
                                        renewPassword,
                                        otp
                                    },
                                    success: function(data) {
                                        if(data == 1){
                                            notyf.error("Mã xác minh sai!");
                                        }
                                        else{
                                            notyf.success("Đổi mật khẩu thành công!!");
                                            document.querySelector(".oldPassword").value="";
                                            document.querySelector(".newPassword").value="";
                                            document.querySelector(".renewPassword").value="";
                                            document.querySelector(".otp").value="";
                                        }
                                    }
                                })
                            }
                            else{
                                notyf.error("Chưa gửi mã xác minh!");
                            }
                        }
                    }
                }

            }


            //Button send otp
            $(".sendotp").click(function () {
                $(".sendotp").css("display", "none");
                $.ajax({
                    url: "<?php echo $domain . "/dashboard/sendmail.php " ?>",
                    type: 'POST',
                    data: {
                        id: <?php echo "${id}"; ?>
                    },
                    success: function (data) {
                        // alert(data);
                        notyf.success(data);
                    }
                });
            });
            //Button change img
            function onFileSelected(event) {
                let selectedFile = event
                    .target
                    .files[0];
                let reader = new FileReader();
                let imgtag = document.querySelector(".form__right-img");
                imgtag.title = selectedFile.name;
                reader.onload = function (event) {
                    imgtag.src = event.target.result;
                };
                reader.readAsDataURL(selectedFile);
            }
        </script>
    </body>

</html>