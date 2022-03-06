<?php

session_start();

$name_admin = htmlspecialchars($_POST['name_admin']);
$email_admin = $_POST['email_admin'];
if (!filter_var($email_admin, FILTER_VALIDATE_EMAIL)){
    $_SESSION['alert'] = "Email không hợp lệ";
    header("Location: ../register.php");
    exit();
}
$phone_number_admin = $_POST['phone_number_admin'];
if (preg_match("/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/",$phone_number_admin)!=1){
    $_SESSION['alert'] = "Số điện thoại không hợp lệ";
    header("Location: ../register.php");
    exit();
}
$address_admin = htmlspecialchars($_POST['address_admin']);
$password = htmlspecialchars($_POST['password']);
if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#",$password)){
    $_SESSION['alert'] = "Mật khẩu quá yếu";
    header("Location: ../register.php");
    exit();
}
$image = $_FILES['image'];
$lever = 1;
$status_admin = 0;

require "../../public/connect_sql.php";

$sqlCheck = "SELECT count(*) as `number` FROM `admin`
WHERE `email_admin` = '$email_admin'";

$emailCheck = mysqli_query($connection,$sqlCheck);
$emailCheck = mysqli_fetch_array($emailCheck);

if ($emailCheck['number'] != 0){
    $_SESSION['alert'] = "Email này đã được sử dụng";
    header("Location: ../register.php");
    exit();
}

$fileImageName = 'none';

if (basename($image["name"]) != ""){
    // thư mục lưu file
    $target_dir = "../../public/images/upload/";
    // lấy đặt tên file 
    $target_file = $target_dir . basename($image["name"]);
    // Lấy đuôi mở rộng
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // đặt lại tên file 
    $ramdomValue = time();
    $fileImageName = "$name_admin"."$ramdomValue"."."."$imageFileType";
    $target_file = $target_dir . basename($fileImageName);
    // Lưu file
    move_uploaded_file($image["tmp_name"], $target_file);
}

$sql = "INSERT INTO `admin`(`name_admin`, `email_admin`, `phone_number_admin`, `address_admin`, `image`, `password`, `lever`, `status_admin`) 
VALUES ('$name_admin', '$email_admin', '$phone_number_admin', '$address_admin', '$fileImageName', '$password', '$lever', '$status_admin')";

mysqli_query($connection,$sql);
mysqli_close($connection);
echo "Tạo Tài Khoản thành công!<br>Chúng tôi sẽ thông báo với bạn qua email sau khi xác nhận hoàn tất";
echo "<br><a href='../login.php'>Quay lại trang chủ<a>";

// email: congj2school@gmail.com
// pass:  Ph@mCongJ2School
