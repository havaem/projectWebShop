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
                            echo "<div class='row__title row__info'>Tên sản phẩm</div>";
                            echo "<div class='row__title row__initialdate'>Giá sản phẩm</div>";
                            echo "<div class='row__title row__expirydate'>Ngày mua</div>";
                            echo "<div class='row__title row__time'>Trạng thái</div>";
                            echo "</div>";
                            for ($i = 0; $i < count($getOrderById); $i++) {
                                $priceFormatted = number_format($getOrderById[$i][4])."₫";
                                echo "<div class='content__content-row' data-ship=" . $getOrderById[$i][10] . ">";
                                echo "<div class='row__code'>" . $getOrderById[$i][0] . "</div>";
                                echo "<div class='row__info'>" . $getOrderById[$i][3]  . "</div>";
                                echo "<div class='row__initialdate'>" . $priceFormatted . "</div>";
                                echo "<div class='row__expirydate'>" . $getOrderById[$i][9] . "</div>";
                                $tt = "";
                                if ($getOrderById[$i][10] == 1) {
                                    $tt = "Đã giao";
                                } else if ($getOrderById[$i][10] == 2) {
                                    $tt = "Đang vận chuyển";
                                }   else if ($getOrderById[$i][10] == 3) {
                                    $tt = "Đơn hàng bị hủy";
                                } else {
                                    $tt = "Đang xác nhận";
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