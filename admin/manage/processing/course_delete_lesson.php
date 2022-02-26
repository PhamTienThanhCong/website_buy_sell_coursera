<?php
require "../../check_admin/check_admin_2.php";
require "../../../public/connect_sql.php";

$id_admin = $_SESSION['id'];
$id_course = htmlspecialchars($_GET['id_course']);
$id_lesson = htmlspecialchars($_GET['id']);

$sql = "SELECT count(*) as `check`,name_lesson,link,type_link,description_lesson  FROM course join lesson using(id_course)
WHERE (course.id_course = '$id_course') and (course.id_admin = '$id_admin') and (id_lesson = '$id_lesson')";

$check = mysqli_query($connection, $sql);

$check = mysqli_fetch_array($check);

if ($check['check'] == 1 and $_SESSION['lever']==2){
    $sql = "DELETE FROM `lesson` WHERE id_lesson = '$id_lesson' and id_course = '$id_course'";
    mysqli_query($connection, $sql);
}elseif ($check['check'] == 1 and $_SESSION['lever']==1){
    $name=$check['name_lesson'];
    $link=$check['link'];
    $type_link=$check['type_link'];
    $description=(isset($check['description_lesson']))?$check['description_lesson']:"none";
    $sql = "REPLACE INTO `update_course`(id_lesson,id_course, `name_lesson`, `link`, `type_link`, `description_lesson`,status_lesson) values ('$id_lesson','$id_course','$name','$link','$type_link','$description',-1)";
    mysqli_query($connection, $sql);
}
mysqli_close($connection);
header("Location: ../course_add_detail.php?id=$id_course#btn-lesson");