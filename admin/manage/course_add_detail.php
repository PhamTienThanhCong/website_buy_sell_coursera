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
    #course-manager{
        background: #081D45;
    }
    .content{
        width: 100%;
        display: flex;
    }
    .new-couse{
        width: 50%;
        display: inline-block;
    }
    .preview-couse{
        width: 45%;
        display: inline-block;
        margin-left: 4%;
        transform: translateY(-64px)
    }
    label{
        width: 50px;
        display: inline-block;
    }
    input{
        width: 80%;
        outline: none;
        border: none;
        border-bottom: 1px solid #ccc;
        height: 30px;
        font-size: 16px;
        margin-bottom: 10px
    }
    textarea{
        width: 92%;
        height: 180px;
        outline: none;
        padding: 10px;
        font-size: 16px;
    }
    #btn{
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
    #btn:hover{
        background-color: #990000;
    }
    .cart-pre{
        width: 100%;
        border-radius: 10px;
        border: 1px solid #ccc;
        overflow: hidden;
    }
    .img-pre{
        width: 100%;
        height: 200px;
        overflow: hidden;
    }
    #img-preview{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        cursor: pointer;
    }
    .cart-details{
        padding: 20px;
        margin-top: -15px;
    }
    #number-course,#author-course,#price-course{
        margin-top: 15px;
    }
</style>

<body>
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
            <!-- Thêm các bài học -->   
            <div class="sales-boxes" style="margin-top: 26px">
                    <div class="recent-sales box">
                        <div class="title">Các bài học</div>
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
            x = x.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
            console.log(x);
            output.innerHTML = "<i class='bx bxs-credit-card'></i> Giá thành:" + x;
        }

        function edit_course(){
            var a = document.getElementById('form-course').innerHTML;
            a = a.replaceAll("readonly=","");
            a = a.replace('type="file_demo"', 'type="file"');
            a = a.replace('type="button" onclick="edit_course()">Chỉnh sửa khóa học','>Lưu lại');
            document.getElementById('form-course').innerHTML = a;
        }

    </script>

</body>

</html>