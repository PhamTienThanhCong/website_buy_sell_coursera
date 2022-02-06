<?php
session_start();

$id_user = $_SESSION['id'];
$id_course = htmlspecialchars($_POST['id_course']);
$check_lesson = htmlspecialchars($_POST['check_lesson']);

require "../public/connect_sql.php";

$sql = "SELECT
            *
        FROM
            `view_history`
        WHERE
            (id_user = '$id_user') AND (id_course = '$id_course')";

$check = mysqli_query($connection, $sql);
$check = mysqli_fetch_array($check);

$sql = "SELECT
            COUNT(*) as number_lesson
        FROM
            `lesson`
        WHERE
            `id_course` = '$id_course'";

$number_lesson = mysqli_query($connection, $sql);
$number_lesson = mysqli_fetch_array($number_lesson);


if(isset($check['view'])){
    if ($number_lesson['number_lesson'] > $check_lesson){
        if ($check_lesson == $check['view']){
            $history_lesson =  $check['view']+1;
    
            $sql = "UPDATE
                        `view_history`
                    SET
                        `view` = '$history_lesson'
                    WHERE
                        (`id_user` = '$id_user') AND `id_course` = '$id_course'";
            mysqli_query($connection, $sql);
        }else{
            $history_lesson = $check_lesson+1;
        }
    }else{
        $history_lesson = 1;
    }
}

mysqli_close($connection);

header("Location: ../my_course_view_lesson.php?idcourse=$id_course&number_video=$history_lesson");