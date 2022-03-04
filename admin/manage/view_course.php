<?php
require "../check_admin/check_admin_1.php";
require "../../public/connect_sql.php";
if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = ' VND')
    {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}

$id_admin = $_SESSION['id'];
$id = addslashes($_GET['id']);

$sql = "SELECT course.*, lesson.*, admin.name_admin as author_post, admin.image FROM `course` 
                LEFT OUTER JOIN lesson ON course.id_course = lesson.id_course
                LEFT OUTER JOIN admin ON course.id_admin = admin.id_admin
                WHERE course.id_course = $id AND course.id_admin = '$id_admin'
                GROUP BY lesson.id_lesson";

if ($_SESSION['lever'] == 2){
    $sql = "SELECT course.*, lesson.*, admin.name_admin as author_post, admin.image FROM `course` 
                LEFT OUTER JOIN lesson ON course.id_course = lesson.id_course
                LEFT OUTER JOIN admin ON course.id_admin = admin.id_admin
                WHERE course.id_course = '$id'
                GROUP BY lesson.id_lesson";
}
        
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
    <title><?php if(isset($one_course['name_course'])){
        echo $one_course['name_course'];
    }else{
        echo "Lỗi không mong muôns";
    }  ?></title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/view_course.css">
</head>
<style>
    .home{
        padding: 10px;
    }
    body{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    header .formSearch{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
    }
    header .formSearch div input{
        border: none;
        outline: none;
        width: 365px;
        height: 40px;
        padding: 15px;
        font-size: 15px;
        margin-left: -13px;
    }
    header .formSearch i{
        color: black;
        font-size: 18px;
        margin-left: 20px;
        transform: translateY(3px);
    }
</style>
<body>

<div class="home">
<div id="body-click">

<?php require "../default/header_user.php" ?>

<!-- content -->

<div class=content>
    <a href="#" onclick="handler()">
        <h3>Bấm vào đây để quay lại</h3>
    </a>
    <?php if(!isset($one_course['id_admin'])){
        print "<h2>Khóa học này không tồn tại hoặc không phải của bạn<h2>";
        ?>
        <br><?php }else{?>
    <div class="function">
            <a class='btn' href="./view_lesson.php?idcourse=<?php echo $id?>">
                Vào học ngay
                <i class='bx bx-log-in-circle'></i>
            </a>
    </div>
    <br>
    <div class="avatar">
        <img src="../../public/images/<?php echo ($one_course['image']=="none")?"default/avata.png":"upload/".$one_course['image'] ?>" alt="">
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
    <img class="img-preview" src="../../public/images/upload/<?php echo $one_course['image_course'] ?>" alt="">
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
            <form id="rate-form">
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
                <textarea name="comment-rate" id="comment"></textarea>
                <br>
                <button type="button">Đánh giá</button>
                <br>
                <!-- <button>Đánh giá</button> -->
            </form>

    </div>

    <div class="all-rate">
        <h2>Tất cả đánh giá của mọi người</h2>
        <?php foreach ($all_comments as $comment) { ?>
            <div class="rate-one">
                <div class="avatar-rate">
                    <?php if ($comment['image_user'] == 'null') { ?>
                        <img src="../../public/images/default/avata.png" alt="">
                    <?php } else { ?>
                        <img src="../../public/images/upload/<?php echo $comment['image_user'] ?>" alt="">
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
</div><?php } ?>

</div>
</div>


<?php require "../default/footer_user.php" ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        // document.getElementById('body-click').addEventListener("click", handler, true);

    })
    function handler() {
            window.history.go(-1);
        }
</script>
</html>