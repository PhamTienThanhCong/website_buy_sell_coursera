<?php

require "../../check_admin/check_admin_2.php";
require "../../../public/connect_sql.php";

$id_admin = $_SESSION['id'];
$lever_admin = $_SESSION['lever'];
$id_lesson = htmlspecialchars($_POST['id_lesson']);
$id_course = htmlspecialchars($_POST['id_course']);
$name_lesson = htmlspecialchars($_POST['name_lesson']);
$link = htmlspecialchars($_POST['link']);
$type_link = htmlspecialchars($_POST['type_link']);
$description_lesson = htmlspecialchars($_POST['description_lesson']);

$sql = "SELECT * FROM course 
WHERE (id_course = '$id_course') and (id_admin = '$id_admin')";

$check = mysqli_query($connection, $sql);

$check = mysqli_fetch_array($check);

if ($check['status_course'] == 0 or $lever_admin == 2){

    $sql = "UPDATE `lesson` SET `name_lesson`='$name_lesson',`link`='$link',`type_link`='$type_link',`description_lesson`='$description_lesson' 
    WHERE (`id_lesson`='$id_lesson') and (`id_course`='$id_course')";

    mysqli_query($connection, $sql);
    header("Location: ../course_add_detail.php?id=$id_course#btn-lesson");
}else if ($check['status_course'] == 1){
    $sql = "SELECT COUNT(*) AS `check` FROM update_course WHERE (`id_lesson`='$id_lesson') and (`id_course`='$id_course')";

    $check = mysqli_query($connection, $sql);

    $check = mysqli_fetch_array($check);

    if ($check['check'] == 0){
        $sql = "INSERT INTO `update_course`(
            `id_lesson`,
            `id_course`,
            `name_lesson`,
            `link`,
            `type_link`,
            `description_lesson`,
            `action`
        )
        VALUES(
            '$id_lesson',
            '$id_course',
            '$name_lesson',
            '$link',
            '$type_link',
            '$description_lesson',
            '1'
        )";
        mysqli_query($connection, $sql);
        header("Location: ../course_add_detail.php?id=$id_course#btn-lesson");
    }else{
        $sql = "UPDATE
                    `update_course`
                SET
                    `id_lesson` = '$id_lesson',
                    `id_course` = '$id_course',
                    `name_lesson` = '$name_lesson',
                    `link` = '$link',
                    `type_link` = '$type_link',
                    `description_lesson` = '$description_lesson',
                    `action` = '1'
                WHERE (`id_lesson`='$id_lesson') and (`id_course`='$id_course')";
        mysqli_query($connection, $sql);
        header("Location: ../course_add_detail.php?id=$id_course#btn-lesson");        
    }

}