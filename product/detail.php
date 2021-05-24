<?php
session_start();
include("../config.php");
// Check type of id, exist or null 
$id = isset($_GET["id"]) ? (int)$_GET["id"] : 1;
$id === 0 ? $id = 1 : $id = $id;
$check_id = $connect->query("SELECT id from product where id = $id");
if (mysqli_num_rows($check_id) == 0) {
    $id = 1;
}
// Khởi tạo cart
if (isset($_SESSION['cart']) === false) {
    $cart = array();
    $cartInfo = array();
    $cartInfo['code'] = '';
    $cartInfo['percent'] = 0;
    $cartInfo['price'] = 0;
    $cart[0] = $cartInfo;
    $_SESSION['cart'] = $cart;
}
// End check for id
$data = mysqli_fetch_assoc($connect->query("SELECT * FROM product WHERE id = $id"));

// Hiển thị số sao để đổ  
function exportStar($number)
{
    switch ($number) {
        case 0:
            return "<i style='font-size:14px;color:#dfdfdf;' class='far fa-star'></i>
                    <i style='font-size:14px;color:#dfdfdf;' class='far fa-star'></i>
                    <i style='font-size:14px;color:#dfdfdf;' class='far fa-star'></i>
                    <i style='font-size:14px;color:#dfdfdf;' class='far fa-star'></i>
                    <i style='font-size:14px;color:#dfdfdf;' class='far fa-star'></i>";
        case 1:
            return "<i class='active fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>";
        case 2:
            return "<i class='active fas fa-star'></i>
                    <i class='active fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>";
        case 3:
            return "<i class='active fas fa-star'></i>
                    <i class='active fas fa-star'></i>
                    <i class='active fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>";
        case 4:
            return "<i class='active fas fa-star'></i>
                    <i class='active fas fa-star'></i>
                    <i class='active fas fa-star'></i>
                    <i class='active fas fa-star'></i>
                    <i class='fas fa-star'></i>";
        case 5:
            return "<i class='active fas fa-star'></i>
                    <i class='active fas fa-star'></i>
                    <i class='active fas fa-star'></i>
                    <i class='active fas fa-star'></i>
                    <i class='active fas fa-star'></i>";
    }
}
//Tăng lượt xem sau khi load
$upView = $connect->query("UPDATE product SET view = $data[view]+1 WHERE product.id = $data[id]");
?>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/icon/flaticon.css">
    <script src="../assets/script/jquery-3.6.0.min.js"></script>
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
            img.addEventListener("mouseout", () => {
                document.querySelector(".img-zoom-result").style.opacity = 0;
            });
            img.addEventListener("mouseover", () => {
                document.querySelector(".img-zoom-result").style.opacity = 1;
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
                if (x > img.width - lens.offsetWidth) {
                    x = img.width - lens.offsetWidth;
                }
                if (x < 0) {
                    x = 0;
                }
                if (y > img.height - lens.offsetHeight) {
                    y = img.height - lens.offsetHeight;
                }
                if (y < 0) {
                    y = 0;
                }
                /* Set the position of the lens: */
                lens.style.left = x + "px";
                lens.style.top = y + "px";
                /* Display what the lens "sees": */
                result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
            }

            function getCursorPos(e) {
                var a, x = 0,
                    y = 0;
                e = e || window.event;
                /* Get the x and y positions of the image: */
                a = img.getBoundingClientRect();
                /* Calculate the cursor's x and y coordinates, relative to the image: */
                x = e.pageX - a.left;
                y = e.pageY - a.top;
                /* Consider any page scrolling: */
                x = x - window.pageXOffset;
                y = y - window.pageYOffset;
                return {
                    x: x,
                    y: y
                };
            }
        }
    </script>
    <link rel="stylesheet" href="../assets/css/notify.css">
    <script src="../assets/script/notyf.min.js"></script>
</head>

<body>
    <button class="scrollbutton" style="z-index:99;border-radius:1rem;display:none;position: fixed; right: 1rem;bottom: 2rem;padding: 1.2rem 1.4rem;background:#D70018;outline: none;border: none;cursor:pointer">
        <i class="fas fa-sort-up" style="font-size:1.6rem;color:white;transform:translateY(45%);"></i>
    </button>
    <?php
    include_once('../header.php');
    ?>
    <div class="detail" style="padding-top:100px;">
        <div class="container">
            <div class="detail__type">
                <?php
                $type = mysqli_fetch_assoc($connect->query("SELECT producttype.name from producttype where producttype.id = ${data['type']}"));
                echo "<a href=''>${type['name']}</a>";
                $manufacturer = mysqli_fetch_assoc($connect->query("SELECT name FROM manufacturer WHERE id = ${data['manufacturer']}"));
                echo "<i class='fas fa-chevron-right'></i>";
                echo "<a href='#'>" . $type['name'] . " " . $manufacturer["name"] . "</a>";
                ?>
            </div>
            <div class="detail__desc">
                <p class="detail__desc-title"><?php echo $data['name'] . " " . number_format($data['price']) . "vnđ"; ?></p>
                <div class="detail__desc-rate">
                    <?php
                    echo exportStar($data['rate']);
                    $countRate = mysqli_fetch_assoc($connect->query("SELECT COUNT(*) as count FROM rate WHERE id_product = ${data['id']}"));
                    echo "<a href='#danhgia'> " . $countRate['count'] . " đánh giá</a>";
                    ?>
                    <a href="#">- <?php echo $data['view']; ?> lượt xem</a>
                </div>
            </div>
        </div>
    </div>
    <div class="description">
        <div class="container">
            <div class="description__img">
                <img id="myimage" class="zoom-img" id="zoom_01" data-zoom-image="<?php echo $data['image']; ?>" src="<?php echo $data['image']; ?>" alt="">
                <div id="myresult" class="img-zoom-result"></div>
            </div>
            <div class="description__table">
                <div class="description__table-content">
                    <h3 class="content__title">Thông số kỹ thuật</h3>
                    <?php echo $data['configuration']; ?>
                </div>
            </div>
            <div class="description__action">
                <a href="javascript:void(0)" class="description__action-buy" title="MUA NGAY">
                    <p>MUA NGAY</p>
                    <p>Giao hàng tận nơi hoặc nhận tại cửa hàng</p>
                </a>
                <a href="javascript:void(0)" class="description__action-addToCart" title="MUA NGAY">
                    <p>THÊM VÀO GIỎ HÀNG</p>
                    <p>Tiện cho việc thanh toán</p>
                </a>
            </div>
        </div>
    </div>
    <div class="paragraph">
        <div class="container">
            <?php echo $data['description']; ?>
        </div>
    </div>
    <div class="comment">
        <div class="container">
            <h1 class="comment__title">Bình luận sản phẩm</h1>
            <?php
            if (isset($_SESSION['idUserLogin'])) {
                if (mysqli_num_rows($connect->query("SELECT star from rate where id_product=$data[id] and id_user=$_SESSION[idUserLogin]")) > 0) {
                    $getStar = mysqli_fetch_assoc($connect->query("SELECT star from rate where id_product=$data[id] and id_user=$_SESSION[idUserLogin]"))['star'];
                    echo "  <form class='comment__form' action='' method='post'>
                                <textarea class='comment__form-content' value=''></textarea>
                                <select name='comment__form-rate' id=''>";
                    if ($getStar == 0 || $getStar == 5) {
                        echo "      <option value='5'>5 sao</option>
                                    <option value='4'>4 sao</option>
                                    <option value='3'>3 sao</option>
                                    <option value='2'>2 sao</option>
                                    <option value='1'>1 sao</option>";
                    }
                    if ($getStar == 1) {
                        echo "      <option value='5'>5 sao</option>
                                    <option value='4'>4 sao</option>
                                    <option value='3'>3 sao</option>
                                    <option value='2'>2 sao</option>
                                    <option value='1' selected>1 sao</option>";
                    }
                    if ($getStar == 2) {
                        echo "      <option value='5'>5 sao</option>
                                    <option value='4'>4 sao</option>
                                    <option value='3'>3 sao</option>
                                    <option value='2' selected>2 sao</option>
                                    <option value='1'>1 sao</option>";
                    }
                    if ($getStar == 3) {
                        echo "      <option value='5'>5 sao</option>
                                    <option value='4'>4 sao</option>
                                    <option value='3' selected>3 sao</option>
                                    <option value='2'>2 sao</option>
                                    <option value='1'>1 sao</option>";
                    }
                    if ($getStar == 4) {
                        echo "      <option value='5'>5 sao</option>
                                    <option value='4' selected>4 sao</option>
                                    <option value='3'>3 sao</option>
                                    <option value='2'>2 sao</option>
                                    <option value='1'>1 sao</option>";
                    }
                    echo "      </select>
                                <button type='submit'>GỬI BÌNH LUẬN</button>
                            </form>";
                } else {
                    echo "    <form class='comment__form' action='' method='post'>
                                <textarea class='comment__form-content' value=''></textarea>
                                <select name='comment__form-rate' id=''>  
                                    <option value='5'>5 sao</option>
                                    <option value='4'>4 sao</option>
                                    <option value='3'>3 sao</option>
                                    <option value='2'>2 sao</option>
                                    <option value='1'>1 sao</option>
                                </select>
                                <button type='submit'>GỬI BÌNH LUẬN</button>
                            </form>";
                }
            } else {
                echo <<<ABC
                        <div class="comment__warning">
                            <h1>
                                <a href="../login/dangnhap.php">ĐĂNG NHẬP</a>
                                ĐỂ BÌNH LUẬN VÀ ĐÁNH GIÁ
                            </h1>
                        </div>
                    ABC;
            }
            ?>
            <div class="comment__content">
                <!-- Import here -->
            </div>
            <div class="comment__page">
                <!-- Import here -->
            </div>
        </div>
    </div>
    <?php
    include_once('../footer.php');
    ?>

    <script>
        window.addEventListener('DOMContentLoaded', function() {
            var notyf = new Notyf({
                duration: 1700,
                ripple: true,
                dismissible: true,
                position: {
                    x: 'left',
                    y: 'bottom',
                }
            });
            /* Scroll button */
            scrollbtn = document.querySelector('.scrollbutton')
            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 100) {
                    scrollbtn.classList.add('show');
                } else {
                    scrollbtn.classList.remove('show');
                }
            })
            scrollbtn.onclick = () => {
                window.scrollTo(0, 0);
            }
            imageZoom("myimage", "myresult");
            // Xem thêm 
            paragraph = document.querySelector('.paragraph');
            paragraphmorebutton = document.querySelector('.paragraph__more');
            paragraphmorebutton.onclick = () => {
                paragraph.style.height = 'unset';
                paragraphmorebutton.style.display = 'none';
            }
            //Xử lí comment 
            commentRequest = document.querySelectorAll(".comment__page-item");
            getPages = () => document.querySelectorAll('.comment__page-item');
            currentPage = 1;
            loadPage = () => {
                $.ajax({
                    url: "<?php echo $domain . "/product/commentPage.php" ?>",
                    type: 'POST',
                    data: {
                        id: <?php echo $id; ?>,
                    },
                    success: function(data) {
                        $(".comment__page").html(data);
                    }
                });
                // commentRequest = getPages();
            }
            loadComment = () => {
                $.ajax({
                    url: "<?php echo $domain . "/product/commentData.php" ?>",
                    type: 'POST',
                    data: {
                        id: <?php echo $id; ?>,
                        currentPage: currentPage
                    },
                    success: function(data) {
                        $(".comment__content").html(data);
                    }
                });
            }
            loadPage();
            loadComment();
            /* setInterval(() => {
                loadComment();
            }, 1000); */
            setTimeout(() => {
                commentRequest = getPages();
                commentRequest.forEach(element => {
                    element.onclick = () => {
                        currentPage = element.innerText;
                        removeActive();
                        element.classList.add('active');
                        $.ajax({
                            url: "<?php echo $domain . "/product/commentData.php" ?>",
                            type: 'POST',
                            data: {
                                id: <?php echo $id; ?>,
                                currentPage: currentPage
                            },
                            success: function(data) {
                                $(".comment__content").html(data);
                            }
                        });
                    }
                });
            }, 100);
            idLogin = <?php echo isset($rowUser['id']) ? $rowUser['id'] : 0 ?>;
            if (idLogin != 0) {
                $('.comment__form').submit(function(event) {
                    event.preventDefault();
                    $.ajax({
                        url: "<?php echo $domain . "/product/commentAdd.php" ?>",
                        type: 'POST',
                        data: {
                            id_product: <?php echo $id; ?>,
                            id_user: <?php echo isset($rowUser['id']) ? $rowUser['id'] : 0 ?>,
                            rate: $('select').find('option:selected').text(),
                            comment: $('.comment__form-content').val()
                        },
                        success: function(data) {
                            console.log(data + 'ne')
                            loadComment();
                            loadPage();
                            setTimeout(() => {
                                again();
                            }, 1000);
                            if ($('.comment__form-content').val() != '') {
                                notyf.success('Gửi bình luận thành công');
                            } else {
                                notyf.success('Đánh giá thành công');

                            }
                        }
                    });
                })
            }
            const again = () => {
                commentRequest = getPages();
                commentRequest.forEach(element => {
                    element.onclick = () => {
                        currentPage = element.innerText;
                        removeActive();
                        element.classList.add('active');
                        $.ajax({
                            url: "<?php echo $domain . "/product/commentData.php" ?>",
                            type: 'POST',
                            data: {
                                id: <?php echo $id; ?>,
                                currentPage: currentPage
                            },
                            success: function(data) {
                                $(".comment__content").html(data);
                            }
                        });
                    }
                });
            }
            removeActive = () => {
                commentRequest.forEach(element => {
                    element.classList.remove('active');
                })
            }
            var notyf = new Notyf({
                duration: 1500,
                position: {
                    x: 'left',
                    y: 'bottom',
                },
                ripple: true,
                dismissible: true,
            });
            //Thêm vào giỏ hàng
            addToCartBtn = document.querySelector(".description__action-addToCart");
            addToCartBtn.onclick = () => {
                $.ajax({
                    url: "<?php echo $domain . "/actions/actionCartAdd.php" ?>",
                    type: 'POST',
                    data: {
                        id: <?php echo $data['id']; ?>,
                    },
                    success: function(data) {
                        if (data == 1) {
                            notyf.success('Thêm vào giỏ hàng thành công');
                        }
                        if (data == 2) {
                            notyf.success('Tăng số lượng thành công');
                        }
                    }
                });
            }
            //Thêm và chuyển hướng vào giỏ hàng
            addAndBuy = document.querySelector(".description__action-buy");
            addAndBuy.onclick = () => {
                $.ajax({
                    url: "<?php echo $domain . "/actions/actionCartAdd.php" ?>",
                    type: 'POST',
                    data: {
                        id: <?php echo $data['id']; ?>,
                    },
                    success: function(data) {
                        window.location.href = "<?php echo $domain."/cart/cart.php";?>"
                    }
                });
            }
        });
    </script>
</body>

</html>