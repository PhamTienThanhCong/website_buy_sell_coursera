<?php
require "../check_admin/check_admin_pro_1.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../default/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    table,
    td,
    th {
        border: 1px solid #ddd;
        text-align: left;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        padding: 15px;
        font-weight: normal;
        text-align: center;
    }

    .btn-comfirm {
        text-decoration: none;
        color: white;
        display: inline-block;
        padding: 10px 20px;
        background-color: blue;
        border-radius: 10px;
        transition: all 0.5s;
    }

    .btn-comfirm:hover {
        transform: scale(0.95);
    }

    #course-manager-admin {
        background: #081D45;
    }
</style>

<body>
    <?php
    require "../default/option.php"
    ?>
    <section class="home-section">
        <?php
        require "../default/user.php"
        ?>
        <div class="home-content">
            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Quản lý khóa học chung</div>
                    <br><br>
                    <div class="sales-details">
                        <?php

                        if (!function_exists('currency_format')) {
                            function currency_format($number, $suffix = ' VND')
                            {
                                if (!empty($number)) {
                                    return number_format($number, 0, ',', '.') . "{$suffix}";
                                }
                            }
                        }
                        if ($_SESSION['lever'] != 2) {
                            print "Bạn không có quyền xem trang này";
                        } else {
                            require "../../public/connect_sql.php";
                            $id = $_SESSION['id'];
                            $sql = "SELECT course.*, COUNT(lesson.id_course) as number_course FROM `course` 
                                LEFT OUTER JOIN lesson ON course.id_course = lesson.id_course
                                WHERE `status_course` = '0'
                                GROUP BY course.id_course";
                            $courses1 = mysqli_query($connection, $sql);


                            $sql = "SELECT course.*, COUNT(lesson.id_course) as number_course FROM `course` 
                                LEFT OUTER JOIN lesson ON course.id_course = lesson.id_course
                                WHERE `status_course` = '1'
                                GROUP BY course.id_course";
                            $courses2 = mysqli_query($connection, $sql);

                        ?>

                            <table>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên khóa học</th>
                                    <th>Giá</th>
                                    <th>Số lượng bài giảng</th>
                                    <th>Trạng thái</th>
                                    <th>Xem chi tiết</th>
                                    <th>Chỉnh sửa</th>
                                </tr>
                                <?php foreach ($courses1 as $index => $course) { ?>
                                    <tr>
                                        <th>
                                            <?php echo $index + 1; ?>
                                        </th>
                                        <th>
                                            <?php echo $course['name_course'] ?>
                                        </th>
                                        <th>
                                            <?php echo currency_format($course['price']) ?>
                                        </th>
                                        <th>
                                            <?php echo $course['number_course'] ?>
                                        </th>
                                        <th>Chờ xác nhận</th>
                                        <th>
                                            <a href="./course_manager_detail_admin.php?id=<?php echo $course['id_course'] ?>">Xem</a>
                                        </th>
                                        <th>
                                            <a class="btn-comfirm" href="./processing/course_admin_accept.php?id=<?php echo $course['id_course'] ?>&type=accept">Xác
                                                nhận</a>

                                            <a class="btn-comfirm" href="./processing/course_admin_accept.php?id=<?php echo $course['id_course'] ?>&type=delete" style="background-color: #cc0000">Xóa</a>
                                        </th>
                                    </tr>
                                <?php } ?>
                            </table>
                    </div>
                </div>
            </div>

            <?php
                $sql = "SELECT
                        course.*,
                        COUNT(update_course.id_course) AS number_course
                    FROM
                        `course`
                    LEFT OUTER JOIN update_course ON course.id_course = update_course.id_course
                    WHERE 
                        update_course.id_lesson_update > 0
                    GROUP BY
                        course.id_course";
                $courses3 = mysqli_query($connection, $sql);
            ?>

            <div class="sales-boxes" style="margin-top: 26px">
                <div class="recent-sales box">
                    <div class="title">Khóa học cần cập nhập</div>
                    <br><br>
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Tên khóa học</th>
                            <th>Tác giả</th>
                            <th>Số lượng</th>
                            <th>Xem chi tiết</th>
                        </tr>
                        <?php foreach ($courses3 as $index => $course) { ?>
                            <tr>
                                <th>
                                    <?php echo $index+1 ?>
                                </th>
                                <th>
                                    <?php echo $course['name_course'] ?>
                                </th>
                                <th>
                                    <?php echo $course['author'] ?>
                                </th>
                                <th>
                                    <?php echo $course['number_course'] ?>
                                </th>
                                <th>
                                    <a href="./course_manager_detail_admin.php?id=<?php echo $course['id_course'] ?>">
                                        Xem
                                    </a>
                                </th>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

            <div class="sales-boxes" style="margin-top: 26px">
                <div class="recent-sales box">
                    <div class="title">Khóa học đã xác nhận</div>
                    <br><br>
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Tên khóa học</th>
                            <th>Giá</th>
                            <th>Số lượng bài giảng</th>
                            <th>Trạng thái</th>
                            <th>Xem bài học</th>
                            <th>Xem chi tiết</th>
                        </tr>
                        <?php foreach ($courses2 as $index => $course) { ?>
                            <tr>
                                <th>
                                    <?php echo $index + 1; ?>
                                </th>
                                <th>
                                    <?php echo $course['name_course'] ?>
                                </th>
                                <th>
                                    <?php echo currency_format($course['price']) ?>
                                </th>
                                <th>
                                    <?php echo $course['number_course'] ?>
                                </th>
                                <th>

                                    <a class="btn-comfirm" href="./processing/course_admin_accept.php?id=<?php echo $course['id_course'] ?>&type=unaccepted">Hủy
                                        Xác nhận</a>

                                </th>
                                <th>
                                    <a href="./view_course.php?id=<?php echo $course['id_course'] ?>">Xem</a>
                                </th>
                                <th>
                                    <a href="./course_manager_detail_admin.php?id=<?php echo $course['id_course'] ?>">Xem </a>
                                </th>

                            </tr>
                        <?php } ?>
                    </table>
                <?php } ?>
                </div>
            </div>
            <?php require "../default/footer.php" ?>
        </div>

    </section>

    <script type="text/javascript" src="./script/js_chung.js"></script>
    <script type="text/javascript" src="./script/course_manager.js"></script>

</body>

</html>