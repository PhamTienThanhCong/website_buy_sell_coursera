<?php
$email = $_POST['email'];
$type = $_POST['type'];
require "../../../public/connect_sql.php";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
?>
    Email không hợp lệ
    <button><a href="../employee_manager.php">Back</a></button>>
<?php
}
if ($type == 1){
    $sql ="UPDATE
                `admin`
            SET
                `token_admin` = ''
            WHERE
                email_admin = '$email'";
    mysqli_query($connection, $sql);
    echo "1";
}
if ($type == 0){
    $CurPageURL = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $CurPageURL = str_replace("admin/manage/processing/reset_password_user.php","processing/password_reset.php",$CurPageURL);  

    $bytes = random_bytes(20);
    $token = bin2hex($bytes);

    $sql = "SELECT * FROM admin WHERE email_admin = '$email'";
    $check = mysqli_query($connection, $sql);
    $check = mysqli_fetch_array($check);
        
    require "../../mail/mailer.php";

    $sql = "UPDATE `admin` SET `token_admin` = '$token' WHERE `email_admin` = '$email'";
    mysqli_query($connection, $sql);

    $user = $check['name_user'];
    $title = "Lấy lại tài khoản của bạn";
    $content = "Chào $user !<br> Chúng tôi gửi cho bạn link để lấy lại mật khẩu của bạn <a href='$CurPageURL?token=$token&type=1'>tại đây</a>.<br>Trong trường hợp bạn không yêu cầu reset password bạn sẽ ấn <a href='$CurPageURL?token=$token&type=0'>vào đây</a><br>Lưu ý link sẽ tự động hết hạn sau 24h <br>Cảm ơn";
    mail_send_by_cong($email,$user,$title,$content);
}