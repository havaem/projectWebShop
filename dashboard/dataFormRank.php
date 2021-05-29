<div class="dashboard__right-content form__rank" id="rank">
    <div class="content__title">
        <h2>Bậc xếp hạng</h2>
        <p>Mua hàng nhiều hơn để tăng bậc xếp hạng</p>
    </div>
    <div class="content__content">
        <div
            class="content__content-process"
            data-width="<?php echo $dataUser['rank']; ?>">
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
                            $rowRank = mysqli_fetch_assoc($connect->query("SELECT id,name from rank where id = ${dataUser['rank']}"));
                            if ($rowRank['name'] !== "VIP4") {
                                $resultNextPointRank = $connect->query("SELECT point from rank where id =${dataUser['rank']}+1");
                                $rowNextPointRank = mysqli_fetch_assoc($resultNextPointRank);
                            }
                            ?>
            <p>Bạn hiện đang ở bậc
                <b><?php echo $rowRank['name']; ?></b>
            </p>
        <?php
                            if ($rowRank['name'] !== "VIP4") {
                                $ftRank = $rowNextPointRank['point'] - $dataUser['sumBought'];
                                echo "<p>Bạn cần mua thêm <b>$ftRank</b> sản phẩm để có thể lên bậc tiếp theo</p>";
                            } else {
                                echo "<p>Bạn hiện đang ở bậc rank cao nhất, chúc bạn mua hàng vui vẻ!!</p>";
                            }
                            ?>
            <p>
                <b>Lên bậc giúp bạn nhận thêm nhiều ưu đãi từ chúng tôi hơn, và có thêm huy hiệu
                    khi comment.</b>
            </p>
        </div>
    </div>
</div>