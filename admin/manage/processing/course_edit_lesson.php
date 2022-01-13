<?php

session_start();
require "../../../public/connect_sql.php";

$id_admin = $_SESSION['id'];
$id_lesson = addslashes($_POST['id_lesson']);
$id_course = addslashes($_POST['id_course']);
$name_lesson = addslashes($_POST['name_lesson']);
$link_ytb_lesson = addslashes($_POST['link_ytb_lesson']);
$description_lesson = addslashes($_POST['description_lesson']);

$sql = "SELECT count(*) as `check` FROM course 
WHERE (id_course = '$id_course') and (id_admin = '$id_admin')";

$check = mysqli_query($connection, $sql);

$check = mysqli_fetch_array($check);

if ($check['check'] == 1 ){
    $sort_link_ytb = explode('watch?v=',$link_ytb_lesson)[1];
    if (strlen($sort_link_ytb)> 20){
        $sort_link_ytb = explode('&list=',$sort_link_ytb)[0];
    }
    $sql = "UPDATE `lesson` SET `name_lesson`='$name_lesson',`link_ytb_lesson`='$sort_link_ytb',`description_lesson`='$description_lesson' 
    WHERE (`id_lesson`='$id_lesson') and (`id_course`='$id_course')";
    mysqli_query($connection, $sql);
    header("Location: ../course_add_detail.php?id=$id_course#btn-lesson");
}