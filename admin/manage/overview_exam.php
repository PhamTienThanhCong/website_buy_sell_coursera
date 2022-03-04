<?php
    require "../check_admin/check_admin_1.php";
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
        height: 60px;
    }
    ul {
        list-style-type: none;
    }
    .page{
        text-decoration: none;
        width: 34px;
        display: inline-block;
        color: black;
        padding: 8px 0;
        text-align: center;
        margin-right: 4px;
        border: 1px solid black;
    }
    .page-choice{
        border: 1px solid red;
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
                        Quản lý cho giáo viên<ul>
                        <?php
                        $result = mysqli_query($connection, "select count(*) as count from course where id_admin = '{$_SESSION["id"]}'");
                        $tongKhoaHoc = mysqli_fetch_array($result)["count"];
                        print("<li>Số khóa học đang sở hữu: " . $tongKhoaHoc ."</li>");
                        
                        $result = mysqli_query($connection, "select count(*) as count from course where status_course=1 and id_admin = '{$_SESSION["id"]}'");
                        $tongPheDuyet = mysqli_fetch_array($result)["count"];
                        print("<li>Số khóa học đã được phê duyệt của bạn: " . $tongPheDuyet."</li>");
                        
                        $tongDangCho = $tongKhoaHoc - $tongPheDuyet;
                        print("<li>Số khóa học đang chờ được phê duyệt của bạn: " . $tongDangCho ."</li>");

                        // $result = mysqli_query($connection, "select count(*) as count from update_course where status_lesson!=0 and id_admin = '{$_SESSION['id']}'");
                        // $choPheDuyet = mysqli_fetch_array($result)["count"];
                        // print("<li>Số tiết học đang chờ được phê duyệt của bạn: " . $choPheDuyet ."</li>");

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
                    $id = $_SESSION['id'];

                    $sql = "SELECT COUNT(*) as SoTrang FROM `course` WHERE `id_admin` = '$id'";

                    $SoTrang = mysqli_query($connection, $sql);
                    $SoTrang = mysqli_fetch_array($SoTrang);

                    $soLuongMotTrang = 5;
                    $trang = 0;
                    $check = false;

                    if (isset($_GET['page'])){
                        $trang = $_GET['page'];
                        $trang = $trang - 1;
                        if ($trang > $SoTrang['SoTrang']/$soLuongMotTrang){
                            $trang = 0;
                            $check = true;
                        }
                    }

                    $trangCanBo = $trang*$soLuongMotTrang;
                    
                    $sql = "SELECT course.*, COUNT(lesson.id_course) as number_course FROM `course` 
                                LEFT OUTER JOIN lesson ON course.id_course = lesson.id_course
                                WHERE course.id_admin = '$id' 
                                GROUP BY course.id_course
                                limit $soLuongMotTrang offset $trangCanBo;";
                    $courses = mysqli_query($connection, $sql);

                    ?>
                    <div style="overflow-y: scroll;">
                        <br>
                        <?php if($check == true) { ?>
                            <p>Số trang bạn yêu cầu không hợp lệ !</p>
                            <br>
                        <?php } ?>
                        <table style="overflow-y: scroll;">
                            <thead style="position: sticky; top: 0">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên khóa học</th>
                                    <th>Giá</th>
                                    <th>Số bài giảng</th>
                                    <th>Trạng thái</th>
                                    <th>Lượt mua</th>
                                    <th>Lợi nhuận</th>
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

                                        $luotMua = mysqli_fetch_array($result)["count"];

                                        print($luotMua);
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo currency_format($course['price']*$luotMua)?>
                                    </td>
                                <?php } ?>
                                <tr>
                        </table>
                        <br>
                        <?php for ($i = 0; $i < ceil($SoTrang['SoTrang']/$soLuongMotTrang); $i++ ){ ?>
                            <?php if ($i == $trang) { ?>
                                <a class = "page page-choice" href="?page=<?php echo $i+1 ?>#list"><?php echo $i+1?></a>
                            <?php } else { ?>
                                <a class = "page" href="?page=<?php echo $i+1 ?>#list"><?php echo $i+1?></a>
                            <?php } ?>
                        <?php } ?>
                        <br>
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