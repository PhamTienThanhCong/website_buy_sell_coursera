<?php
session_start();

require "../public/connect_sql.php";

$id_user = $_SESSION['id'];

$course = htmlspecialchars($_POST["course"]);

$id_course = explode(',', $course);

foreach ($id_course as $id){

    $sql = "SELECT
                course.*
            FROM
                course
            WHERE
                course.id_course = '$id'";

    $money = mysqli_query($connection, $sql);
    $money = mysqli_fetch_array($money);

    if(isset($money['price'])){

        $check = "SELECT
                        `id_order`
                    FROM
                        `oder`
                    WHERE
                        (id_user = '$id_user') and (id_course = '$id')";

        $check = mysqli_query($connection, $check);
        $check = mysqli_fetch_array($check);

        if (isset($check['id_order'])){
            echo "đã mua rồi";
        }else{
            $money_course = $money['price'];   
            $sql = "INSERT INTO `oder` (`id_user`, `id_course`, `price_buy`) VALUE ('$id_user','$id','$money_course')";
            mysqli_query($connection, $sql);

            $sql = "INSERT INTO `view_history` (`id_user`, `id_course`, `view`) VALUE ('$id_user','$id','1')";
            mysqli_query($connection, $sql);
            echo "mua thành công";
        }
        unset($_SESSION['cart'][$id]);
    }  
}

header("Location: ../my_course.php");