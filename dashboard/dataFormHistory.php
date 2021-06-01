<div class="dashboard__right-content form__history" id="history">
    <div class="content__title">
        <h2>Lịch sử mua hàng của bạn</h2>
        <p>Uy tín đặt lên hàng đầu</p>
    </div>

    <div class="content__content">
    <?php
                        $getOrderById = mysqli_fetch_all($connect->query("SELECT * from theorder where id_user = ${dataUser['id']} order by isReceived desc"));
                        if (count($getOrderById) > 0) {
                            echo "<div class='content__content-row'>";
                            echo "<div class='row__title row__code'>Mã đơn hàng</div>";
                            echo "<div class='row__title row__initialdate'>Giá đơn hàng</div>";
                            echo "<div class='row__title row__info'>Ngày mua</div>";
                            echo "<div class='row__title row__time'>Trạng thái</div>";
                            echo "<div class='row__title row__expirydate'>Chi tiết</div>";
                            echo "</div>";
                            for ($i = 0; $i < count($getOrderById); $i++) {
                                $priceFormatted = number_format($getOrderById[$i][3],0,".",".")."₫";
                                echo "<div class='content__content-row' data-ship=" . $getOrderById[$i][9] . ">";
                                echo "<div class='row__code'>" . $getOrderById[$i][0] . "</div>";
                                echo "<div class='row__initialdate'>" . $priceFormatted . "</div>";
                                echo "<div class='row__info'>" . $getOrderById[$i][8] . "</div>";
                                $tt = "";
                                if ($getOrderById[$i][9] == 1) {
                                    $tt = "Đã giao";
                                } else if ($getOrderById[$i][9] == 2) {
                                    $tt = "Đang vận chuyển";
                                }   else if ($getOrderById[$i][9] == 3) {
                                    $tt = "Đơn hàng bị hủy";
                                } else {
                                    $tt = "Đang xác nhận";
                                }
                                echo "<div class='row__time'>" . $tt . "</div>";
                                $idOrder = $getOrderById[$i][0];
                                echo "<div class='row__expirydate'> <a target='_blank' href='../orderDetail.php?id=$idOrder'>Xem chi tiết</a> </div>";
                                echo "</div>";
                            }
                        } else {
                            echo "<h1 style='text-align:center;color:red;'>Bạn chưa từng đặt hàng";
                        }
    ?>
    </div>
</div>