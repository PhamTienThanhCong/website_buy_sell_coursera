<?php
require "../../check_admin/check_admin_2.php";
require "../../../public/connect_sql.php";

$id_admin = $_SESSION['id'];
$id_course = htmlspecialchars($_GET['id_course']);
$id_lesson = htmlspecialchars($_GET['id']);

$sql = "SELECT count(*) as `check` FROM course 
WHERE (id_course = '$id_course') and (id_admin = '$id_admin')";

$check = mysqli_query($connection, $sql);

$check = mysqli_fetch_array($check);

if ($check['check'] == 1 ){
    $sql = "DELETE FROM `lesson` WHERE id_lesson = '$id_lesson' and id_course = '$id_course'";
    mysqli_query($connection, $sql);
}
mysqli_close($connection);
header("Location: ../course_add_detail.php?id=$id_course#btn-lesson");