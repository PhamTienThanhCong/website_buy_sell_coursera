<?php

require "../../check_admin/check_admin_2.php";
require "../../../public/connect_sql.php";

$id_admin = $_SESSION['id'];
$id_course = htmlspecialchars($_POST['id_course']);
$name_lesson = htmlspecialchars($_POST['name_lesson']);
$link = htmlspecialchars($_POST['link']);
$type_link = htmlspecialchars($_POST['type_link']);
$description_lesson = htmlspecialchars($_POST['description_lesson']);
// $type = htmlspecialchars($_POST['type']);
// if(isset($type)){
//     $type=0;
// }else{
//     $type=2;
// }

$sql = "SELECT * FROM course 
WHERE (id_course = '$id_course') and (id_admin = '$id_admin')";


$check = mysqli_query($connection, $sql);

$check = mysqli_fetch_array($check);

if ($check['status_course'] == 0 && $_SESSION['lever'] == 1){
        $sql = "INSERT INTO `lesson`(`id_course`, `name_lesson`, `link`, `type_link`, `description_lesson`) 
        VALUES('$id_course','$name_lesson','$link','$type_link','$description_lesson')";

        mysqli_query($connection, $sql);
        header("Location: ../course_add_detail.php?id=$id_course#btn");
        exit();
} else if ($check['status_course'] == 1 && $_SESSION['lever'] == 2){
    $sql = "INSERT INTO `lesson`(`id_course`, `name_lesson`, `link`, `type_link`, `description_lesson`) 
    VALUES('$id_course','$name_lesson','$link','$type_link','$description_lesson')";

    mysqli_query($connection, $sql);
    header("Location: ../course_add_detail.php?id=$id_course#btn");
    exit();
} else if ($check['status_course'] == 1 && $_SESSION['lever'] == 1){
    $sql = "INSERT INTO `update_course`(
                `id_course`,
                `name_lesson`,
                `link`,
                `type_link`,
                `description_lesson`,
                `action`
            )
            VALUES(
                '$id_course',
                '$name_lesson',
                '$link',
                '$type_link',
                '$description_lesson',
                '2'
            )";

    mysqli_query($connection, $sql);
    header("Location: ../course_add_detail.php?id=$id_course#btn");
    exit();
}