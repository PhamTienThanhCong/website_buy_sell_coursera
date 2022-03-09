<?php
require "../check_admin/check_admin_1.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../default/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="./css/course_add_detail.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                WHERE (course.id_admin = '$id') and (course.id_course = '$id_course')
                GROUP BY course.id_course";
    $courses = mysqli_query($connection, $sql);
    $courses = mysqli_fetch_array($courses);

    ?>
    <!-- chỉnh sửa khóa học -->
    <div class="home-content">
        <div class="sales-boxes">
            <div class="recent-sales box">
                <div class="title">Chỉnh sửa khóa học</div>
                <br><?php if (!isset($courses['id_course'])) {
                    print "Khóa học này không tồn tại hoặc không phải của bạn";
                    exit(); ?>
                    <br><?php } ?>
                <div class="content">
                    <form id="form-course" class=new-couse method="post" action="./processing/course_edit.php"
                          enctype="multipart/form-data">
                        <input type="hidden" name="id_course" value="<?php echo $id_course ?>" readonly>
                        <label for="">Tên</label>
                        <input name="name_course" type="text" placeholder="Nhập tên của khóa học"
                               onchange="changeTitle(event)" value="<?php echo $courses['name_course'] ?>" readonly>
                        <br>
                        <label for="">Giá</label>
                        <input name="price" type="number" placeholder="Nhập giá của khóa học"
                               onchange="ChangePrice(event)" value="<?php echo $courses['price'] ?>" readonly>
                        <br>
                        <label for="">Tác giả</label>
                        <input name="author" type="text" placeholder="Nhập tên của tác giả "
                               onchange="ChangeAuthor(event)" value="<?php echo $courses['author'] ?>" readonly>
                        <br>
                        <label for="">Ảnh</label>
                        <input name="image_course" type="file_demo" style="border:none" onchange="loadFile(event)"
                               readonly>
                        <br>
                        <label for="">Mô tả</label>
                        <br>
                        <textarea name="description_course" id=""
                                  readonly><?php echo $courses['description_course'] ?>"</textarea>
                        <br>
                        <button id="btn" type="button" onclick="edit_course()">Chỉnh sửa khóa học</button>
                    </form>
                    <div class=preview-couse>
                        <div class="title">Xem trước khóa học</div>
                        <br><br>
                        <div class="cart-pre">
                            <div class="img-pre">
                                <img id="img-preview"
                                     src="../../public/images/upload/<?php echo $courses['image_course'] ?>" alt="">
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
                                    Tác giả:
                                    <?php echo $courses['author'] ?>
                                </p>

                                <p id="price-course">
                                    <i class='bx bxs-credit-card'></i>
                                    Giá thành: <?php echo currency_format($courses['price']) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- chỉnh sửa khóa học -->

        <!-- Thêm các bài học -->
        <div class="sales-boxes" style="margin-top: 26px">
            <div class="recent-sales box">
                <div class="title" style="text-align: center">Thêm các bài học</div>
                <div id="test-get" class="add-course">
                    <h3 style="font-weight: normal">
                        <i class='bx bx-book-add'></i>
                        Thêm bài học mới
                    </h3>
                    <br>
                    <form id="form-add-lesson" method='post' action='./processing/course_add_lesson.php'>
                        <input type="hidden" name="id_course" value="<?php echo $id_course ?>" required>
                        <!-- <label class="lable-input" for="">Lưu tạm:</label>
                        <input type="checkbox" name="type" checked> -->
                        <label class="lable-input" for="">Tên bài học:</label>
                        <input type="text" name="name_lesson" required>
                        <br>
                        <label class="lable-input" for="">Link bài học:</label>
                        <input type="text" id="link_video" required onchange="changeSortLink()">
                        <input type="hidden" id="link_video_sort" name="link" required>
                        <label class="lable-input" for="">Thể loại:</label>
                        <select id="type-link" name="type_link" onchange="changeTypeLink()">
                            <option value="1">Link video youtube</option>
                            <option value="2">link video drive</option>
                            <option value="3">link video khác</option>
                        </select>
                        <br>
                        <label class="lable-input" for="">Mô tả về bài học:</label>
                        <textarea class="textarea-lesson" name="description_lesson"></textarea>
                        <button id="btn-lesson" onclick="">Thêm Bài học</button>
                    </form>

                    <div class="preview-video" id="preview-video-add">
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/aXjiSwhDxYU"
                                frameborder="0" allowfullscreen></iframe>
                    </div>

                </div>
            </div>
        </div>
        <!-- Thêm các bài học -->

        <!-- tất cả các bài học -->
        <?php
        $so_luong_bai_1_trang = 5;
        $so_luong_trang = ceil($courses['number_course'] / $so_luong_bai_1_trang);
        $trang = 1;
        if (isset($_GET['index'])) {
            $trang = $_GET['index'];
        }
        $so_luong_trang_can_bo = ($trang - 1) * $so_luong_bai_1_trang;

        $sql = "SELECT * FROM lesson WHERE id_course = '$id_course' ORDER BY id_lesson DESC
                limit $so_luong_bai_1_trang offset $so_luong_trang_can_bo";
        $lesson = mysqli_query($connection, $sql);
        ?>

        <div class="sales-boxes" style="margin-top: 26px">
            <div class="recent-sales box">
                <div class="title" style="text-align: center">Các bài học đã được duyệt</div>
                <br>
                <div class="title"><?php echo $courses['name_course'] ?>:</div>
                <br>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Tên bài học</th>
                        <th>Xem thử bài học</th>
                        <th>Mô tả</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                    <?php foreach ($lesson as $index => $ls) { ?>
                        <tr>
                            <th>
                                <?php echo $courses['number_course'] - $so_luong_trang_can_bo - $index ?>
                            </th>
                            <th>
                                <?php echo $ls['name_lesson'] ?>
                            </th>
                            <th id="video<?php echo $index + 1 ?>">
                                <a class="button-show-video"
                                   onclick="showVideo('<?php echo $ls['link'] ?>','<?php echo $ls['type_link'] ?>','<?php echo $index + 1 ?>')">Xem
                                    ở đây</a>
                                <br>
                                <br>
                                <a class="button-show-video"
                                   onclick="showVideo('<?php echo $ls['link'] ?>','<?php echo $ls['type_link'] ?>','0')">Xem
                                    ở tab mới</a>
                            </th>
                            <th>
                                <div class="tooltip">Xem
                                    <span class="tooltiptext"><?php echo $ls['description_lesson'] ?></span>
                                </div>
                            </th>
                            <th>
                                <p id="lesson<?php echo $ls['id_lesson'] ?>"
                                   style="display:none;"><?php echo $ls['description_lesson'] ?></p>
                                <a href="#trang-trang"
                                   onclick="edit_lesson(<?php echo $ls['id_lesson'] ?>,'<?php echo $ls['name_lesson'] ?>','<?php echo $ls['link'] ?>','<?php echo $ls['type_link'] ?>','<?php echo $ls['id_course'] ?>')">Sửa</a>
                            </th>
                            <th>
                                <a href="./processing/course_delete_lesson.php?id=<?php echo $ls['id_lesson'] ?>&id_course=<?php echo $ls['id_course'] ?>">Xóa</a>
                            </th>
                        </tr>
                    <?php } ?>
                </table>
                <br>
                <div>
                    <p id="trang-trang">Trang <?php echo $trang ?></p>
                    <?php for ($i = 1; $i <= $so_luong_trang; $i++) { ?>
                        <?php if ($i == $trang) { ?>
                            <a class="page" style="border: 1px solid #0a2558;"
                               href="./course_add_detail.php?id=<?php echo $courses['id_course'] ?>&index=<?php echo $i ?>#btn-lesson"><?php echo $i ?></a>
                        <?php } else { ?>
                            <a class="page"
                               href="./course_add_detail.php?id=<?php echo $courses['id_course'] ?>&index=<?php echo $i ?>#btn-lesson"><?php echo $i ?></a>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- các bài học đã được duyệt -->
        
        <!-- Sửa bài học -->
        <div class="sales-boxes" id="edit-lesson"></div>
        <!-- Sửa bài học -->

        <!-- các bài học chưa được duyệt-->
        <?php
        $so_luong_bai_1_trang = 5;
        $so_luong_trang = ceil($courses['number_course'] / $so_luong_bai_1_trang);
        $trang = 1;
        if (isset($_GET['index'])) {
            $trang = $_GET['index'];
        }
        $so_luong_trang_can_bo = ($trang - 1) * $so_luong_bai_1_trang;

        $sql = "SELECT * FROM update_course WHERE id_course = '$id_course'";
        
        $lesson = mysqli_query($connection, $sql);
        ?>

        <div class="sales-boxes" style="margin-top: 26px">
            <div class="recent-sales box">
                <div class="title" style="text-align: center">Các bài học đang chờ được duyệt</div>
                <br>
                <div class="title"><?php echo $courses['name_course'] ?>:</div>
                <br>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Tên bài học</th>
                        <th>Xem thử bài học</th>
                        <th>Mô tả</th>
                        <th>Thể loại</th>
                        <th>Hủy</th>
                    </tr>
                    <?php foreach ($lesson as $index => $ls) { ?>
                        <tr>
                            <th>
                                <?php echo $index+1 ?>
                            </th>
                            <th>
                                <?php echo $ls['name_lesson'] ?>
                            </th>
                            <th id="video<?php echo $index + 10 ?>">
                                <a class="button-show-video"
                                    onclick="showVideo('<?php echo $ls['link'] ?>','<?php echo $ls['type_link'] ?>','<?php echo $index + 10 ?>')">Xem
                                    ở đây
                                </a>
                                <br>
                                <br>
                                <a class="button-show-video"
                                    onclick="showVideo('<?php echo $ls['link'] ?>','<?php echo $ls['type_link'] ?>','0')">Xem
                                    ở tab mới
                                </a>
                            </th>
                            <th>
                                <div class="tooltip">Xem
                                    <span class="tooltiptext"><?php echo $ls['description_lesson'] ?></span>
                                </div>
                            </th>
                            <th>
                                <?php
                                    if ($ls['action'] == 1){
                                        echo "Cập nhập";
                                    } elseif ($ls['action'] == 2){
                                        echo "Thêm mới";
                                    } elseif ($ls['action'] == -1){
                                        echo "Xóa";
                                    }
                                ?>
                            </th>
                            <th>
                                <button class="btn-delete" value="<?php echo $ls['id_lesson_update']?>">
                                    hủy
                                </button>
                            </th>
                        </tr>
                    <?php } ?>
                </table>
                <br>
                <div>
                    <p id="trang-trang">Trang <?php echo $trang ?></p>
                    <?php for ($i = 1; $i <= $so_luong_trang; $i++) { ?>
                        <?php if ($i == $trang) { ?>
                            <a class="page" style="border: 1px solid #0a2558;" href="#"><?php echo $i ?></a>
                        <?php } else { ?>
                            <a class="page" href="#"><?php echo $i ?></a>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- tất cả các bài học -->

        <?php require "../default/footer.php" ?>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript" src="./script/js_chung.js"></script>
<script type="text/javascript" src="./script/course_add_detail.js"></script>
</body>

</html>