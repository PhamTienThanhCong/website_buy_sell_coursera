<?php
session_start();
if (isset($_SESSION['lever']) == false) {
    echo
    header('Location: ../login.php');
}
require "../../public/connect_sql.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tổng quan</title>
    <!-- Css default -->
    <link rel="stylesheet" href="../default/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- Css default -->
</head>
<style>
    /* Phần in đậm của option */
    #course-overview {
        background: #081D45;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        background: azure;
        text-align: left;
        padding: 8px;
    }

    /* Phần in đậm của option */
</style>

<body>
    <!-- Kết nối tới option (dịch trái) -->
    <?php
    require "../default/option.php"
    ?>
    <!-- Kết nối tới option -->

    <!-- hàm section chính (dịch phải)-->
    <section class="home-section">
        <!-- Kết nối tới user và thanh tìm kiếm (header) -->
        <?php
        require "../default/user.php"
        ?>
        <!-- Kết nối tới user và thanh tìm kiếm (header) -->

        <!-- Phần content chính -->
        <div class="home-content">
            <!-- đây là 1 khối nội dung -->
            <div class="sales-boxes">
                <div class="recent-sales box">

                    <!-- Thẻ tên title -->
                    <div class="title">Tổng quan</div>
                    <!-- Thẻ tên title -->


                    <p>

                        <?php
                        if ($_SESSION["lever"] == 2) {
                            print("Quản lý tổng quan admin<ul>");
                            $result = mysqli_query($connection, "select count(*) as count from course");
                            print("<li>Số khóa học hiện có: " . mysqli_fetch_array($result)["count"]."</li>");
                            
                            $result = mysqli_query($connection, "select count(*) as count from course where status_course=0");
                            print("<li>Số khóa học đang chờ phê duyệt: " . mysqli_fetch_array($result)["count"]."</li>");
                            
                            $result = mysqli_query($connection, "select count(*) as count from user");
                            print("<li>Số học sinh: " . mysqli_fetch_array($result)["count"]."</li>");
                            
                            $result = mysqli_query($connection, "select count(*) as count from admin");
                            print("<li>Số giáo viên hiện tại: " . mysqli_fetch_array($result)["count"]."</li>");
                            
                            $result = mysqli_query($connection, "select count(*) as count from admin");
                            print("<li>Số giáo viên chờ phê duyệt: " . mysqli_fetch_array($result)["count"]."</li></ul>");
                            
                        }
                        ?>
                    </p>
                    <p>
                        Quản lý cho giáo viên<ul>
                        <?php
                        $result = mysqli_query($connection, "select count(*) as count from course where id_admin = '{$_SESSION["id"]}'");
                        print("<li>Số khóa học đang sở hữu: " . mysqli_fetch_array($result)["count"]."</li>");
                        
                        $result = mysqli_query($connection, "select count(*) as count from course where status_course=1 and id_admin = '{$_SESSION["id"]}'");
                        print("<li>Số khóa học đã được phê duyệt của bạn: " . mysqli_fetch_array($result)["count"]."</li>");
                        
                        $sql = "select count(*) as count from oder where id_course in (select id_course from course where status_course=1 and id_admin = '{$_SESSION["id"]}')";
                        $result = mysqli_query($connection, $sql);
                        print("<li>Số lượt mua của bạn: " . mysqli_fetch_array($result)["count"]."</li></ul>");
                        
                        ?>
                    </p>
                </div>
            </div>


            <div class="sales-boxes"  style="margin-top: 26px">            
                <div class="recent-sales box">
                    <div class="title">List khóa học</div>
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
                    <div style="height: 90%;overflow-y: scroll;">
                        <table style="overflow-y: scroll; height: 50vh;">
                            <thead style="position: sticky; top: 0">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên khóa học</th>
                                    <th>Giá</th>
                                    <th>Số lượng bài giảng</th>
                                    <th>Trạng thái</th>
                                    <th>Số lượt mua</th>
                                </tr>
                            </thead>
                            <?php foreach ($courses

                                as $index => $course) { ?>
                                <tr>
                                    <td>
                                        <?php echo $index + 1; ?>
                                    </td>
                                    <td>
                                        <?php echo $course['name_course'] ?>
                                    </td>
                                    <td>
                                        <?php echo currency_format($course['price']) ?>
                                    </td>
                                    <td>
                                        <?php echo $course['number_course'] ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($course['status_course'] == 0) {
                                            echo "Chờ xác nhận";
                                        } else {
                                            echo "Đã xác nhận";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $sql = "select count(*) as count from oder where id_course = '{$course['id_course']}'";
                                        $result = mysqli_query($connection, $sql);
                                        print(mysqli_fetch_array($result)["count"]);
                                        ?>
                                    </td>
                                <?php } ?>
                                <tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- đây là 1 khối nội dung -->
            <?php require "../default/footer.php" ?>
        </div>
        <!-- Phần content chính -->
        
    </section>

</body>
<!-- javaScript Chung :3 -->
<script type="text/javascript" src="./script/js_chung.js"></script>
<!-- javaScript Chung :3 -->

</html>