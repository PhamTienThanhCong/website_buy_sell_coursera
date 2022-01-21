<?php
session_start();

require "../public/connect_sql.php";

$id_user = $_SESSION['id'];

$course = $_POST["course"];

$id_course = explode(',', $course);

$pay = 0;

foreach ($id_course as $id){
    $sql = "INSERT INTO `oder` (`id_user`, `id_course`) VALUE ('$id_user','$id')";
    mysqli_query($connection, $sql);

    // Tiền bạc
    $sql = "SELECT * FROM `course` WHERE `id_course` =  '$id'";
    $money = mysqli_query($connection, $sql);
    $money = mysqli_fetch_array($money);
    $pay += (int)$money['price'];
    
}

$_SESSION['money'] -= $pay;

$pay = $_SESSION['money'];

$sql = "UPDATE `user` SET `money` = '$pay' WHERE `id_user` = '$id_user'";
mysqli_query($connection, $sql);


header("Location: ../my_course.php");