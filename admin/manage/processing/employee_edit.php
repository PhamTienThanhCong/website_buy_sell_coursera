<?php
require "../../check_admin/check_admin_2.php";
require "../../../public/connect_sql.php";
$name_admin = htmlspecialchars($_POST['name_admin']);
$email_admin = $_POST['email_admin'];
if (!filter_var($email_admin, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['alert'] = "Email không hợp lệ";
    header("Location: ../my_account.php");
    exit();
}
$sql = "SELECT
            *
        FROM
            `admin`
        WHERE
            `admin_user` = '$email_admin'";
$check_email = mysqli_query($connection, $sql);
if(mysqli_num_rows($check_email)!=0){
    $_SESSION['alert'] = "Email đã được sử dụng";
    header("Location: ../my_account.php");
    exit();
}
$phone_number_admin = $_POST['phone_number_admin'];
if (preg_match("/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/",$phone_number_admin)!=1) {
    $_SESSION['alert'] = "Số điện thoại không hợp lệ";
    header("Location: ../my_account.php");
    exit();
}
$address_admin = htmlspecialchars($_POST['address_admin']);
$image = $_FILES['image'];



$fileImageName = $_SESSION['image'];

if (basename($image["name"]) != "") {
    // thư mục lưu file
    $target_dir = "../../../public/images/upload/";
    // if ($fileImageName == "none"){
    // lấy đặt tên file
    $target_file = $target_dir . basename($image["name"]);
    // Lấy đuôi mở rộng
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // đặt lại tên file
    $ramdomValue = time();
    $fileImageName = "$name_admin" . "$ramdomValue" . "." . "$imageFileType";
    // }
    $target_file = $target_dir . basename($fileImageName);
    // Lưu file
    move_uploaded_file($image["tmp_name"], $target_file);
}
$id = $_SESSION['id'];
$sql = "UPDATE `admin` SET 
    `name_admin`='$name_admin',`email_admin`='$email_admin',`phone_number_admin`='$phone_number_admin',`address_admin`='$address_admin',`image`='$fileImageName'
    WHERE `id_admin` = $id";
$_SESSION['user'] = $name_admin;
$_SESSION['image'] = $fileImageName;

mysqli_query($connection, $sql);
mysqli_close($connection);
header('Location: ../my_account.php');