<?php
session_start();

require "../public/connect_sql.php";

$id_user = $_SESSION['id'];

$course = htmlspecialchars($_POST["course"]);

$id_course = explode(',', $course);

$pay = 0;

foreach ($id_course as $id){
    // Tiền bạc
    $sql = "SELECT
                course.*,
                COUNT(lesson.id_course) AS number
            FROM
                course
            LEFT OUTER JOIN lesson ON course.id_course = lesson.id_course
            WHERE
                course.id_course = '$id'";
    
    $money = mysqli_query($connection, $sql);
    $money = mysqli_fetch_array($money);

    $number_lesson = $money['number'];

    $pay += (int)$money['price'];


    $sql = "INSERT INTO `oder` (`id_user`, `id_course`,`history_lesson`) VALUE ('$id_user','$id','1')";
    mysqli_query($connection, $sql);
    
    unset($_SESSION['cart'][$id]);
}

$_SESSION['money'] -= $pay;

$pay = $_SESSION['money'];

$sql = "UPDATE `user` SET `money` = '$pay' WHERE `id_user` = '$id_user'";
mysqli_query($connection, $sql);


header("Location: ../my_course.php");