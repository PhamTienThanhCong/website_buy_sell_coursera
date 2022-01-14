<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./css/login_and_register.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="container">
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
          <form action="#">
            <div class="input-boxes">

              <div class="input-box">
                <i class='bx bx-mail-send'></i>
                <input name="email_user" type="email" placeholder="Email" required>
              </div>

              <div class="input-box">
                <i class='bx bxs-lock'></i>
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
          <form action="#">
            <div class="input-boxes">

              <div class="input-box">
                <i class='bx bxs-user'></i>
                <input name="name_user" type="text" placeholder="Tên đăng nhập" required>
              </div>

              <div class="input-box">
                <i class='bx bx-mail-send'></i>
                <input name="email_user" type="email" placeholder="Email" required>
              </div>

              <div class="input-box">
                <i class='bx bxs-phone'></i>
                <input name="phone_number_user" type="text" placeholder="Số điện thoại" required>
              </div>

              <div class="input-box">
                <i class='bx bxs-lock'></i>
                <input name="password-user" type="password" placeholder="Mật khẩu" required>
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

</html>