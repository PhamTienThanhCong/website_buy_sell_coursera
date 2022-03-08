<?php
    session_start();
    if (isset($_SESSION['id']) == false){
        header('Location: ./login_and_register.php');
    }
    if (isset($_SESSION['lever'])){session_destroy();}
    $id_user = $_SESSION['id'];
    require "./public/connect_sql.php";

    $sql = "SELECT * FROM `user` WHERE `id_user` = '$id_user'";

    $user = mysqli_query($connection, $sql);
    $user = mysqli_fetch_array($user);

    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = ' VND')
        {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }

    $sql = "SELECT
                course.id_course,
                course.name_course,
                course.author,
                course.image_course,
                oder.price_buy,
                oder.created_at as time_buy,
                oder.rate
            FROM
                course
            INNER JOIN oder ON oder.id_course = course.id_course
            WHERE
                oder.id_user = '$id_user'";

    // die($sql);
    $all_courses = mysqli_query($connection, $sql);

    $sql = "SELECT
                COUNT(*) as total_buy,
                SUM(oder.price_buy) as total_price
            FROM
                oder
            WHERE
                id_user = '$id_user'";
    $total = mysqli_query($connection, $sql);
    $total = mysqli_fetch_array($total);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản của tôi</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/my_account.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php if (isset($_SESSION['alert'])){
        echo "<input id='alert-account' type='hidden' value='{$_SESSION['alert']}'>";
        unset($_SESSION['alert']);
    } ?>
    <?php require "./default/header.php"; ?>
    <div class=content>
        <h2 >
            Tài khoản của tôi 
            <i class='bx bx-user'></i>
        </h2>
        <div class="image-avatar">
            <?php if( $_SESSION['image'] == 'null') { ?>
                <img id="avatar-preview" src="./public/images/default/avata.png" alt="">
            <?php } else { ?>
                <img id="avatar-preview" src="./public/images/upload/<?php echo $_SESSION['image']?>" alt="">
            <?php } ?>
        </div>
        <form id="my-in4" method="post" action="./processing/my_account_update.php" enctype="multipart/form-data">
            <label for="">Tên tài khoản: </label>
            <input name="name_user" class="input-in4" type="text" value="<?php echo $user['name_user']?>" readonly required>
            <br>
            <label for="">Email đăng nhập: </label> 
            <input name="email_user" class="input-in4" type="text" value="<?php echo $user['email_user']?>" readonly required>
            <br>
            <label for="">Số điện thoại: </label>
            <input id="phone_number_check" name="phone_number_user" class="input-in4" type="text" value="<?php echo $user['phone_number_user']?>" readonly required>
            <br>
            <input type="hidden">
            <br>
            <input name="passworld" type="hidden">
            <!-- <label for="">Mật khẩu: </label> <input class="input-in4" type="password" name="password"><br> -->

            <button class="btn btn-primary" type="button">Sửa đổi và bổ sung</button>    
            <button id="change-danger" class="btn btn-danger" type="button">Thay đổi mất khẩu</button>    
        </form>
        
        <form id="my-password" method="post" action="./processing/my_account_change_password.php">
            <h3 style="display: inline">Đổi mật khẩu</h3>
            <br><br>
            <label for="">Mật khẩu cũ:</label>
            <input id="old-password" class="input-in4 input-replace" type="password" name="password">
            <br>
            <label for="">Mật khẩu mới</label>
            <input id="new-password" class="input-in4 input-replace" type="password" name="new_password">
            <br>
            <label for="">Nhập lại mật khẩu:</label>
            <input id="confirm-password" class="input-in4 input-replace" type="password" name="new_password">
            <br>
            <button class="btn btn-danger">Lưu mật khẩu mới</button>
        </form>

        <div class="your-cart">
            <h2>
                Tổng quan về tài khoản của bạn
                <i class='bx bx-file-find'></i>
            </h2>
            <p>
                <i class='bx bxs-right-arrow-alt'></i>
                Số khóa học đã mua: <?php echo $total['total_buy']?> khóa
            </p>
            <p>
                <i class='bx bxs-right-arrow-alt'></i>
                Số tiền đã chi trả: <?php echo currency_format($total['total_price'])?>
            </p>
        </div>
        <div class = "your-cart">
            <h2>
                Giỏ hàng đã mua
                <i class='bx bx-cart'></i>
            </h2>
            <?php foreach ($all_courses as $course) { ?>
                <div class = "course">  
                    <div class="img-course">
                        <img src="./public/images/upload/<?php echo $course['image_course']?>" alt="">
                    </div>
                    <div class = "in4-course">
                        <a href="./my_course_view_lesson.php?idcourse=<?php echo $course['id_course'] ?>">
                            <h2>Tên: <?php echo $course['name_course']?></h2>
                        </a>
                        <p>
                            <i class='bx bx-user-check'></i>
                            Tác Giả: <?php echo $course['author']?>
                        </p>
                        <p>
                            <i class='bx bx-credit-card-front'></i>
                            Giá tiền: <?php echo currency_format($course['price_buy'])?>
                        </p>
                        <p>
                            <i class='bx bx-time-five'></i>
                            Thời gian mua: 
                            <?php echo date("H:i:s - d/m/Y", strtotime($course['time_buy']))?>
                        </p>
                        
                        <p>
                            <i class='bx bx-star'></i>
                            Xếp hạng: <?php echo $course['rate']?>
                            <i class='bx bxs-star' style='color:#FFD700'></i>
                        </p>
                        <br>
                        <p class="rate-vote">
                            <a class="btn-rate" href="./view_course.php?id=<?php echo $course['id_course'] ?>">
                                Đánh giá hoặc đánh giá lại
                            </a>
                        </p>
                    </div>
                </div>
            <?php } ?>
        </div>
        
    </div>
    <?php require "./default/footer.php" ?>
    <div class="tab-right"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript" src="./script/my_account.js"></script>
    <script type="text/javascript" src="./script/all.js" ></script>
</body>
</html>