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