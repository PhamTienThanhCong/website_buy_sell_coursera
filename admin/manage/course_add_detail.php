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
    #course-add{
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
        background-color: #0066cc;
        color: #fff;
        cursor: pointer;
        font-size: 16px;
        border-radius: 6px;
        transition: all 0.3s;
    }
    #btn:hover{
        background-color: #004080;
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
        require "../default/user.php"
        ?>
        <div class="home-content">
            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Thêm khóa học chi tiết</div>
                    <br><br>

                </div>                       
            </div>
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
    </script>

</body>

</html>