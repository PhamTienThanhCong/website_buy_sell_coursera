<?php

session_start();
require "../../../public/connect_sql.php";

$id_admin = $_SESSION['id'];
$id_course = addslashes($_POST['id_course']);
$name_lesson = addslashes($_POST['name_lesson']);
$link_ytb_lesson = addslashes($_POST['link_ytb_lesson']);
$description_lesson = addslashes($_POST['description_lesson']);
$type = addslashes($_POST['type']);

$sql = "SELECT count(*) as `check` FROM course 
WHERE (id_course = '$id_course') and (id_admin = '$id_admin')";

$check = mysqli_query($connection, $sql);

$check = mysqli_fetch_array($check);

if ($check['check'] == 1 ){
    if($type == 'add'){
        $sort_link_ytb = explode('watch?v=',$link_ytb_lesson)[1];
        if (strlen($sort_link_ytb)> 20){
            $sort_link_ytb = explode('&list=',$sort_link_ytb)[0];
        }
        $sql = "INSERT INTO `lesson`(`id_course`, `name_lesson`, `link_ytb_lesson`, `description_lesson`) 
        VALUES('$id_course','$name_lesson','$sort_link_ytb','$description_lesson')";

        mysqli_query($connection, $sql);
        header("Location: ../course_add_detail.php?id=$id_course#btn");
    }
    
}