<?php
require './controllerUserAction.php';
?>
<!DOCTYPE html>
<html lang="vn">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TECHSHOP ✔</title>
    <link rel="icon" href="../assets/image/icon.png" sizes="" />
    <!-- Reset CSS -->
    <link rel="stylesheet" href="../assets/css/reset.css" />
    <!-- Source CSS -->
    <link rel="stylesheet" href="../assets/css/user.css" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/icon/flaticon.css" />
    <script src="../assets/script/jquery-3.6.0.min.js"></script>
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
                <div class="dashboard__right-content form__profile active" id="profile">
                    <div class="content__title">
                        <h2>Hồ sơ của tôi</h2>
                        <p>Quản lý thông tin cá nhân</p>
                    </div>
                    <div class="content__content">
                        <?php
                        if (count($error) > 0) {
                            echo "<div class='content__content-error'>";
                            foreach ($error as $item) {
                                echo "<p>$item</p>";
                            }
                            echo "</div>";
                        }
                        ?>
                        <form action="./controllerUserAction.php" class="content__content-form" method="post" enctype="multipart/form-data">
                            <div class="form__left">
                                <div class="form__left-left">
                                    <p class="left__title">Tên đăng nhập</p>
                                    <p class="left__title">Tên</p>
                                    <p class="left__title">Email</p>
                                    <p class="left__title">Số điện thoại</p>
                                    <p class="left__title">Giới tính</p>
                                    <p class="left__title">Ngày sinh</p>
                                    <p class="left__title">Địa chỉ</p>
                                </div>
                                <div class="form__left-right">
                                    <p class="right__info"><?php echo $username; ?></p>
                                    <input type="text" name="name" value="<?php echo $name; ?>">
                                    <input type="email" name="email" value="<?php echo $email; ?>">
                                    <input type="text" name="phone" value="<?php echo $phone; ?>">
                                    <select name="gender">
                                        <?php
                                        if ($gender === 1) {
                                            echo '<option selected="selected" value="1">Nam</option>
                                                  <option value="2">Nữ</option>
                                                  <option value="3">Giới tính thứ ba</option>';
                                        }
                                        if ($gender === 2) {
                                            echo '<option value="1">Nam</option>
                                                  <option selected="selected" value="2">Nữ</option>
                                                  <option value="3">Giới tính thứ ba</option>';
                                        }
                                        if ($gender === 3) {
                                            echo '<option value="1">Nam</option>
                                                  <option value="2">Nữ</option>
                                                  <option selected="selected" value="3">Giới tính thứ ba</option>';
                                        }
                                        ?>
                                    </select>
                                    <input type="date" name="birthday" value="<?php echo $birthday; ?>">
                                    <input type="text" name="address" value="<?php echo $address; ?>">
                                </div>
                            </div>
                            <div class="form__right">
                                <img src="<?php echo $avatar; ?>" alt="">
                                <input type="file" alt="" accept=".png, .jpg, .jpeg, .gif" name="file">
                            </div>
                            <button type="submit" name="updateInfoByUser">Lưu</button>
                        </form>
                    </div>
                </div>
                <div class="dashboard__right-content form__password" id="password">
                    <div class="content__title">
                        <h2>Đổi mật khẩu</h2>
                        <p>Vui lòng không chia sẻ tài khoản cho người khác</p>
                    </div>
                    <div class="content__content">
                        <?php
                        if (count($error) > 0) {
                            echo "<div class='content__content-error'>";
                            foreach ($error as $item) {
                                echo "<p>$item</p>";
                            }
                            echo "</div>";
                        }
                        ?>
                        <form action="" class="content__content-form" method="post">
                            <div class="form__left">
                                <div class="form__left-left">
                                    <p class="left__title">Mật khẩu cũ</p>
                                    <p class="left__title">Mật khẩu mới</p>
                                    <p class="left__title">Xác nhận mật khẩu mới</p>
                                    <p class="left__title">Mã xác minh</p>
                                </div>
                                <div class="form__left-right">
                                    <input type="password" name="password" placeholder="Nhập mật khẩu cũ" required autocomplete="off">
                                    <input type="password" name="newpassword" placeholder="Nhập mật khẩu mới" minlength="8" maxlength="32" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="off">
                                    <input type="password" name="renewpassword" placeholder="Nhập lại mật khẩu mới" minlength="8" maxlength="32" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="off">
                                    <div class="right__otp">
                                        <input type="number" name="otp" min="100000" max="999999" placeholder="Mã xác minh gồm 6 chữ số được gửi về email" required  autocomplete="off">
                                        <a class="sendotp" href="javascript:void(0)">GỬI OTP</a>
                                        <!-- <?php
                                                echo "<a href='./sendmail.php?id=${id}' target='_blank'>GỬI OTP</a>";
                                                ?> -->
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="updatePasswordUser">Lưu</button>
                        </form>
                    </div>
                </div>
                <div class="dashboard__right-content form__rank" id="rank">
                    <div class="content__title">
                        <h2>Bậc xếp hạng</h2>
                        <p>Mua hàng nhiều hơn để tăng bậc xếp hạng</p>
                    </div>
                    <div class="content__content">
                        <div class="content__content-process" data-width="<?php echo $dataUser['rank']; ?>">
                            <div class="process__bar process__bar-1" title="">
                                <p>New Member</p>
                            </div>
                            <div class="process__bar process__bar-2" title="Cần mua sản phẩm đầu tiên">
                                <p>VIP1</p>
                            </div>
                            <div class="process__bar process__bar-3" title="Cần mua 5 sản phẩm">
                                <p>VIP2</p>
                            </div>
                            <div class="process__bar process__bar-4" title="Cần mua 10 sản phẩm">
                                <p>VIP3</p>
                            </div>
                            <div class="process__bar process__bar-5" title="Cần mua 20 sản phẩm">
                                <p>VIP4</p>
                            </div>
                        </div>
                        <div class="content__content-desc">
                            <?php
                            $resultRank = $connect->query("SELECT id,name from rank where id = ${dataUser['rank']}");
                            $rowRank = mysqli_fetch_assoc($resultRank);
                            if ($rowRank['name'] !== "VIP4") {
                                $resultNextPointRank = $connect->query("SELECT point from rank where id =${dataUser['rank']}+1");
                                $rowNextPointRank = mysqli_fetch_assoc($resultNextPointRank);
                            }
                            ?>
                            <p>Bạn hiện đang ở bậc <b><?php echo $rowRank['name']; ?></b></p>
                            <?php
                            if ($rowRank['name'] !== "VIP4") {
                                $ftRank = $rowNextPointRank['point'] - $dataUser['sumBought'];
                                echo "<p>Bạn cần mua thêm <b>$ftRank</b> sản phẩm để có thể lên bậc tiếp theo</p>";
                            } else {
                                echo "<p>Bạn hiện đang ở bậc rank cao nhất, chúc bạn mua hàng vui vẻ!!</p>";
                            }
                            ?>
                            <p><b>Lên bậc giúp bạn nhận thêm nhiều ưu đãi từ chúng tôi hơn, và có thêm huy hiệu khi comment.</b></p>
                        </div>
                    </div>
                </div>
                <div class="dashboard__right-content form__voucher" id="voucher">
                    <div class="content__title">
                        <h2>Mã voucher của bạn</h2>
                        <p>Mua hàng nhiều hơn để nhận nhiều voucher nhé</p>
                    </div>
                    <div class='content__content'>
                        <?php
                        if ($dataUser['voucher']) {
                            $arrayVoucher = explode('|', $dataUser['voucher']);
                            if (count($arrayVoucher) > 0) {
                                echo "<div class='content__content-row'>
                                        <div class='row__title row__code'>Mã giảm giá</div>
                                        <div class='row__title row__info'>Nội dung</div>
                                        <div class='row__title row__initialdate'>Ngày bắt đầu</div>
                                        <div class='row__title row__expirydate'>Ngày hết hạn</div>
                                        <div class='row__title row__time'>Số lượt dùng</div>
                                        </div>";
                                foreach ($arrayVoucher as $vc) {
                                    $rowVoucher = mysqli_fetch_assoc($connect->query("SELECT * from voucher where id= $vc"));
                                    echo "<div class='content__content-row'>
                                        <div class='row__code'>" . $rowVoucher['code'] . "</div>";
                                    $voucherDesc = "";
                                    if ($rowVoucher['type'] == 1) {
                                        $rowVoucherProduct = mysqli_fetch_assoc($connect->query("SELECT name from product where id = ${rowVoucher['id_product']}"));
                                        $voucherDesc = "Giảm " . $rowVoucher['percent'] . "% khi mua " . $rowVoucherProduct['name'];
                                    } else {
                                        $rowVoucherProduct = mysqli_fetch_assoc($connect->query("SELECT name from product where id = ${rowVoucher['id_product']}"));
                                        $pr = number_format($rowVoucher['price'], 0, ",", ".");
                                        $voucherDesc = "Giảm " . $pr . "đ khi mua " . $rowVoucherProduct['name'];
                                    }
                                    echo "
                                        <div class='row__info'>$voucherDesc</div>
                                        <div class='row__initialdate'>" . date("d/m/Y", strtotime($rowVoucher['initiated date'])) . "</div>
                                        <div class='row__expirydate'>" . date("d/m/Y", strtotime($rowVoucher['expiry date'])) . "</div>
                                        <div class='row__time'>" . $rowVoucher['time'] . "</div>
                                        </div>";
                                }
                            }
                        } else {
                            echo "<h1 style='text-align:center;color:red;'>Bạn không có mã voucher nào cả";
                        }
                        ?>
                    </div>
                </div>
                <div class="dashboard__right-content form__history" id="history">
                    <div class="content__title">
                        <h2>Lịch sử mua hàng của bạn</h2>
                        <p>Uy tín đặt lên hàng đầu</p>
                    </div>
                    <div class="content__content">
                        <?php
                        $getOrderById = mysqli_fetch_all($connect->query("SELECT * from theorder where id_user = ${dataUser['id']}"));
                        if (count($getOrderById) > 0) {
                            echo "<div class='content__content-row'>";
                            echo "<div class='row__title row__code'>Mã đơn hàng</div>";
                            echo "<div class='row__title row__info'>Tên sản phẩm</div>";
                            echo "<div class='row__title row__initialdate'>Giá sản phẩm</div>";
                            echo "<div class='row__title row__expirydate'>Ngày mua</div>";
                            echo "<div class='row__title row__time'>Trạng thái</div>";
                            echo "</div>";
                            for ($i = 0; $i < count($getOrderById); $i++) {
                                echo "<div class='content__content-row' data-ship=" . $getOrderById[$i][10] . " title='Đã nhận hàng'>";
                                echo "<div class='row__code'>" . $i . "</div>";
                                echo "<div class='row__info'>" . $getOrderById[$i][3] . "</div>";
                                echo "<div class='row__initialdate'>" . $getOrderById[$i][4] . "</div>";
                                echo "<div class='row__expirydate'>" . $getOrderById[$i][9] . "</div>";
                                $tt = "";
                                if ($getOrderById[$i][10] == 1) {
                                    $tt = "Đã giao";
                                } else if ($getOrderById[$i][10] == 2) {
                                    $tt = "Đang vận chuyển";
                                } else {
                                    $tt = "Đơn hàng bị hủy";
                                }
                                echo "<div class='row__time'>" . $tt . "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "<h1 style='text-align:center;color:red;'>Bạn chưa từng đặt hàng";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once('../footer.php');
    ?>

    <script>
        actiontype = document.getElementsByClassName('action__type');
        actionResult = document.getElementsByClassName('dashboard__right-content');
        for (var i = 0; i < actiontype.length; i++) {
            actiontype[i].onclick = function() {
                for (var l = 0; l < actiontype.length; l++) {
                    actiontype[l].classList.remove('active');
                }
                this.classList.add('active');
                var getId = this.getAttribute('data-open');
                var showID = document.getElementById(getId);
                showID.classList.remove('active');
                var getId = this.getAttribute('data-open');
                var showID = document.getElementById(getId);
                for (var j = 0; j < actionResult.length; j++) {
                    actionResult[j].classList.remove('active');
                }
                showID.classList.toggle('active');
            }
        }
        /* //Send otp
        otp = document.querySelector('.sendotp');
        otp.onclick = function() {
            newOTP = window.open('<?php echo "./sendmail.php?id=${id}"; ?>', "OTP", "width=1,height=1");
            otp.style.display = 'none';
        } */
        $(".sendotp").click(function(){
            $(".sendotp").css("display","none");
            $.ajax({
                url: "http://localhost/projectWebshop/dashboard/sendmail.php",
                type:'POST',
                data:
                {
                    id:<?php echo "${id}"; ?>
                },
                success: function(data)
                {
                    alert(data);
                }               
            });
        });
    </script>
</body>

</html>