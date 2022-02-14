<?php
    require "../check_admin/check_admin_1.php";
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

    #course-manager {
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
                        <div class="title">Quản lý khóa học</div>
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

                            require "../../public/connect_sql.php";
                            $id = $_SESSION['id'];
                            $sql = "SELECT course.*, COUNT(lesson.id_course) as number_course FROM `course` 
                                LEFT OUTER JOIN lesson ON course.id_course = lesson.id_course
                                WHERE course.id_admin = '$id' 
                                GROUP BY course.id_course";
                            $courses = mysqli_query($connection, $sql);
                            ?>

                            <table>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên khóa học</th>
                                    <th>Giá</th>
                                    <th>Số lượng bài giảng</th>
                                    <th>Trạng thái</th>
                                    <th>Chỉnh sửa</th>
                                    <th>Xem chi tiết</th>
                                </tr>
                                <?php foreach ($courses as $index => $course) { ?>
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
                                            <?php
                                            if ($course['status_course'] == 0) {
                                                echo "Chờ xác nhận";
                                            } else {
                                                echo "Đã xác nhận";
                                            }
                                            ?>
                                        </th>
                                        <th>
                                            <a href="./course_add_detail.php?id=<?php echo $course['id_course'] ?>">Chỉnh Sửa</a>
                                        </th>
                                        <th>
                                            <a href="./view_course.php?id=<?php echo $course['id_course'] ?>">Xem</a>
                                        </th>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
                <?php require "../default/footer.php" ?>
            </div>

    </section>
    <script type="text/javascript" src="./script/js_chung.js"></script>
    <script type="text/javascript" src="./script/course_manager.js"></script>

</body>

</html>