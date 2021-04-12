<!DOCTYPE html>
<html lang="vn">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TECHSHOP ✔</title>
    <link rel="icon" href="./assets/image/icon.png" sizes="" />
    <!-- Reset CSS -->
    <link rel="stylesheet" href="./assets/css/reset.css" />
    <!-- Source CSS -->
    <link rel="stylesheet" href="./assets/css/user.css" />
    <!-- FontAwesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />
    <link rel="stylesheet" type="text/css" href="./assets/icon/flaticon.css" />
  </head>
  <body>
    <div class="header">
      <div class="container">
          <div class="header__main">
              <a href="./index.html" class="header__main-logo">
                  <!-- <img src="./assets/image/logo.png" alt=""> -->
                  <h1>TechShop</h1>
                  <h1 class="mobile-logo">T</h1>
              </a>
              <form action="" class="header__main-search">
                  <input type="text" class="search__input" placeholder="Bạn tìm gì...">
                  <button type="submit" class="search__button">
                      <i class="fas fa-search"></i>
                  </button>
              </form>
              <div class="header__main-mini">
                  <a href="" class="mini__cart">
                      <i class="fas fa-shopping-cart"></i>
                      <span>Giỏ hàng</span>
                  </a>
                  <a href="" class="mini__history">
                      <span>LỊCH SỬ <br/>MUA HÀNG</span>
                  </a>
                  <a href="" class="mini__history">
                      <span>ĐĂNG NHẬP</span>
                  </a>
                  <a href="" class="mini__history">
                      <span>Xin chào <br/>Võ Hoài Nam</span>
                  </a>
              </div>
          </div>
          <div class="header__nav">
              <div class="header__nav-item">
                  <a href="./phone.html" class="item__title">
                      <i class="item__icon flaticon-phone"></i>
                      <span>Điện thoại</span>
                  </a>
              </div>
              <div class="header__nav-item">
                  <a href="./laptop.html" class="item__title">
                      <i class="item__icon flaticon-analytics"></i>
                      <span>Laptop</span>
                  </a>
              </div>
              <div class="header__nav-item">
                  <a href="./tablet.html" class="item__title">
                      <i class="item__icon fas fa-tablet-alt"></i>
                      <span>Tablet</span>
                  </a>
              </div>
              <div class="header__nav-item">
                  <a href="#" class="item__title">
                      <i class="item__icon flaticon-headphones"></i>
                      <span style="margin-right: 1rem;">Phụ kiện</span>
                      <i class="fas fa-sort-down" style="font-size: 1.8rem;transform: translateY(-25%);"></i>
                      <i class="fas fa-sort-up" style="font-size: 1.8rem;transform: translateY(25%);"></i>
                  </a>
                  <div class="item__subitem">
                      <a href="#" class="item__subitem-item">Sạc dự phòng</a>
                      <a href="#" class="item__subitem-item">Tai nghe</a>
                      <a href="#" class="item__subitem-item">Bàn phím</a>
                      <a href="#" class="item__subitem-item">Chuột</a>
                      <a href="#" class="item__subitem-item">Miếng dán màn hình</a>
                  </div>
              </div>
              <div class="header__nav-item">
                  <a href="./watch.html" class="item__title">
                      <i class="item__icon flaticon-smartwatch"></i>
                      <span>Đồng hồ thông minh</span>
                  </a>
                  
              </div>
              <div class="header__nav-item">
                  <a href="./pc.html" class="item__title">
                      <i class="item__icon fas fa-desktop"></i>
                      <span>PC, Máy in</span>
                  </a>
              </div>
          </div>
      </div>
    </div>
    
    <div class="dashboard">
        <div class="container">
            <div class="dashboard__left">
                <div class="dashboard__left-info">
                    <img src="./assets/image/vit.jpg" alt="" class="info__img">
                    <span class="info__name">Võ Hoài Nam</span>
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
                        <div class="content__content-error">
                            <p>Mật khẩu nhập lại không đúng</p>
                        </div>
                        <form action="" class="content__content-form">
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
                                    <p class="right__info">vhnvohoainam</p>
                                    <input type="text" name="name" value="Võ Hoài Nam">
                                    <input type="email" name="email" value="vhnvohoainam@gmail.com">
                                    <input type="text" name="tel" value="0354714955">
                                    <select name="gender">
                                        <option value="1">Nam</option>
                                        <option value="2">Nữ</option>
                                        <option value="3">Giới tính thứ ba</option>
                                    </select>
                                    <input type="date" name="birthday" value="2001-05-05">
                                    <input type="text" name="address" value="Bình Định Việt Nam">
                                </div>
                            </div>
                            <div class="form__right">
                                <img src="./assets/image/vit.jpg" alt="">
                                <input type="file" alt="" accept=".png, .jpg, .jpeg, .gif">
                            </div>
                            <button type="submit">Lưu</button>
                        </form>
                    </div>
                </div>
                <div class="dashboard__right-content form__password" id="password">
                    <div class="content__title">
                        <h2>Đổi mật khẩu</h2>
                        <p>Vui lòng không chia sẻ tài khoản cho người khác</p>
                    </div>
                    <div class="content__content">
                        <div class="content__content-error">
                            <p>Mật khẩu nhập lại không đúng</p>
                        </div>
                        <form action="" class="content__content-form">
                            <div class="form__left">
                                <div class="form__left-left">
                                    <p class="left__title">Mật khẩu cũ</p>
                                    <p class="left__title">Mật khẩu mới</p>
                                    <p class="left__title">Xác nhận mật khẩu mới</p>
                                    <p class="left__title">Mã xác minh</p>
                                </div>
                                <div class="form__left-right">
                                    <input type="password" name="password" placeholder="Nhập mật khẩu cũ" minlength="8" maxlength="32" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Bao gồm chữ thường, chữ hoa và số ví dụ : vohoaiNam123 ">
                                    <input type="password" name="newpassword" placeholder="Nhập mật khẩu mới" minlength="8" maxlength="32" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Bao gồm chữ thường, chữ hoa và số ví dụ : vohoaiNam123 ">
                                    <input type="password" name="renewpassword" placeholder="Nhập lại mật khẩu mới" minlength="8" maxlength="32" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Bao gồm chữ thường, chữ hoa và số ví dụ : vohoaiNam123 ">
                                    <div class="right__otp">
                                        <input type="text" name="otp" minlength="6" maxlength="6" required>
                                        <a href="javascript:void(0)">GỬI OTP</a>
                                    </div>
                                </div>
                            </div>
                            <button type="submit">Lưu</button>
                        </form>
                    </div>
                </div>
                <div class="dashboard__right-content form__rank" id="rank">
                    <div class="content__title">
                        <h2>Bậc xếp hạng</h2>
                        <p>Mua hàng nhiều hơn để tăng bậc xếp hạng</p>
                    </div>
                    <div class="content__content">
                        <div class="content__content-process" data-width="1">
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
                            <p>Bạn hiện đang ở bậc <b>New Member</b></p>
                            <p>Bạn cần mua thêm <b>2</b> sản phẩm để có thể lên bậc tiếp theo</p>
                            <p><b>Lên bậc giúp bạn nhận thêm nhiều ưu đãi từ chúng tôi hơn, và có thêm huy hiệu khi comment.</b></p>
                        </div>
                    </div>
                </div>
                <div class="dashboard__right-content form__voucher" id="voucher">
                    <div class="content__title">
                        <h2>Mã voucher của bạn</h2>
                        <p>Mua hàng nhiều hơn để nhận thêm nhiều voucher nhé</p>
                    </div>
                    <div class="content__content">
                        <div class="content__content-row">
                            <div class="row__title row__code">Mã giảm giá</div>
                            <div class="row__title row__info">Nội dung</div>
                            <div class="row__title row__initialdate">Ngày bắt đầu</div>         
                            <div class="row__title row__expirydate">Ngày hết hạn</div>         
                            <div class="row__title row__time">Số lượt dùng</div>         
                        </div>
                        <div class="content__content-row">
                            <div class="row__code">ABCDXY</div>
                            <div class="row__info">Giảm 20% khi mua iPhone 12 Pro Max 128GB</div>
                            <div class="row__initialdate">2021-04-11</div>         
                            <div class="row__expirydate">2021-04-11</div>         
                            <div class="row__time">1</div>         
                        </div>
                        <div class="content__content-row">
                            <div class="row__code">ABCDXY</div>
                            <div class="row__info">Giảm 20% khi mua iPhone 12 Pro Max 128GB</div>
                            <div class="row__initialdate">2021-04-11</div>         
                            <div class="row__expirydate">2021-04-11</div>   
                            <div class="row__time">1</div>   
                        </div>
                        <div class="content__content-row">
                            <div class="row__code">ABCDXY</div>
                            <div class="row__info">Giảm 20% khi mua iPhone 12 Pro Max 128GB</div>
                            <div class="row__initialdate">2021-04-11</div>         
                            <div class="row__expirydate">2021-04-11</div>   
                            <div class="row__time">1</div>   
                        </div>
                        <div class="content__content-row">
                            <div class="row__code">ABCDXY</div>
                            <div class="row__info">Giảm 20% khi mua iPhone 12 Pro Max 128GB</div>
                            <div class="row__initialdate">2021-04-11</div>         
                            <div class="row__expirydate">2021-04-11</div>   
                            <div class="row__time">1</div>     
                        </div>
                    </div>
                </div>
                <div class="dashboard__right-content form__history" id="history">
                    <div class="content__title">
                        <h2>Lịch sử mua hàng của bạn</h2>
                        <p>Uy tín đặt lên hàng đầu</p>
                    </div>
                    <div class="content__content">
                        <div class="content__content-row">
                            <div class="row__title row__code">Mã đơn hàng</div>
                            <div class="row__title row__info">Tên sản phẩm</div>
                            <div class="row__title row__initialdate">Giá sản phẩm</div>         
                            <div class="row__title row__expirydate">Ngày mua</div>         
                            <div class="row__title row__time">Trạng thái</div>         
                        </div>
                        <div class="content__content-row" data-ship="1" title="Đã nhận hàng">
                            <div class="row__code">1</div>
                            <div class="row__info">iPhone 12 Pro Max 128GB</div>
                            <div class="row__initialdate">29.990.000</div>         
                            <div class="row__expirydate">2021-04-11</div>         
                            <div class="row__time">Đã giao</div>         
                        </div>
                        <div class="content__content-row" data-ship="1" title="Đã nhận hàng">
                            <div class="row__code">2</div>
                            <div class="row__info">iPhone 12 Pro Max 128GB</div>
                            <div class="row__initialdate">29.990.000</div>         
                            <div class="row__expirydate">2021-04-11</div>         
                            <div class="row__time">Đã giao</div>   
                        </div>
                        <div class="content__content-row" data-ship="2" title="Đang vận chuyển">
                            <div class="row__code">3</div>
                            <div class="row__info">iPhone 12 Pro Max 128GB</div>
                            <div class="row__initialdate">29.990.000</div>         
                            <div class="row__expirydate">2021-04-11</div>         
                            <div class="row__time">Đang vận chuyển</div>   
                        </div>
                        <div class="content__content-row" data-ship="3" title="Liên hệ admin để biết thêm chi tiết">
                            <div class="row__code">4</div>
                            <div class="row__info">iPhone 12 Pro Max 128GB</div>
                            <div class="row__initialdate">29.990.000</div>         
                            <div class="row__expirydate">2021-04-11</div>         
                            <div class="row__time">Đơn hàng bị hủy</div>     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
      <div class="container">
        <div class="footer__col">
          <a href="#">Lịch sử mua hàng</a>
          <a href="#">Tìm hiểu về mua trả góp</a>
          <a href="#">Chính sách bảo hành</a>
          <a href="#">Chính sách đổi trả</a>
        </div>
        <div class="footer__col">
          <a href="#">Giới thiệu công ty</a>
          <a href="#">Tuyển dụng</a>
          <a href="#">Gửi góp ý, khiếu nại</a>
          <a href="#">Tìm siêu thị (2.460 shop)</a>
        </div>
        <div class="footer__col">
          <p>
            Gọi mua hàng <a href="tel:0354714955">1800.1060</a> (7:30 - 22:00)
          </p>
          <p>
            Gọi khiếu nại <a href="tel:0354714955">1800.1062</a> (8:00 - 21:30)
          </p>
          <p>
            Gọi bảo hành <a href="tel:0354714955">1800.1064</a> (8:00 - 21:00)
          </p>
          <p>Kỹ thuật <a href="tel:0354714955">1800.1763</a> (7:30 - 22:00)</p>
        </div>
        <div class="footer__col footer__collast">
          <div class="footer__col-link">
            <a
              target="_blank"
              href="https://facebook.com/thegioididongcom"
              class="linkfb"
              rel="noopener"
            >
              <i class="fab fa-facebook-square"></i>3.5tr
            </a>
            <a
              target="_blank"
              href="https://facebook.com/thegioididongcom"
              class="linkfb"
              rel="noopener"
            >
              <i class="fab fa-youtube"></i>3.5tr
            </a>
          </div>
          <div class="footer__col-partner">
            <label>Nhà thành lập :</label>
            <a
              class="partner__frontend"
              href="https://www.facebook.com/100009457467356"
              target="_blank"
              >Võ Hoài Nam</a
            >
            <a
              class="partner__frontend"
              href="https://www.facebook.com/100008031519330"
              target="_blank"
              >Huỳnh Minh Hậu</a
            >
            <a
              class="partner__frontend"
              href="https://www.facebook.com/100029417300263"
              target="_blank"
              >Nguyễn Nhật Linh</a
            >
            <a
              class="partner__backend"
              href="https://www.facebook.com/100009169309130"
              target="_blank"
              >Huỳnh Thanh Phong</a
            >
          </div>
        </div>
      </div>
    </div>
    <div
      class="afterfooter"
      style="
        padding: 1rem;
        text-align: center;
        font-size: 10px;
        color: #999;
        font-family: Arial, Helvetica, sans-serif;
      "
    >
      © 2021. Công ty cổ phần TechShop. Điện thoại: 0354 714 955. Email:
      vhnvohoainam@gmail.com.
      <br />Chịu trách nhiệm nội dung: Võ Hoài Nam.
    </div>
    <script>
        actiontype = document.getElementsByClassName('action__type');
        actionResult = document.getElementsByClassName('dashboard__right-content');
        for (var i = 0; i < actiontype.length; i++) {
            actiontype[i].onclick = function(){
                for (var l = 0; l < actiontype.length; l++) {
                    actiontype[l].classList.remove('active');
                }
                this.classList.add('active');
                var getId=this.getAttribute('data-open');
                var showID=document.getElementById(getId);
                showID.classList.remove('active');
                var getId=this.getAttribute('data-open');
                var showID=document.getElementById(getId);
                for (var j = 0; j < actionResult.length; j++) {
                    actionResult[j].classList.remove('active');
                }
                showID.classList.toggle('active');
            }
        }
    </script>
  </body>
</html>
