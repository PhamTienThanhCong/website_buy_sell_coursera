<?php

session_start();

$name_admin = addslashes($_POST['name_admin']);
$email_admin = addslashes($_POST['email_admin']);
$phone_number_admin = addslashes($_POST['phone_number_admin']);
$address_admin = addslashes($_POST['address_admin']);
$password = addslashes($_POST['password']);
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