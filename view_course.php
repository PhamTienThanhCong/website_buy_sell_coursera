<?php
    session_start();
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = ' VND')
        {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
    $id = addslashes($_GET['id']);
    require "./public/connect_sql.php";
    $sql = "SELECT course.*, lesson.*, admin.name_admin as author_post, admin.image FROM `course` 
                LEFT OUTER JOIN lesson ON course.id_course = lesson.id_course
                LEFT OUTER JOIN admin ON course.id_admin = admin.id_admin
                WHERE course.id_course = $id
                GROUP BY lesson.id_lesson";
    $course = mysqli_query($connection, $sql);
    $one_course = mysqli_fetch_array($course);

    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = ' VND')
        {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $one_course['name_course']?></title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/view_course.css">
</head>
<style>
    
</style>
<body>
    <?php require "./default/header.php" ?>
    <!-- content -->
    <div class=content>
        <a href="./index.php"><<< Quay lại</a>
        <div class="function">             
            <?php if(isset($_SESSION['cart'][$id]['name'])) { ?>
                <a class='btn' href="./my_cart.php">  
                    <i class='bx bxs-credit-card'></i>
                    Thanh toán ngay
                </a>
            <?php } else { ?>
                <a class='btn btn-add-to-cart' style = "cursor: pointer" data-id = '<?php echo $one_course['id_course']; ?>'>    
                    <i class='bx bxs-cart-add'></i>
                    Thêm vào giỏ hàng
                </a>
            <?php } ?>
        </div>
        <br>
        <div class="avatar">
            <img src="./public/images/upload/<?php echo $one_course['image']?>" alt="">
        </div>
        <h2><?php echo $one_course['name_course']?></h2>
        <br>
        <br>
        <p class="title">* Chi Tiết khóa học: </p>
        <p>- Tác giả: <?php echo $one_course['author']?></p>
        <p>- Người đăng: <?php echo $one_course['author_post']?></p>
        <p>- Giá thành: <?php echo currency_format($one_course['price'])?></p>
        <p>- Ngày xuất bản: 
            <?php
                echo date("d/m/Y", strtotime($one_course['created_at']));
            ?>
        </p>
        <img class="img-preview" src="./public/images/upload/<?php echo $one_course['image_course']?>" alt="">
        <p class="title">* Mô tả sản phẩm:</p>
        <p><?php echo  nl2br($one_course['description_course'])?></p>
        <p class="title">* Các Bài học trong khóa học</p>
        <br>
        <table>
            <tr>
                <th>STT</th>
                <th>Tên bài học</th>
            </tr>
            <?php foreach($course as $index => $lesson){ ?>
                <tr>
                    <th><?php echo $index+1;?></th>
                    <th><?php echo $lesson['name_lesson'];?></th>
                </tr>
            <?php } ?>
            <tr>
                <th>...</th>
                <th>Đang cập nhập mỗi ngày</th>
            </tr>
        </table>
    </div>
    <div class="tab-right"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $(".btn-add-to-cart").click(function() {
            let id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "./processing/my_cart.php",
                data: {id},
                // dataType: "dataType",
                success: function (response) {
                    
                }
            });
            $(this).html("<i class='bx bxs-credit-card'></i> Thanh toán ngay");
        })
    })
    </script>
</body>
</html>