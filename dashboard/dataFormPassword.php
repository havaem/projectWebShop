<div class="dashboard__right-content form__password" id="password">
    <div class="content__title">
        <h2>Đổi mật khẩu</h2>
        <p>Vui lòng không chia sẻ tài khoản cho người khác</p>
    </div>
    <div class="content__content">
        <?php
                        /* if (count($error) > 0) {
                            echo "<div class='content__content-error'>";
                            foreach ($error as $item) {
                                echo "<p>$item</p>";
                            }
                            echo "</div>";
                        } */
                        ?>
        <form action="" class="content__content-form" method="post" autocomplete="off"  onsubmit="return false">
            <div class="form__left">
                <div class="form__left-left">
                    <p class="left__title">Mật khẩu cũ</p>
                    <p class="left__title">Mật khẩu mới</p>
                    <p class="left__title">Xác nhận mật khẩu mới</p>
                    <p class="left__title">Mã xác minh</p>
                </div>
                <div class="form__left-right">
                    <input
                        type="password"
                        name="password"
                        placeholder="Nhập mật khẩu cũ"
                        required="required"
                        class="oldPassword"
                        autocomplete="new-password">
                    <input
                        type="password"
                        name="newpassword"
                        placeholder="Nhập mật khẩu mới"
                        minlength="8"
                        maxlength="32"
                        required="required"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        class="newPassword"
                        autocomplete="new-password">
                    <input
                        type="password"
                        name="renewpassword"
                        placeholder="Nhập lại mật khẩu mới"
                        minlength="8"
                        maxlength="32"
                        required="required"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        class="renewPassword"
                        autocomplete="new-password">
                    <div class="right__otp">
                        <input
                            type="number"
                            name="otp"
                            min="100000"
                            max="999999"
                            placeholder="Mã xác minh gồm 6 chữ số được gửi về email"
                            required="required"
                            class="otp"
                            autocomplete="new-password">
                        <a class="sendotp" href="javascript:void(0)">GỬI OTP</a>
                    </div>
                </div>
            </div>
            <button type="submit" class="updatePasswordUser" name="updatePasswordUser">Lưu</button>
        </form>
    </div>
</div>