<?php 
    session_start();
    if (isset($_SESSION['lever']) == false){
        header('Location: ./login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>
        Xin chào
        <?php echo $_SESSION['user']?>
    </h3>
    <a href="./processing/logout.php">Đăng xuất</a>
    <ul>
        <!-- <li><a href=""></a></li> -->
        <li><a href="./manage/employee_manager.php">Quản lý người dùng</a></li>
        <li><a href="./manage/employee_manager.php">Quản lý khóa học</a></li>
    </ul>  
</body>
</html>