<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/index.css">
    <title>Trang chủ</title>
</head>

<body>
    <?php
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = ' VND')
        {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
    require "./public/connect_sql.php";
    $sql = "SELECT course.*, COUNT(lesson.id_course) as number_course, admin.name_admin as author FROM `course` 
                LEFT OUTER JOIN lesson ON course.id_course = lesson.id_course
                LEFT OUTER JOIN admin ON course.id_admin = admin.id_admin
                GROUP BY course.id_course";
    $all_courses = mysqli_query($connection, $sql);

    ?>
    <?php require "./default/header.php" ?>
    <div class=content>
        <?php require "./default/slide.php" ?>

        <div class="all-course">
            <h2 style="width: 100%">Tất cả khóa học</h2>
            <?php foreach ($all_courses as $course) { ?>
                <div class="card">
                    <a href="./view_course.php?id=<?php echo $course['id_course'] ?>">
                        <div class="img-preview">
                            <img src="./public/images/upload/<?php echo $course['image_course'] ?>" alt="Avatar" style="width:100%">
                        </div>
                    </a>
                    <div class="container-card">
                        <br>
                        <a href="./view_course.php?id=<?php echo $course['id_course'] ?>">
                            <h3><b><?php echo $course['name_course'] ?></b></h3>
                        </a>
                        <p>
                            <i class='bx bxs-videos'></i>
                            Tổng số bài học:
                            <?php echo $course['number_course'] ?>
                        </p>
                        <p>
                            <i class='bx bxs-user'></i>
                            Tác giả:
                            <?php echo $course['author'] ?>
                        </p>
                        <p>
                            <i class='bx bxs-credit-card'></i>
                            Giá:
                            <?php echo currency_format($course['price']) ?>
                        </p>
                        <br>
                        <a class='btn' href="./my_cart.php">
                            <i class='bx bxs-credit-card'></i>
                            Mua ngay
                        </a>
                        <a class='btn' style="margin-left: 100px" href="">
                            <i class='bx bxs-cart-add'></i>
                            Mua sau
                        </a>
                    </div>
                </div>
            <?php } ?>
            <div class="clear"></div>
        </div>
    </div>
    <div class="tab-right"></div>
    </div>
    <footer>

    </footer>
    <!-- <script type="text/javascript" src="./script/index.js"></script> -->
</body>

</html>