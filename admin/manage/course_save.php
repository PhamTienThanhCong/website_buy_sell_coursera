<?php
    require "../default/option.php"
    ?>
    <section class="home-section">
        <?php
        require "../default/user.php";
        if (!function_exists('currency_format')) {
            function currency_format($number, $suffix = ' VND') {
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
        <div class="home-content">
            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Chỉnh sửa khóa học</div>
                    <br><br>
                    <div class="content">
                        <form id="form-course" class = new-couse method="post" action="./processing/course_add.php" enctype="multipart/form-data" >
                            <input type="hidden" value="<?php echo $id_course?>" readonly>
                            <label for="">Tên</label>
                            <input name="name_course" type="text" placeholder="Nhập tên của khóa học" onchange="changeTitle(event)" value="<?php echo $courses['name_course']?>" readonly>
                            <br>
                            <label for="" >Giá</label>
                            <input name="price" type="number" placeholder="Nhập giá của khóa học" onchange="ChangePrice(event)" value="<?php echo $courses['price']?>" readonly>
                            <br>
                            <label for="">Ảnh</label>
                            <input name="image_course" type="file_demo" style="border:none" onchange="loadFile(event)" readonly>
                            <br>
                            <label for="">Mô tả</label>
                            <br>
                            <textarea name="description_course" id="" readonly><?php echo $courses['description_course']?>"</textarea>
                            <br>
                            <button id="btn" type="button" onclick="edit_course()">Chỉnh sửa khóa học</button>
                        </form>
                        <div class = preview-couse>
                            <div class="title">Xem trước khóa học</div>
                            <br><br>
                            <div class = "cart-pre">
                                <div class = "img-pre">
                                    <img id="img-preview" src="../../public/images/upload/<?php echo $courses['image_course']?>" alt="">
                                </div>
                                <br>
                                <div class="cart-details">
                                    <h2 id="title-course" ><?php echo $courses['name_course']?></h2>
                                    <p id = "number-course">
                                        <i class='bx bxs-videos'></i>
                                        Số lượng bài học: <?php echo $courses['number_course']?>
                                    </p>

                                    <p id = "author-course">
                                        <i class='bx bxs-user'></i>
                                        Diễn giả: 
                                        <?php echo $_SESSION['user']?>
                                    </p>

                                    <p id="price-course">
                                        <i class='bx bxs-credit-card'></i>
                                        Giá thành: <?php echo currency_format($courses['price'])?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                  
            </div>