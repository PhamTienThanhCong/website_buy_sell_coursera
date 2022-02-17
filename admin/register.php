<?php
session_start();
if (isset($_SESSION['lever'])) {
    header('Location: ./index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
</head>
<style>
    body {
        width: 100%;
    }

    form {
        width: 250px;
        margin: auto;
    }

    form input {
        width: 100%;
    }
</style>
<body>
<h1 style="text-align: center;">Cửa hàng trực tuyến</h1>
<h3 style="text-align: center;">Đăng kí tài khoản</h3>

<form method="post" action="./processing/register.php" enctype="multipart/form-data">
    <?php
    if (empty($_SESSION['alert']) == false) {

        echo $_SESSION['alert'];
        unset($_SESSION['alert']);
        echo "<br>";
    }
    ?>
    Tên đăng nhập
    <br>
    <input type="text" name="name_admin">
    <br>
    email

    <br>
    <input type="email" name="email_admin">
    <br>
    Số điện thoại
    <br>
    <input type="text" name="phone_number_admin">
    <br>
    Địa chỉ
    <br>
    <input type="text" name="address_admin">
    <br>
    password
    <br>
    <input type="password" name="password">
    <br>
    Lựa chọn một bức ảnh của bạn
    <input type="file" name="image">
    <br>
    <br>
    <button>Đăng kí</button>
</form>
<p style="text-align: center;">
    Đã có tài khoản.
    <a href="./login.php">đăng nhập</a>
</p>
</body>
</html>