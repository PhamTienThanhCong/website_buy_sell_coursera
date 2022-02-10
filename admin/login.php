<?php 
    session_start();
    if (isset($_SESSION['lever'])){
        header('Location: ./index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<style>
    body{
        width: 100%;
    }
    form{
        width: 350px !important;
        margin: auto;
        margin-top: 50px;
    }
    form input{
        width: 100%;
    }
</style>
<body>
    <h1 style="text-align: center;">Administrator</h1>
    <form method="post" action="./processing/login.php">
        <h2 style="text-align: center;">Đăng Nhập</h2>
        <?php
            if (isset($_SESSION['alert'])){
                echo "<br>";
                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
                echo "<br>";
                echo "<br>";
            }
        ?>
        Email
        <input type="email" name="email">
        <br><br>
        Mật khẩu
        <input type="password" name="password">
        <br>
        <p>
            Trở thành người bán hàng. 
            <a href="./register.php">Đăng kí ngay</a>
        </p>
        <button>Đăng nhập</button>
    </form>
    <div>
        <ul>
            <li>admin: congphamtienthanh@gmail.com</li>
            <li>adminPro: congj2school@gmail.com</li>
            <li>mk: cong</li>
        </ul>
    </div>
</body>
</html>