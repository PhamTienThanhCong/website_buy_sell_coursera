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
    #course-add {
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
        width: 55px;
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
    }

    #btn {
        margin-top: 20px;
        padding: 7px 20px;
        border: none;
        background-color: #0066cc;
        color: #fff;
        cursor: pointer;
        font-size: 16px;
        border-radius: 6px;
        transition: all 0.3s;
    }

    #btn:hover {
        background-color: #004080;
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
                        <div class="title">Thêm khóa học mới +</div>
                        <br><br>
                        <div class="content">
                            <form class=new-couse method="post" action="./processing/course_add.php" enctype="multipart/form-data">
                                <label for="">Tên</label>
                                <input name="name_course" type="text" placeholder="Nhập tên của khóa học" onchange="changeTitle(event)">
                                <br>
                                <label for="">Giá</label>
                                <input name="price" type="number" placeholder="Nhập giá của khóa học" onchange="ChangePrice(event)">
                                <label for="">Tác giả</label>
                                <input name="author" type="text" placeholder="Nhập tên của tác giả " onchange="ChangeAuthor(event)">
                                <br>
                                <label for="">Ảnh</label>
                                <input name="image_course" style="border: none;" type="file" onchange="loadFile(event)">
                                <br>
                                <label for="">Mô tả</label>
                                <br>
                                <textarea name="description_course" id=""></textarea>
                                <br>
                                <button id="btn">Tạo khóa học mới</button>
                            </form>
                            <div class=preview-couse>
                                <div class="title">Xem trước khóa học</div>
                                <br><br>
                                <div class="cart-pre">
                                    <div class="img-pre">
                                        <img id="img-preview" src="../../public/images/default/preview_course.jpg" alt="">
                                    </div>
                                    <br>
                                    <div class="cart-details">
                                        <h2 id="title-course">Tên khóa học: </h2>
                                        <p id="number-course">
                                            <i class='bx bxs-videos'></i>
                                            Số lượng bài học: 10 Bài
                                        </p>

                                        <p id="author-course">
                                            <i class='bx bxs-user'></i>
                                            Tác giả:
                                            <?php echo $_SESSION['user'] ?>
                                        </p>

                                        <p id="price-course">
                                            <i class='bx bxs-credit-card'></i>
                                            Giá thành: 000 VND
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php require "../default/footer.php" ?>
            </div>
    </section>
    <script type="text/javascript" src="./script/js_chung.js"></script>
    <script type="text/javascript" src="./script/course_add.js"></script>

</body>

</html>