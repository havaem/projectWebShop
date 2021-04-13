<!DOCTYPE html>
<html lang="vn">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TECHSHOP ✔</title>
        <link rel="icon" href="../assets/image/icon.png" sizes="">
        <!-- Reset CSS -->
        <link rel="stylesheet" href="../assets/css/reset.css">
        <!-- Source CSS -->
        <link rel="stylesheet" href="../assets/css/detail.css">
        <!-- FontAwesome -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/icon/flaticon.css">
        <script>
            function imageZoom(imgID, resultID) {
                var img, lens, result, cx, cy;
                img = document.getElementById(imgID);
                result = document.getElementById(resultID);
                /* Create lens: */
                lens = document.createElement("DIV");
                lens.setAttribute("class", "img-zoom-lens");
                /* Insert lens: */
                img.parentElement.insertBefore(lens, img);
                /* Calculate the ratio between result DIV and lens: */
                cx = result.offsetWidth / lens.offsetWidth;
                cy = result.offsetHeight / lens.offsetHeight;
                /* Set background properties for the result DIV */
                result.style.backgroundImage = "url('" + img.src + "')";
                result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
                /* Execute a function when someone moves the cursor over the image, or the lens: */
                lens.addEventListener("mousemove", moveLens);
                img.addEventListener("mousemove", moveLens);
                /* And also for touch screens: */
                lens.addEventListener("touchmove", moveLens);
                img.addEventListener("touchmove", moveLens);
                img.addEventListener("mouseout", ()=>{
                document.querySelector(".img-zoom-result").style.opacity = 0;
                console.log('out')
                });
                img.addEventListener("mouseover", ()=>{
                document.querySelector(".img-zoom-result").style.opacity = 1;
                console.log('in')
                });
                function moveLens(e) {
                var pos, x, y;
                /* Prevent any other actions that may occur when moving over the image */
                e.preventDefault();
                /* Get the cursor's x and y positions: */
                pos = getCursorPos(e);
                /* Calculate the position of the lens: */
                x = pos.x - (lens.offsetWidth / 2);
                y = pos.y - (lens.offsetHeight / 2);
                /* Prevent the lens from being positioned outside the image: */
                if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
                if (x < 0) {x = 0;}
                if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
                if (y < 0) {y = 0;}
                /* Set the position of the lens: */
                lens.style.left = x + "px";
                lens.style.top = y + "px";
                /* Display what the lens "sees": */
                result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
                }
                function getCursorPos(e) {
                    var a, x = 0, y = 0;
                    e = e || window.event;
                    /* Get the x and y positions of the image: */
                    a = img.getBoundingClientRect();
                    /* Calculate the cursor's x and y coordinates, relative to the image: */
                    x = e.pageX - a.left;
                    y = e.pageY - a.top;
                    /* Consider any page scrolling: */
                    x = x - window.pageXOffset;
                    y = y - window.pageYOffset;
                    return {x : x, y : y};
                }
            }
        </script>
    </head>
    <body>
        <button class="scrollbutton" style="z-index:99;border-radius:1rem;display:none;position: fixed; right: 1rem;bottom: 2rem;padding: 1.2rem 1.4rem;background:#D70018;outline: none;border: none;cursor:pointer">
            <i class="fas fa-sort-up" style="font-size:1.6rem;color:white;transform:translateY(45%);"></i>
        </button>
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
        <div class="detail" style="padding-top:100px;">
            <div class="container">
                <div class="detail__type">
                    <a href="">Điện thoại</a>
                    <i class="fas fa-chevron-right"></i>
                    <a href="#">Điện thoại OPPO</a>
                </div>
                <div class="detail__desc">
                    <p class="detail__desc-title">Điện thoại OPPO A15</p>
                    <div class="detail__desc-rate">
                        <i class="active fas fa-star"></i>
                        <i class="active fas fa-star"></i>
                        <i class="active fas fa-star"></i>
                        <i class="active fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <a href="#danhgia">30 đánh giá</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="description">
            <div class="container">
                <div class="description__img">
                    <img id="myimage" class="zoom-img" id="zoom_01" data-zoom-image="https://cdn.tgdd.vn/Products/Images/42/229885/oppo-a15-black-600x600-2-600x600.jpg" src="https://cdn.tgdd.vn/Products/Images/42/229885/oppo-a15-black-600x600-2-600x600.jpg" alt="">
                    <div id="myresult" class="img-zoom-result"></div>
                </div>
                <div class="description__table">
                    <div class="description__table-content">
                        <h3 class="content__title" >Thông số kỹ thuật</h3>
                        <div class="content__row">
                            <span class="content__row-title">Màn hình:</span>
                            <span class="content__row-content">	IPS LCD, 6.52", HD+</span>
                        </div>
                        <div class="content__row">
                            <span class="content__row-title">Hệ điều hành:</span>
                            <span class="content__row-content">Android 10</span>
                        </div>
                        <div class="content__row">
                            <span class="content__row-title">Camera sau:</span>
                            <span class="content__row-content">Chính 13 MP & Phụ 2 MP, 2 MP</span>
                        </div>
                        <div class="content__row">
                            <span class="content__row-title">Camera trước:</span>
                            <span class="content__row-content">8 MP</span>
                        </div>
                        <div class="content__row">
                            <span class="content__row-title">Chip:</span>
                            <span class="content__row-content">MediaTek Helio P35 8 nhân</span>
                        </div>
                        <div class="content__row">
                            <span class="content__row-title">RAM:</span>
                            <span class="content__row-content">3 GB</span>
                        </div>
                        <div class="content__row">
                            <span class="content__row-title">Bộ nhớ trong:</span>
                            <span class="content__row-content">	32 GB</span>
                        </div>
                        <div class="content__row">
                            <span class="content__row-title">SIM:</span>
                            <span class="content__row-content">2 Nano SIM, Hỗ trợ 4G</span>
                        </div>
                        <div class="content__row">
                            <span class="content__row-title">Pin:</span>
                            <span class="content__row-content">4230 mAh</span>
                        </div> 
                    </div>
                </div>
                <div class="description__action">
                    <a href="" class="description__action-buy" title="MUA NGAY">
                        <p>MUA NGAY</p>
                        <p>Giao hàng tận nơi hoặc nhận tại cửa hàng</p>
                    </a>
                    <a href="" class="description__action-addToCart" title="MUA NGAY">
                        <p>THÊM VÀO GIỎ HÀNG</p>
                        <p>Tiện cho việc thanh toán</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="paragraph">
            <div class="container">
                <b class="paragraph__title">Đặc điểm nổi bật của OPPO A15</b>
                <h1 class="paragraph__h1">OPPO hãng điện thoại luôn được người Việt tin dùng và lựa chọn, mới đây hãng đã cho ra mắt mẫu OPPO A15 có thiết kế đẹp, cấu hình đủ dùng. Đây sẽ là mẫu điện thoại thông minh phù hợp cho mọi đối tượng người dùng đi cùng với mức giá vô cùng hợp lý.</h1>
                <h2 class="paragraph__h2">Màn hình lớn, thoải mái xem phim, đọc báo</h2>
                <p class="paragraph__p">OPPO A15 được trang bị công nghệ màn hình IPS LCD, cho độ phân giải HD+ (720 x 1600 Pixels), màn hình lớn 6.52 inch thoải mái nhìn khi sử dụng, đặc biệt là dành cho người lớn tuổi hay sử dụng điện thoại thông minh để đọc báo, xem tin tức.</p>
                <img class="paragraph__img" src="https://cdn.tgdd.vn/Products/Images/42/229885/oppo-a15-1-1.jpg" alt="">
                <p class="paragraph__p">OPPO A15 được trang bị công nghệ màn hình IPS LCD, cho độ phân giải HD+ (720 x 1600 Pixels), màn hình lớn 6.52 inch thoải mái nhìn khi sử dụng, đặc biệt là dành cho người lớn tuổi hay sử dụng điện thoại thông minh để đọc báo, xem tin tức.</p>
                <img class="paragraph__img" src="https://cdn.tgdd.vn/Products/Images/42/229885/oppo-a15-1-1.jpg" alt="">
                <h2 class="paragraph__h2">Màn hình lớn, thoải mái xem phim, đọc báo</h2>
                <p class="paragraph__p">OPPO A15 được trang bị công nghệ màn hình IPS LCD, cho độ phân giải HD+ (720 x 1600 Pixels), màn hình lớn 6.52 inch thoải mái nhìn khi sử dụng, đặc biệt là dành cho người lớn tuổi hay sử dụng điện thoại thông minh để đọc báo, xem tin tức.</p>
                <img class="paragraph__img" src="https://cdn.tgdd.vn/Products/Images/42/229885/oppo-a15-3-1.jpg" alt="">
                <p class="paragraph__p">Hệ thống camera như thế này là quá đủ để cho bạn chụp mọi hình ảnh trong mọi khoảnh khắc với rõ nét cao. Ống kính macro 2 MP cho phép bạn chụp cận cảnh để khám phá những điều diệu kỳ của thế giới thu nhỏ. Ngoài ra, ống kính đo độ sâu 2 MP giúp mọi bức ảnh chân dung trở nên hoàn hảo làm nổi bật chủ thể hơn.</p>
                <button class="paragraph__more">Xem thêm !</button>
            </div>
        </div>
        <div class="comment">
            <div class="container">
                <h1 class="comment__title">Bình luận sản phẩm</h1>
                <form class="comment__form" action="" method="post">
                    <textarea value=""></textarea>
                    <select name="" id="">
                        <option value="1">1 sao</option>
                        <option value="2">2 sao</option>
                        <option value="3">3 sao</option>
                        <option value="4">4 sao</option>
                        <option value="5">5 sao</option>
                    </select>
                    <button type="submit">GỬI BÌNH LUẬN</button>
                </form>
                <div class="comment__warning">
                    <h1>VUI LÒNG <a href="#">ĐĂNG NHẬP</a> ĐỂ BÌNH LUẬN</h1>
                </div>
                <div class="comment__content">
                    <div class="comment__content-item">
                        <h3 class="item__name">Võ Hoài Nam<i class="fas fa-check-circle" title="VIP1"></i></h3>
                        <span class="item__time">2021-04-07 23:50:44</span>
                        <div class="item__rate">
                            <i class="active fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4 class="item__comment">Sản phẩm như shit</h4>
                    </div>
                    <div class="comment__content-item">
                        <h3 class="item__name">Huỳnh Thanh Phong<i class="fas fa-check-circle" title="NewMember"></i></h3>
                        <span class="item__time" title="Member">2021-04-07 23:50:44</span>
                        <div class="item__rate">
                            <i class="active fas fa-star"></i>
                            <i class="active fas fa-star"></i>
                            <i class="active fas fa-star"></i>
                            <i class="active fas fa-star"></i>
                            <i class="active fas fa-star"></i>
                        </div>
                        <h4 class="item__comment">Sản phẩm vip pro xịn lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam sint distinctio neque nisi vitae, temporibus vero placeat beatae laborum aspernatur, animi eaque nemo recusandae consectetur inventore nostrum in quam nesciunt?lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam sint distinctio neque nisi vitae, temporibus vero placeat beatae laborum aspernatur, animi eaque nemo recusandae consectetur inventore nostrum in quam nesciunt?</h4>
                    </div>
                    <div class="comment__content-item">
                        <h3 class="item__name">Huỳnh Minh Hậu<i class="fas fa-check-circle" title="VIP2"></i></h3>
                        <span class="item__time" title="Member">2021-04-07 23:50:44</span>
                        <div class="item__rate">
                            <i class="active fas fa-star"></i>
                            <i class="active fas fa-star"></i>
                            <i class="active fas fa-star"></i>
                            <i class="active fas fa-star"></i>
                            <i class="active fas fa-star"></i>
                        </div>
                        <h4 class="item__comment">Sản phẩm vip pro xịn lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam sint distinctio neque nisi vitae, temporibus vero placeat beatae laborum aspernatur, animi eaque nemo recusandae consectetur inventore nostrum in quam nesciunt?lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam sint distinctio neque nisi vitae, temporibus vero placeat beatae laborum aspernatur, animi eaque nemo recusandae consectetur inventore nostrum in quam nesciunt?</h4>
                    </div>
                    <div class="comment__content-item">
                        <h3 class="item__name">Nguyễn Nhật Linh<i class="fas fa-check-circle" title="VIP3"></i></h3>
                        <span class="item__time" title="Member">2021-04-07 23:50:44</span>
                        <div class="item__rate">
                            <i class="active fas fa-star"></i>
                            <i class="active fas fa-star"></i>
                            <i class="active fas fa-star"></i>
                            <i class="active fas fa-star"></i>
                            <i class="active fas fa-star"></i>
                        </div>
                        <h4 class="item__comment">Sản phẩm vip pro xịn lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam sint distinctio neque nisi vitae, temporibus vero placeat beatae laborum aspernatur, animi eaque nemo recusandae consectetur inventore nostrum in quam nesciunt?lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam sint distinctio neque nisi vitae, temporibus vero placeat beatae laborum aspernatur, animi eaque nemo recusandae consectetur inventore nostrum in quam nesciunt?</h4>
                    </div>
                    <div class="comment__content-item">
                        <h3 class="item__name">Nguyễn Nhật Linh Gà<i class="fas fa-check-circle" title="VIP4"></i></h3>
                        <span class="item__time" title="Member">2021-04-07 23:50:44</span>
                        <div class="item__rate">
                            <i class="active fas fa-star"></i>
                            <i class="active fas fa-star"></i>
                            <i class="active fas fa-star"></i>
                            <i class="active fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4 class="item__comment">Sản phẩm vip pro xịn lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam sint distinctio neque nisi vitae, temporibus vero placeat beatae laborum aspernatur, animi eaque nemo recusandae consectetur inventore nostrum in quam nesciunt?lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam sint distinctio neque nisi vitae, temporibus vero placeat beatae laborum aspernatur, animi eaque nemo recusandae consectetur inventore nostrum in quam nesciunt?</h4>
                    </div>
                    <div class="comment__content-item">
                        <h3 class="item__name">Võ Nam<i class="fas fa-check-circle" title="VIP5"></i></h3>
                        <span class="item__time" title="Member">2021-04-07 23:50:44</span>
                        <div class="item__rate">
                            <i class="active fas fa-star"></i>
                            <i class="active fas fa-star"></i>
                            <i class="active fas fa-star"></i>
                            <i class="active fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4 class="item__comment">Sản phẩm vip pro xịn lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam sint distinctio neque nisi vitae, temporibus vero placeat beatae laborum aspernatur, animi eaque nemo recusandae consectetur inventore nostrum in quam nesciunt?lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam sint distinctio neque nisi vitae, temporibus vero placeat beatae laborum aspernatur, animi eaque nemo recusandae consectetur inventore nostrum in quam nesciunt?</h4>
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
                    <p>Gọi mua hàng <a href="tel:0354714955">1800.1060</a> (7:30 - 22:00)</p>
                    <p>Gọi khiếu nại <a href="tel:0354714955">1800.1062</a> (8:00 - 21:30)</p>
                    <p>Gọi bảo hành <a href="tel:0354714955">1800.1064</a> (8:00 - 21:00)</p>
                    <p>Kỹ thuật <a href="tel:0354714955">1800.1763</a> (7:30 - 22:00)</p>
                </div>
                <div class="footer__col footer__collast">
                    <div class="footer__col-link">
                        <a target="_blank" href="https://facebook.com/thegioididongcom" class="linkfb" rel="noopener">
                            <i class="fab fa-facebook-square"></i>3.5tr
                        </a>
                        <a target="_blank" href="https://facebook.com/thegioididongcom" class="linkfb" rel="noopener">
                            <i class="fab fa-youtube"></i>3.5tr
                        </a>
                    </div>
                    <div class="footer__col-partner">
                        <label>Nhà thành lập :</label>
                        <a class="partner__frontend"href="https://www.facebook.com/100009457467356" target="_blank">Võ Hoài Nam</a>
                        <a class="partner__frontend"href="https://www.facebook.com/100008031519330" target="_blank">Huỳnh Minh Hậu</a>
                        <a class="partner__frontend"href="https://www.facebook.com/100029417300263" target="_blank">Nguyễn Nhật Linh</a>
                        <a class="partner__backend"href="https://www.facebook.com/100009169309130" target="_blank">Huỳnh Thanh Phong</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.write('\u003c\u0064\u0069\u0076\u0020\u0063\u006c\u0061\u0073\u0073\u003d\u0022\u0061\u0066\u0074\u0065\u0072\u0066\u006f\u006f\u0074\u0065\u0072\u0022\u0020\u0073\u0074\u0079\u006c\u0065\u003d\u0022\u0070\u0061\u0064\u0064\u0069\u006e\u0067\u003a\u0031\u0072\u0065\u006d\u003b\u0074\u0065\u0078\u0074\u002d\u0061\u006c\u0069\u0067\u006e\u003a\u0020\u0063\u0065\u006e\u0074\u0065\u0072\u003b\u0066\u006f\u006e\u0074\u002d\u0073\u0069\u007a\u0065\u003a\u0020\u0031\u0030\u0070\u0078\u003b\u0063\u006f\u006c\u006f\u0072\u003a\u0023\u0039\u0039\u0039\u003b\u0066\u006f\u006e\u0074\u002d\u0066\u0061\u006d\u0069\u006c\u0079\u003a\u0020\u0041\u0072\u0069\u0061\u006c\u002c\u0020\u0048\u0065\u006c\u0076\u0065\u0074\u0069\u0063\u0061\u002c\u0020\u0073\u0061\u006e\u0073\u002d\u0073\u0065\u0072\u0069\u0066\u003b\u0022\u003e\u000a\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u00a9\u0020\u0032\u0030\u0032\u0031\u002e\u0020\u0043\u00f4\u006e\u0067\u0020\u0074\u0079\u0020\u0063\u1ed5\u0020\u0070\u0068\u1ea7\u006e\u0020\u0054\u0065\u0063\u0068\u0053\u0068\u006f\u0070\u002e\u0020\u0110\u0069\u1ec7\u006e\u0020\u0074\u0068\u006f\u1ea1\u0069\u003a\u0020\u0030\u0033\u0035\u0034\u0020\u0037\u0031\u0034\u0020\u0039\u0035\u0035\u002e\u0020\u0045\u006d\u0061\u0069\u006c\u003a\u0020\u0076\u0068\u006e\u0076\u006f\u0068\u006f\u0061\u0069\u006e\u0061\u006d\u0040\u0067\u006d\u0061\u0069\u006c\u002e\u0063\u006f\u006d\u002e\u000a\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u003c\u0062\u0072\u003e\u0043\u0068\u1ecb\u0075\u0020\u0074\u0072\u00e1\u0063\u0068\u0020\u006e\u0068\u0069\u1ec7\u006d\u0020\u006e\u1ed9\u0069\u0020\u0064\u0075\u006e\u0067\u003a\u0020\u0056\u00f5\u0020\u0048\u006f\u00e0\u0069\u0020\u004e\u0061\u006d\u002e\u000a\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u003c\u002f\u0064\u0069\u0076\u003e')
            window.addEventListener('DOMContentLoaded',function () {
                imageZoom("myimage", "myresult");
                paragraph = document.querySelector('.paragraph');
                paragraphmorebutton = document.querySelector('.paragraph__more');
                paragraphmorebutton.onclick=()=>{
                    paragraph.style.height = 'unset';
                    paragraphmorebutton.style.display = 'none';
                }
                
            });
        </script>
    </body>
</html>