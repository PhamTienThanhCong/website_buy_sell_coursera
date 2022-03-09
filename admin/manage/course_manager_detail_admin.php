<?php
require "../check_admin/check_admin_pro_1.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../default/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="./css/course_manager_detail.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
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

    </style>
</head>

<body>
<?php
require "../default/option.php"
?>
<section class="home-section">
    <?php
    require "../default/user.php";
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
    $id_course = $_GET['id'];
    $sql = "SELECT course.*, COUNT(lesson.id_course) as number_course FROM `course` 
                LEFT OUTER JOIN lesson ON course.id_course = lesson.id_course
                WHERE (course.id_course = '$id_course')
                GROUP BY course.id_course";
    $courses = mysqli_query($connection, $sql);
    $courses = mysqli_fetch_array($courses);
    ?>
    <!-- chỉnh sửa khóa học -->
    <div class="home-content">
        <div class="sales-boxes">
            <div class="recent-sales box">
                <div class="title">Chi tiết khóa học</div>
                <div class="content">
                    <?php if ($_SESSION['lever'] != 2) {
                        print"Bạn không có quyền xem trang này";
                    } else { ?>
                    <br>
                    <h2 style="color:red">Bấm vào ảnh để xem dưới dạng người dùng</h2>
                    <div class=preview-couse>
                        <br><br>
                        <div class="cart-pre">
                            <div class="img-pre">
                                <a href="view_course.php?id=<?php echo $courses['id_course'] ?>">
                                    <img id="img-preview"
                                         src="../../public/images/upload/<?php echo $courses['image_course'] ?>" alt="">
                                </a>
                            </div>

                            <br>

                            <div class="cart-details">
                                <h2 id="title-course"><?php echo $courses['name_course'] ?></h2>
                                <p id="number-course">
                                    <i class='bx bxs-videos'></i>
                                    Số lượng bài học: <?php echo $courses['number_course'] ?>
                                </p>

                                <p id="author-course">
                                    <i class='bx bxs-user'></i>
                                    Diễn giả:
                                    <?php echo $courses['author'] ?>
                                </p>

                                <p id="price-course">
                                    <i class='bx bxs-credit-card'></i>
                                    Giá thành: <?php echo currency_format($courses['price']) ?>
                                </p>
                                <?php if ($courses['status_course'] == 0) { ?>
                                    <button id="btn-lesson">Xác nhận lưu hành khóa học</button>
                                    <button id="btn">Xác nhận xóa</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <a id="btnlesson" href="./course_manager_admin.php">quay lại <<<</a>
            </div>
        </div>
        <!-- chỉnh sửa khóa học -->

        <!-- tất cả các bài học -->
        <?php
        $so_luong_bai_1_trang = 5;
        $so_luong_trang = ceil($courses['number_course'] / $so_luong_bai_1_trang);
        $trang = 1;
        if (isset($_GET['index'])) {
            $trang = $_GET['index'];
        }
        $so_luong_trang_can_bo = ($trang - 1) * $so_luong_bai_1_trang;

        $sql = "SELECT * FROM lesson WHERE id_course = '$id_course' ORDER BY id_lesson 
                limit $so_luong_bai_1_trang offset $so_luong_trang_can_bo";
        $lesson = mysqli_query($connection, $sql);
        ?>

        <div class="sales-boxes" style="margin-top: 26px">
            <div class="recent-sales box">
                <div class="title" style="text-align: center">Tất cả các bài học</div>
                <br>
                <div class="title"><?php echo $courses['name_course'] ?>:</div>
                <br>
                <a href="view_course.php?id=<?php echo $courses['id_course'] ?>">
                    <h3>Xem với tư cách người dùng </h3>
                </a>
                <br>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Tên bài học</th>
                        <th>Link bài học</th>
                        <th>Mô tả</th>
                    </tr>
                    <?php foreach ($lesson as $index => $ls) { ?>
                        <tr>
                            <th>
                                <?php echo 1 + $index ?>
                            </th>
                            <th>
                                <?php echo $ls['name_lesson'] ?>
                            </th>
                            <th id="video<?php echo $index + 1 ?>">
                                <a class="button-show-video btn-show-video"
                                   onclick="showVideo('<?php echo $ls['link'] ?>','<?php echo $ls['type_link'] ?>','<?php echo $index + 1 ?>')">Xem
                                    ở đây</a>
                                <br>
                                <br>
                                <a class="button-show-video btn-show-video"
                                   onclick="showVideo('<?php echo $ls['link'] ?>','<?php echo $ls['type_link'] ?>','0')">Xem
                                    ở tab mới</a>
                            </th>
                            <th>
                                <?php if ($ls['description_lesson'] != "") {
                                    if (strlen($ls['description_lesson']) > 100) {
                                        echo substr(nl2br($ls['description_lesson']), 0, 100) . '...';
                                    } else {
                                        echo nl2br($ls['description_lesson']);
                                    }

                                } else {
                                    echo "không";
                                } ?>
                            </th>
                        </tr>
                    <?php } ?>
                </table>
                <br>
                <div>
                    <p>Trang <?php echo $trang ?></p>
                    <?php for ($i = 1; $i <= $so_luong_trang; $i++) { ?>
                        <?php if ($i == $trang) { ?>
                            <a class="page" style="border: 1px solid #0a2558;"
                               href="./course_manager_detail_admin.php?id=<?php echo $courses['id_course'] ?>&index=<?php echo $i ?>#btnlesson"><?php echo $i ?></a>
                        <?php } else { ?>
                            <a class="page"
                               href="./course_manager_detail_admin.php?id=<?php echo $courses['id_course'] ?>&index=<?php echo $i ?>#btnlesson"><?php echo $i ?></a>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- tất cả các bài học -->

        <!-- Sửa bài học -->
        <div class="sales-boxes" style="margin-top: 26px">
            <div class="recent-sales box">
                <div class="title" style="text-align: center">Các bài học chờ duyệt</div>
                <br>
                <?php
                $sql = "SELECT * FROM update_course WHERE id_course = '$id_course' ORDER BY id_lesson";
                $lesson = mysqli_query($connection, $sql);
                ?>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Tên bài học</th>
                        <th>Link bài học</th>
                        <th>Mô tả</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    <?php foreach ($lesson as $index => $ls) { ?>
                        <tr>
                            <th>
                                <?php echo 1 + $index ?>
                            </th>
                            <th>
                                <?php echo $ls['name_lesson'] ?>
                            </th>
                            <th id="video<?php echo $index + 100 ?>">
                                <a class="button-show-video btn-show-video"
                                   onclick="showVideo('<?php echo $ls['link'] ?>','<?php echo $ls['type_link'] ?>','<?php echo $index + 100 ?>')">Xem
                                    ở đây</a>
                                <br>
                                <br>
                                <a class="button-show-video btn-show-video"
                                   onclick="showVideo('<?php echo $ls['link'] ?>','<?php echo $ls['type_link'] ?>','0')">Xem
                                    ở tab mới</a>
                            </th>
                            <th>
                                <?php echo nl2br($ls['description_lesson']);?>
                            </th>
                            <th>
                                <?php if ($ls['action'] == 1) {
                                    print("Sửa đổi");
                                } else if ($ls['action'] == -1) {
                                    print("Xoá bỏ");
                                } else if ($ls['action'] == 2) {
                                    print("Thêm mới");
                                }
                                ?>
                            </th>
                            <th>
                                
                                <button class="btn-comfirm btn-update" value="<?php echo $ls['id_lesson_update']?>">Cập nhập</button>
                                <br>
                                <button class="btn-comfirm btn-delete" value="<?php echo $ls['id_lesson_update']?>" style="background-color: #cc0000">Xóa</button>
                            
                            </th>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <?php require "../default/footer.php" ?>
    </div>
</section>
    <!-- Sửa bài học -->
<?php } ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript" src="./script/course_manager_detail_admin.js"></script>
</body>

</html>