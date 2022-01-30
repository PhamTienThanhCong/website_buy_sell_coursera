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
    <title>example</title>
    <!-- Css default -->
    <link rel="stylesheet" href="../default/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/cs0s/boxicons.min.css' rel='stylesheet'>
    <!-- Css default -->
</head>
<style>
    /* Phần in đậm của option */
    #course-overview {
        background: #081D45;
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
                        $result = mysqli_query($connection, "select count(*) as count from course");
                        print("Số khóa học hiện có: " . mysqli_fetch_array($result)["count"]);
                        print("<br>");
                    }
                    $result=mysqli_query($connection,"select count(*) as count from course where id_admin = '{$_SESSION["id"]}'");
                    print("Số khóa học đang sở hữu: " . mysqli_fetch_array($result)["count"]);
                    print("<br>");
                    if ($_SESSION["lever"] == 2) {
                        $result = mysqli_query($connection, "select count(*) as count from course where status_course=0");
                        print("Số khóa học đang chờ phê duyệt: " . mysqli_fetch_array($result)["count"]);
                        print("<br>");
                    }
                    $result = mysqli_query($connection, "select count(*) as count from course where status_course=1 and id_admin = '{$_SESSION["id"]}'");
                    print("Số khóa học đã được phê duyệt của bạn: " . mysqli_fetch_array($result)["count"]);
                    print("<br>");
                ?>
                </p>
                <!-- Code here -->
                <br>

                <br><br>
                <p>Sửa xong đi cho kẹo =))</p>
                <!-- Code here -->

            </div>
        </div>
        <!-- đây là 1 khối nội dung -->

        <!-- Phần chân trang -->
        <?php require "../default/footer.php" ?>
        <!-- Phần chân trang -->

    </div>
    <!-- Phần content chính -->

</section>
<!-- hàm section chính -->
</body>
<!-- javaScript Chung :3 -->
<script type="text/javascript" src="./script/js_chung.js"></script>
<!-- javaScript Chung :3 -->
</html>