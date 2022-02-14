<?php
require "../../check_admin/check_admin_2.php";

$id_admin = $_SESSION['id'];
$name_course = htmlspecialchars($_POST['name_course']);
$author = htmlspecialchars($_POST['author']);
$price = htmlspecialchars($_POST['price']);
$image_course = $_FILES['image_course'];
$description_course =htmlspecialchars( $_POST['description_course']);
$status_course = 0;

if($_SESSION['lever'] == 2){
    $status_course = 1;
}

// thư mục lưu file
$target_dir = "../../../public/images/upload/";
// lấy đặt tên file 
$target_file = $target_dir . basename($image_course["name"]);
// Lấy đuôi mở rộng
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// đặt lại tên file 
$ramdomValue = time();
$fileImageName = "$name_course" . "$ramdomValue" . "." . "$imageFileType";

$target_file = $target_dir . $fileImageName;

require "../../../public/connect_sql.php";

$sql = "INSERT INTO `course`(`id_admin`, `name_course`,`author`, `description_course`, `image_course`, `status_course`, `price`) 
VALUES ('$id_admin','$name_course','$author','$description_course','$fileImageName','$status_course','$price')";

mysqli_query($connection, $sql);

$sql = "SELECT MAX(`id_course`) as `id` FROM `course` WHERE `id_admin` = '$id_admin'";

$id = mysqli_query($connection, $sql);
$id = mysqli_fetch_array($id);
$id = $id['id'];


// require "../../mail/mailer.php";
// $email_admin = $user['email_admin'];
// $name_admin = $user['name_admin'];
// $title = "Thông báo đã nhận được khóa học của bạn!";
// $content = "Chào $name_admin<br> Chúng tôi đã nhận được thông tin về khóa học của bạn. Chúng tôi sẽ sớm xác nhận khóa học của bạn sau khi kiểm tra<br>Cảm ơn bạn<br>Cong Shop!";
// // Lưu file
move_uploaded_file($image_course["tmp_name"], $target_file);

// mail_send_by_cong($email_admin,$name_admin,$title,$content);

mysqli_close($connection);

header("Location: ../course_add_detail.php?id=$id");