<?php
session_start();
if (isset($_SESSION['lever'])) {
    session_destroy();
}
require "./public/connect_sql.php";
if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = ' VND')
    {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}

$id = addslashes($_GET['id']);

if (isset($_SESSION['id'])) {
    $id_user = $_SESSION['id'];
    $sql = "SELECT * FROM `oder` WHERE `id_course` = '$id' AND `id_user` = '$id_user'";

    $check_by = mysqli_query($connection, $sql);
    $check_by = mysqli_fetch_array($check_by);
}

$sql = "SELECT course.*, lesson.*, admin.name_admin as author_post, admin.image FROM `course` 
                LEFT OUTER JOIN lesson ON course.id_course = lesson.id_course
                LEFT OUTER JOIN admin ON course.id_admin = admin.id_admin
                WHERE course.id_course = $id
                GROUP BY lesson.id_lesson";
$course = mysqli_query($connection, $sql);
$one_course = mysqli_fetch_array($course);

$sql = "SELECT
                AVG(rate) as rate
            FROM
                `oder`
            WHERE
                (id_course = '$id') AND (oder.rate != '0')";

$rate = mysqli_query($connection, $sql);
$rate = mysqli_fetch_array($rate);

$sql = "SELECT
                oder.rate,
                oder.comment,
                user.name_user,
                user.image_user
            FROM
                `oder`
            LEFT OUTER JOIN user ON user.id_user = oder.id_user
            WHERE
                (id_course = '$id') AND (oder.rate != '0')
            ORDER BY
                id_order DESC";

$all_comments = mysqli_query($connection, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $one_course['name_course'] ?></title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/view_course.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<style>
.content{
    padding-right: 15px;
}
body{
    margin: 0;
}
</style>
<body>
<input id="alert-rate" type="hidden" value="<?php 
    if (isset($_SESSION['alert'])){ 
        echo $_SESSION['alert']; 
        unset($_SESSION['alert']);
    } else {
        echo 2;
    }
    ?>">
<?php require "./default/header.php" ?>
<!-- content -->

<div class=content>
    <a href="./index.php"><<< Quay lại</a>
    <?php if ($one_course["status_course"] == 0){
        print("Khóa học chưa được chấp thuận");
        die();}
    ?>
    <div class="function">
        <?php if (isset($check_by['id_course'])) { ?>
            <a class='btn' href="./my_course_view_lesson.php?idcourse=<?php echo $check_by['id_course'] ?>">
                Vào học ngay
                <i class='bx bx-log-in-circle'></i>
            </a>
        <?php } else { ?>
            <?php if (isset($_SESSION['cart'][$id]['name'])) { ?>
                <a class='btn' href="./my_cart.php">
                    <i class='bx bxs-credit-card'></i>
                    Thanh toán ngay
                </a>
            <?php } else { ?>
                <a class='btn btn-add-to-cart' style="cursor: pointer"
                   data-id='<?php echo $one_course['id_course']; ?>'>
                    <i class='bx bxs-cart-add'></i>
                    Thêm vào giỏ hàng
                </a>
            <?php } ?>
        <?php } ?>
    </div>
    <br>
    <div class="avatar">
        <img src="./public/images/<?php echo ($one_course['image']=="none")?"default/avata.png":"upload/".$one_course['image'] ?>" alt="">
    </div>
    <h2 class="title-course"><?php echo $one_course['name_course'] ?></h2>
    <br>
    <br>
    <p class="title">* Chi Tiết khóa học: </p>
    <p>- Tác giả: <?php echo $one_course['author'] ?></p>
    <p>- Người đăng: <?php echo $one_course['author_post'] ?></p>
    <p>- Giá thành: <?php echo currency_format($one_course['price']) ?></p>
    <p>- Ngày xuất bản:
        <?php
        echo date("d/m/Y", strtotime($one_course['created_at']));
        ?>
    </p>
    <p id="rate-over" data-rate="4.5">
        - Đánh giá:
        <?php echo number_format((float)$rate['rate'], 1, '.', '') ?>
        <i class='start-icon bx bxs-star'></i>
        trên 5
        <i class='start-icon bx bxs-star'></i>
    </p>
    <img class="img-preview" src="./public/images/upload/<?php echo $one_course['image_course'] ?>" alt="">
    <p class="title">* Mô tả sản phẩm:</p>
    <p><?php echo nl2br($one_course['description_course']) ?></p>
    <p class="title">* Các Bài học trong khóa học</p>
    <br>
    <table>
        <tr>
            <th>STT</th>
            <th>Tên bài học</th>
        </tr>
        <?php foreach ($course as $index => $lesson) { ?>
            <tr>
                <th><?php echo $index + 1; ?></th>
                <th><?php echo $lesson['name_lesson']; ?></th>
            </tr>
        <?php } ?>
        <tr>
            <th>...</th>
            <th>Đang cập nhập mỗi ngày</th>
        </tr>
    </table>
    <div class="rate-overview" data-rate="<?php echo $check_by['rate'] ?>">
        <h2>Đánh giá sản phẩm</h2>
        <?php if (isset($check_by['rate'])) { ?>
            <form id="rate-form" method="post" action="./processing/rating_update.php">
                <div id="rating">
                    <input type="hidden" name="id_course" value="<?php echo $id ?>"/>
                    <input type="radio" id="star5" name="rating" value="5"/>
                    <label class="full" for="star5" title="Awesome - 5 stars"></label>

                    <input type="radio" id="star4" name="rating" value="4"/>
                    <label class="full" for="star4" title="Pretty good - 4 stars"></label>

                    <input type="radio" id="star3" name="rating" value="3"/>
                    <label class="full" for="star3" title="Meh - 3 stars"></label>

                    <input type="radio" id="star2" name="rating" value="2"/>
                    <label class="full" for="star2" title="Kinda bad - 2 stars"></label>

                    <input type="radio" id="star1" name="rating" value="1"/>
                    <label class="full" for="star1" title="Sucks big time - 1 star"></label>
                    <br>
                    <br>
                    <br>
                    <div class="title-comment">Bình luận:</div>
                </div>
                <textarea name="comment-rate" id="comment"><?php echo $check_by['comment'] ?></textarea>
                <br>
                <button>Đánh giá</button>
                <br>
                <!-- <button>Đánh giá</button> -->
            </form>
        <?php } else { ?>
            <br>
            <br>
            <br>
            <br>
            <h3 style="text-align: center;">
                <?php if (!isset($_SESSION['id'])) { ?>
                    Bạn phải đăng nhập và mua hàng để dánh giá
                    <br>
                    <a href="./login_and_register.php">Đăng nhập ngay</a>
                <?php } elseif (!isset($check_by['rate'])) { ?>
                    Bạn phải mua hàng để đánh giá
                <?php } ?>
            </h3>
        <?php } ?>
    </div>

    <div class="all-rate">
        <h2>Tất cả đánh giá của mọi người</h2>
        <?php foreach ($all_comments as $comment) { ?>
            <div class="rate-one">
                <div class="avatar-rate">
                    <?php if ($comment['image_user'] == 'null') { ?>
                        <img src="./public/images/default/avata.png" alt="">
                    <?php } else { ?>
                        <img src="./public/images/upload/<?php echo $comment['image_user'] ?>" alt="">
                    <?php } ?>
                </div>
                <div class="in4-rate">
                    <h3 class="name-rate">
                        <?php echo $comment['name_user'] ?>
                    </h3>
                    <p>
                        <?php echo $comment['rate'] ?>
                        <i class='start-icon bx bxs-star'></i>
                    </p>
                </div>
                <br>
                <p>
                    <?php echo nl2br($comment['comment']) ?>
                </p>
            </div>
        <?php } ?>
    </div>
</div>
<div class="tab-right"></div>
</div>
<?php include "./default/footer.php" ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        $("#btn-logout").click(function () {
            $.ajax({
                type: "GET",
                url: "./processing/logout.php",
                // data: {id},
                // dataType: "dataType",
                success: function (response) {
                }
            });
            document.getElementById("click_home").click()
        })
        if ($("#alert-rate").val() == "1"){
            toastr["success"]("Đánh giá thành công");
        }else if($("#alert-rate").val() == "0"){
            toastr["error"]("Không thể đánh giá ngoài 1-5", "Cảnh cáo");
        }
        $(".btn-add-to-cart").click(function () {
            let id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "./processing/my_cart.php",
                data: {id},
                // dataType: "dataType",
                success: function (response) {
                    if (response == '1'){
                        $('.btn-add-to-cart').html(`<a class='btn' href="./my_cart.php">  
                            <i class='bx bxs-credit-card'></i>
                            Thanh toán ngay
                        </a>`);
                        toastr["success"]("Đặt hàng thành công");
                    }else{
                        toastr["error"]("Đặt hàng thất bại", "Lỗi")
                    }
                }
            });
            
        })
        var rate = $('.rate-overview').data('rate');
        var id_rate = '#star' + rate + '';
        $(id_rate).attr('checked', true);
    })
</script>
</body>
</html>