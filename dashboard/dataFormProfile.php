<div class="dashboard__right-content form__profile active" id="profile">
    <div class="content__title">
        <h2>Hồ sơ của tôi</h2>
        <p>Quản lý thông tin cá nhân</p>
    </div>
    <div class="content__content">
        <?php

                        if (count($error) > 0) {
                            // echo "<div class='content__content-error'>";
                            foreach ($error as $item) {
                                echo<<<XXX
                                    <script>
                                        notyf.error('$item')
                                    </script>
                                    XXX;
                                // echo "<p>$item</p>";
                            }
                            // echo "</div>";
                        }
                        ?>
        <form
            action=""
            class="content__content-form"
            method="post"
            enctype="multipart/form-data">
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
                <img class="form__right-img" src="<?php echo $avatar; ?>" alt="">
                <input
                    type="file"
                    alt=""
                    accept=".png, .jpg, .jpeg, .gif"
                    name="file"
                    onchange="onFileSelected(event)">
            </div>
            <button type="submit" class="updateInfoByUser" name="updateInfoByUser">Lưu</button>
        </form>
    </div>
</div>