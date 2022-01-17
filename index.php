<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/index.css">
    <title>Trang chủ</title>
</head>
<style>
    #home{
        background-color: #e8ebed;
    }
</style>
<body>
    <header>
        <h2>Shop mua khóa học chẳng hạn</h2>
        <form method="get" action="">
            <div id="search">
                <i class='search bx bx-search'></i>
                <input type="text" name="search" placeholder= "Tìm kiếm khóa học mà bạn thích">
            </div>
        </form>
        <div class=user>
            <a href="./login_and_register.php">Đăng nhập</a>
        </div>
    </header>
    <div class="hinder"></div>
    <div class="container">
        <ul>
            <li id="home">
                <a href="./index.php">
                    <i class='bx bxs-home'></i>
                    <br>
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="">
                    <i class='bx bxs-book-content'></i>
                    <br>
                    Khóa học
                </a>
            </li>
            <li>
                <a href="">
                    <i class='bx bxs-cart'></i>
                    <br>
                    Giỏ hàng
                </a>
            </li>
            <li>
                <a href="">
                    <i class='bx bxs-user'></i>
                    <br>
                    Tài khoản
                </a>
            </li>
        </ul>
        <div class="tab-left"></div>
        <div class=content>

        </div>
        <div class="tab-right"></div>
    </div>
    <footer>

    </footer>
</body>
</html>