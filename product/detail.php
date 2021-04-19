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
// End check for id
$data = mysqli_fetch_assoc($connect->query("SELECT * FROM product WHERE id = $id"));

// Hiển thị số sao để đổ  
function exportStar($number)
{
    switch ($number) {
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
                console.log('out')
            });
            img.addEventListener("mouseover", () => {
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
                <p class="detail__desc-title"><?php echo $data['name']; ?></p>
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
            <?php echo $data['description']; ?>
        </div>
    </div>
    <div class="comment">
        <div class="container">
            <h1 class="comment__title">Bình luận sản phẩm</h1>
            <?php
            if (isset($_SESSION['idUserLogin'])) {
                echo "<form class='comment__form' action='' method='post'>
                            <textarea value=''></textarea>
                            <select name='' id=''>
                                <option value='1'>1 sao</option>
                                <option value='2'>2 sao</option>
                                <option value='3'>3 sao</option>
                                <option value='4'>4 sao</option>
                                <option value='5'>5 sao</option>
                            </select>
                            <button type='submit'>GỬI BÌNH LUẬN</button>
                        </form>";
            } else {
                echo <<<ABC
                        <div class="comment__warning">
                            <h1>VUI LÒNG
                                <a href="../login/dangnhap.php">ĐĂNG NHẬP</a>
                                ĐỂ BÌNH LUẬN
                            </h1>
                        </div>
                    ABC;
            }
            ?>
            <div class="comment__content">
                <!-- Import here -->
            </div>
            <div class="comment__page">
                <?php
                $totalRecord = mysqli_num_rows($connect->query("SELECT * FROM comment WHERE id_product = $id"));
                if ($totalRecord != 0) {
                    $totalPages = ceil($totalRecord / 4);
                    for ($i = 1; $i <= $totalPages; $i++) {
                        if ($i == 1) {
                            echo "<a class='comment__page-item active' href='javascript:void(0)'>" . $i . "</a>";
                            continue;
                        }
                        echo "<a class='comment__page-item' href='javascript:void(0)'>" . $i . "</a>";
                    }
                }
                else{
                    echo "<h1 style='color:red'>KHÔNG CÓ COMMENT NÀO :(</h1>";
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    include_once('../footer.php');
    ?>
    <script>
        $(document).ready(function() {
            imageZoom("myimage", "myresult");
            paragraph = document.querySelector('.paragraph');
            paragraphmorebutton = document.querySelector('.paragraph__more');
            paragraphmorebutton.onclick = () => {
                paragraph.style.height = 'unset';
                paragraphmorebutton.style.display = 'none';
            }
            currentPage = 1;
            
            $.ajax({
                url: "http://localhost/projectWebshop/product/commentData.php",
                type: 'POST',
                data: {
                    id: <?php echo $id; ?>,
                    currentPage: currentPage
                },
                success: function(data) {
                    $(".comment__content").html(data);
                }
            });
            commentRequest = document.querySelectorAll(".comment__page-item");
            removeActive = () => {
                commentRequest.forEach(element => {
                    element.classList.remove('active');
                })
            }
            commentRequest.forEach(element => {
                element.onclick = () => {
                    currentPage = element.innerText;
                    removeActive();
                    element.classList.add('active');
                    $.ajax({
                        url: "http://localhost/projectWebshop/product/commentData.php",
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


        });
    </script>
</body>

</html>