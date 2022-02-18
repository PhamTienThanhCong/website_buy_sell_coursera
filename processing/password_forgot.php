<?php 
echo "<h2>Chúng tôi đã gửi cho bạn email để bạn có thể lấy lại mất khẩu của mình</h2>";
echo "<h2>Cảm ơn bạn</h2>";
echo "<a href='../login_and_register.php'>Quay lại đăng nhập</a>";
$email = $_POST['email'];

require "../public/connect_sql.php";

$CurPageURL = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$CurPageURL = str_replace("password_forgot.php","password_reset.php",$CurPageURL);  

$bytes = random_bytes(20);
$token = bin2hex($bytes);

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $sql = "SELECT * FROM `user` WHERE `email_user` = '$email'";

    $check = mysqli_query($connection, $sql);
    $check = mysqli_fetch_array($check);
    if (isset($check['email_user'])){
        if ($check['token_user']==""){
            require "../public/mail/mailer.php";

            $sql = "UPDATE `user` SET `token_user` = '$token' WHERE `email_user` = '$email'";
            mysqli_query($connection, $sql);

            $user = $check['name_user'];
            $title = "Lấy lại tài khoản của bạn";
            $content = "Chào $user !<br> Chúng tôi gửi cho bạn link để lấy lại mật khẩu của bạn <a href='$CurPageURL?token=$token&type=1'>tại đây</a>.<br>Trong trường hợp bạn không yêu cầu reset password bạn sẽ ấn <a href='$CurPageURL?token=$token&type=0'>vào đây</a><br>Lưu ý link sẽ tự động hết hạn sau 24h <br>Cảm ơn";
            mail_send_by_cong($email,$user,$title,$content);
        }
    }
}