<?php
require "../../check_admin/check_admin_2.php";
require "../../../public/connect_sql.php";

$id_lesson_update = htmlspecialchars($_GET['id_lesson_update']);

$sql = "SELECT * FROM `update_course` WHERE `id_lesson_update` = '$id_lesson_update'";
$check = mysqli_query($connection,$sql);
$check = mysqli_fetch_array($check);

$id_course = $check['id_course'];
$id_admin = $_SESSION['id'];

$sql = "SELECT COUNT(*) AS `check` FROM `course` WHERE id_course = '$id_course' AND id_admin = '$id_admin'";
$check = mysqli_query($connection,$sql);
$check = mysqli_fetch_array($check);

if ($check['check']){
    $sql = "DELETE FROM `update_course` WHERE `id_lesson_update` = '$id_lesson_update'";
    mysqli_query($connection, $sql);
}

mysqli_close($connection);
header("Location: ../course_add_detail.php?id=$id_course#trang-trang");