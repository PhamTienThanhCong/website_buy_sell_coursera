<?php
require "../../check_admin/check_admin_2.php";
require "../../../public/connect_sql.php";
require "../../mail/mailer.php";
$id_lesson_update = htmlspecialchars($_GET['id_lesson_update']);

$sql = "SELECT * FROM `update_course` WHERE `id_lesson_update` = '$id_lesson_update'";
$check = mysqli_query($connection, $sql);
$check = mysqli_fetch_array($check);

$id_course = $check['id_course'];
$id_admin = $_SESSION['id'];

$sql = "SELECT COUNT(*) AS `check` FROM `course` WHERE id_course = '$id_course' AND id_admin = '$id_admin'";
$check = mysqli_query($connection, $sql);
$check = mysqli_fetch_array($check);

if ($check['check'] or $_SESSION['lever'] == 2) {

    $sql = "SELECT * FROM `update_course` Join course using(id_course) join admin using(id_admin) WHERE `id_lesson_update` = '$id_lesson_update'";
    $in4 = mysqli_query($connection, $sql);
    $in4 = mysqli_fetch_array($in4);
    $user = $in4['name_admin'];
    $lesson = $in4['name_lesson'];
    $course = $in4['name_course'];
    $title = "Thông báo về việc hủy thay đổi bài học";
    $content = "Chào $user !<br> Chúng tôi đã hủy yêu cầu phê duyệt bài '$lesson' trong khoá học '$course' của bạn. Đề nghị liên hệ để giải quyết";
    // mail_send_by_cong($in4['email_admin'], $user, $title, $content);
    $sql = "DELETE FROM `update_course` WHERE `id_lesson_update` = '$id_lesson_update'";
    mysqli_query($connection, $sql);
    // header("Location: ../course_manager_detail_admin.php");
    echo "0";
    exit();

}

mysqli_close($connection);
header("Location: ../course_add_detail.php?id=$id_course#trang-trang");