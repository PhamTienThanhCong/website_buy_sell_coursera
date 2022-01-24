<?php
  session_start();
  if(isset($_SESSION['name'])){
    header('Location: ./index.php');
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./css/login_and_register.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
  <link rel="stylesheet" href="./css/header.css">
</head>

<style>
  .waning{
    color: red;
  } 
  .hidden{
    display: none;
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
            <a class="user-a" id="back-home" href="./index.php">Trang chủ</a>
        </div>
  </header>
  <div style="margin-left: -150px">
    <p>tk: congpham@gmail.com</p>
    <p>tk2: thienan@gmail.com</p>
    <p>mk: cong</p>
  </div>
  <div style="width: 60px"></div>
  <div style="margin-top: 60px" class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img class="backImg" src="./public/images/default/login.jpg" alt="">
        <div class="text">
        </div>
      </div>
      <div class="back">
        <img src="./public/images/default/register.jpg" alt="">
        <div class="text">
        </div>
      </div>
    </div>

    <!-- Đăng nhập -->
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Đăng nhập</div>
          <form id = "login-form" method="POST" action="./processing/login.php">
            <div class="input-boxes">
            <p class="waning hidden" id="alert-login">Email bạn nhập không hợp lệ</p>
              <div class="input-box">
                <i class='bx bx-mail-send'></i>
                <input name="email_user" type="email" placeholder="Email" required>
              </div>

              <div class="input-box">
                <i class='bx bx-lock'></i>
                <input name="password_user" type="password" placeholder="Mật khẩu" required>
              </div>

              <div>
                <input name="remember" id="remeber" type="checkbox">
                <label for="remeber">Ghi nhớ đăng nhập</label>
              </div>
              <br>
              <div class="text"><a href="#">Quên mật khẩu?</a></div>
              <div class="button input-box" style="margin-top: 28px;">
                <input type="submit" value="Đăng nhập">
              </div>
              <div class="text sign-up-text">Bạn không có tài khoản? <label for="flip">Đăng kí</label></div>
            </div>
          </form>
        </div>

        <!-- Đăng kí -->
        <div class="signup-form">
          <div class="title">Đăng kí</div>
          <form id="form-register" method="POST" action="./processing/register.php" >
            <div class="input-boxes">
              <p class="waning hidden" id="alert-register">Email bạn nhập không hợp lệ</p>
              <div class="input-box">
                <i class='bx bx-user'></i>
                <input name="name_user" type="text" placeholder="Tên đăng nhập" required>
              </div>

              <div class="input-box">
                <i class='bx bx-mail-send'></i>
                <input name="email_user" type="email" placeholder="Email" required>
              </div>

              <div class="input-box">
                <i class='bx bx-phone'></i>
                <input name="phone_number_user" type="text" placeholder="Số điện thoại" required>
              </div>

              <div class="input-box">
                <i class='bx bx-lock'></i>
                <input name="password_user" type="password" placeholder="Mật khẩu" required>
              </div>

              <div class="button input-box">
                <input type="submit" value="Đăng kí">
              </div>
              <div class="text sign-up-text">Bạn đã có tài khoản? <label for="flip">Đăng nhập</label></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="./script/login_register.js"></script>
</html>