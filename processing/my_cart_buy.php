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
                course.*
            FROM
                course
            WHERE
                course.id_course = '$id'";
    
    $money = mysqli_query($connection, $sql);
    $money = mysqli_fetch_array($money);

    if(isset($money['price'])){
        $money_course = $money['price'];   
        $sql = "INSERT INTO `oder` (`id_user`, `id_course`, `price_buy`) VALUE ('$id_user','$id','$money_course')";
        mysqli_query($connection, $sql);
        unset($_SESSION['cart'][$id]);

        $sql = "INSERT INTO `view_history` (`id_user`, `id_course`, `view`) VALUE ('$id_user','$id','1')";
        mysqli_query($connection, $sql);

    }  
}

header("Location: ../my_course.php");