<?php
session_start();
if (isset($_SESSION['lever']) == false) {
    header('Location: ../login.php');
}
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
    #course-manager {
        background: #081D45;
    }

    .content {
        width: 100%;
        display: flex;
    }

    .new-couse {
        width: 50%;
        display: inline-block;
    }

    .preview-couse {
        width: 45%;
        display: inline-block;
        margin-left: 4%;
        transform: translateY(-64px)
    }

    label {
        width: 50px;
        display: inline-block;
    }

    input {
        width: 80%;
        outline: none;
        border: none;
        border-bottom: 1px solid #ccc;
        height: 30px;
        font-size: 16px;
        margin-bottom: 10px
    }

    textarea {
        width: 92%;
        height: 180px;
        outline: none;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
    }

    #btn,#btn-lesson {
        margin-top: 20px;
        padding: 7px 20px;
        border: none;
        background-color: #cc0000;
        color: #fff;
        cursor: pointer;
        font-size: 16px;
        border-radius: 6px;
        transition: all 0.3s;
    }

    #btn:hover {
        background-color: #990000;
    }

    .cart-pre {
        width: 100%;
        border-radius: 10px;
        border: 1px solid #ccc;
        overflow: hidden;
    }

    .img-pre {
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    #img-preview {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        cursor: pointer;
    }

    .cart-details {
        padding: 20px;
        margin-top: -15px;
    }

    #number-course,
    #author-course,
    #price-course {
        margin-top: 15px;
    }

    .lable-input {
        width: 155px;
    }
    .textarea-lesson{
        width: 95%;
        height: 100px;
    }
    #btn-lesson{
        background-color: #2697ff;
    }
    #btn-lesson:hover{
        background-color: #0a2558;
    }
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
    .page{
        text-decoration: none;
        width: 30px;
        padding: 5px 0;
        display: inline-block;
        text-align: center;
        border: 1px solid #ccc;
        margin: 5px;
    }
</style>

<body>
    <?php require "./course_save.php" ?>
    <!-- Thêm các bài học -->
    <div class="sales-boxes" style="margin-top: 26px">
        <div class="recent-sales box">
            <div class="title" style="text-align: center">Thêm các bài học</div>
            <div class=add-course>
                <h3 style="font-weight: normal">
                    <i class='bx bx-book-add'></i>
                    Thêm bài học mới
                </h3>
                <br>
                <form method='post' action='./processing/course_add_lesson.php'>
                    <input type="hidden" name="id_course" value="<?php echo $id_course?>"required>
                    <input type="hidden" name="type" value="add"required>
                    <label class="lable-input" for="">Tên bài học:</label>
                    <input type="text" name="name_lesson" required>    
                    <br>
                    <label class="lable-input" for="">Link youtube bài học:</label>
                    <input type="text" name="link_ytb_lesson" required>
                    <br>
                    <label class="lable-input" for="">Mô tả về bài học:</label>
                    <textarea class="textarea-lesson" name="description_lesson"></textarea>
                    <button id="btn-lesson">Thêm Bài học</button>
                </form>

            </div>
        </div>
    </div>

    <!-- Sửa các bài học -->

    <?php 
        $so_luong_bai_1_trang = 5;
        $so_luong_trang = ceil($courses['number_course']/$so_luong_bai_1_trang);
        $trang = 1;
        if(isset($_GET['index'])){
            $trang = $_GET['index'];
        }
        $so_luong_trang_can_bo = ($trang - 1)*$so_luong_bai_1_trang;

        $sql = "SELECT * FROM lesson WHERE id_course = '$id_course' ORDER BY id_lesson DESC
        limit $so_luong_bai_1_trang offset $so_luong_trang_can_bo";
        $lesson = mysqli_query($connection,$sql);
    ?>

    <div class="sales-boxes" style="margin-top: 26px">
        <div class="recent-sales box">
            <div class="title" style="text-align: center">Tất cả các bài học</div>
            <br>
            <div class="title"><?php echo $courses['name_course']?>:</div>
            <br>
            <table>
                <tr>
                    <th>#</th>
                    <th>Tên bài học</th>
                    <th>Link bài học</th>
                    <th>Mô tả</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                <?php foreach ($lesson as $index => $ls) { ?>
                    <tr>
                        <th>
                            <?php echo  $courses['number_course'] - $so_luong_trang_can_bo - $index?>
                        </th>
                        <th>
                            <?php echo $ls['name_lesson'] ?>
                        </th>
                        <th>
                            youtube.com/watch?v=<?php echo $ls['link_ytb_lesson'] ?>
                        </th>
                        <th>
                            Xem
                        </th>
                        <th>
                            <a href="">Sửa</a>
                        </th>
                        <th>
                            <a href="./processing/course_delete_lesson.php?id=<?php echo $ls['id_lesson']?>&id_course=<?php echo $ls['id_course']?>">Xóa</a>
                        </th>
                    </tr>
                <?php } ?>
            </table>
            <br>
            <div>
                <p>Trang <?php echo $trang ?></p>
                <?php for($i = 1 ; $i <= $so_luong_trang; $i++) { ?>
                    <?php if ($i == $trang) { ?>
                        <a class="page" style="border: 1px solid #0a2558;" href="./course_add_detail.php?id=<?php echo $courses['id_course']?>&index=<?php echo $i ?>#btn-lesson"><?php echo $i ?></a>
                    <?php }else{ ?>
                        <a class="page" href="./course_add_detail.php?id=<?php echo $courses['id_course']?>&index=<?php echo $i ?>#btn-lesson"><?php echo $i ?></a>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php require "../default/footer.php" ?>
    </div>

    

    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
        var loadFile = function(event) {
            var output = document.getElementById('img-preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
        var changeTitle = function(event) {
            var output = document.getElementById('title-course');
            output.innerText = event.target.value;
        }
        var ChangePrice = function(event) {
            var output = document.getElementById('price-course');
            var x = parseInt(event.target.value);
            x = x.toLocaleString('it-IT', {
                style: 'currency',
                currency: 'VND'
            });
            console.log(x);
            output.innerHTML = "<i class='bx bxs-credit-card'></i> Giá thành:" + x;
        }

        function edit_course() {
            var a = document.getElementById('form-course').innerHTML;
            a = a.replaceAll("readonly=", "");
            a = a.replace('type="file_demo"', 'type="file"');
            a = a.replace('type="button" onclick="edit_course()">Chỉnh sửa khóa học', '>Lưu lại');
            document.getElementById('form-course').innerHTML = a;
        }
    </script>

</body>

</html>