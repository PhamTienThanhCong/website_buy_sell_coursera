<?php

session_start();
require "../../../public/connect_sql.php";

$id_admin = $_SESSION['id'];
$id_lesson = htmlspecialchars($_POST['id_lesson']);
$id_course = htmlspecialchars($_POST['id_course']);
$name_lesson = htmlspecialchars($_POST['name_lesson']);
$link = htmlspecialchars($_POST['link']);
$type_link = htmlspecialchars($_POST['type_link']);
$description_lesson = htmlspecialchars($_POST['description_lesson']);

$sql = "SELECT count(*) as `check` FROM course 
WHERE (id_course = '$id_course') and (id_admin = '$id_admin')";

$check = mysqli_query($connection, $sql);

$check = mysqli_fetch_array($check);

if ($check['check'] == 1 ){

    $sql = "UPDATE `lesson` SET `name_lesson`='$name_lesson',`link`='$link',`type_link`='$type_link',`description_lesson`='$description_lesson' 
    WHERE (`id_lesson`='$id_lesson') and (`id_course`='$id_course')";

    mysqli_query($connection, $sql);
    header("Location: ../course_add_detail.php?id=$id_course#btn-lesson");
}