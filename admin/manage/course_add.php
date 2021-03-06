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
                        <div class="title">Th??m kh??a h???c m???i +</div>
                        <br><br>
                        <div class="content">
                            <form class=new-couse method="post" action="./processing/course_add.php" enctype="multipart/form-data">
                                <label for="">T??n</label>
                                <input name="name_course" type="text" placeholder="Nh???p t??n c???a kh??a h???c" onchange="changeTitle(event)">
                                <br>
                                <label for="">Gi??</label>
                                <input name="price" type="number" placeholder="Nh???p gi?? c???a kh??a h???c" onchange="ChangePrice(event)">
                                <label for="">T??c gi???</label>
                                <input name="author" type="text" placeholder="Nh???p t??n c???a t??c gi??? " onchange="ChangeAuthor(event)">
                                <br>
                                <label for="">???nh</label>
                                <input name="image_course" style="border: none;" type="file" onchange="loadFile(event)">
                                <br>
                                <label for="">M?? t???</label>
                                <br>
                                <textarea name="description_course" id=""></textarea>
                                <br>
                                <button id="btn">T???o kh??a h???c m???i</button>
                            </form>
                            <div class=preview-couse>
                                <div class="title">Xem tr?????c kh??a h???c</div>
                                <br><br>
                                <div class="cart-pre">
                                    <div class="img-pre">
                                        <img id="img-preview" src="../../public/images/default/preview_course.jpg" alt="">
                                    </div>
                                    <br>
                                    <div class="cart-details">
                                        <h2 id="title-course">T??n kh??a h???c: </h2>
                                        <p id="number-course">
                                            <i class='bx bxs-videos'></i>
                                            S??? l?????ng b??i h???c: 10 B??i
                                        </p>

                                        <p id="author-course">
                                            <i class='bx bxs-user'></i>
                                            T??c gi???:
                                            <?php echo $_SESSION['user'] ?>
                                        </p>

                                        <p id="price-course">
                                            <i class='bx bxs-credit-card'></i>
                                            Gi?? th??nh: 000 VND
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