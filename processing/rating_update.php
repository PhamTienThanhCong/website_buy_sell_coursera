<?php
    session_start();
    $id_user = $_SESSION['id'];

    $rate = $_POST['rating'];
    $comment = htmlspecialchars($_POST['comment-rate']);
    $id_course = htmlspecialchars($_POST['id_course']);

    require "../public/connect_sql.php";

    $sql = "UPDATE
                `oder`
            SET
                `rate` = '$rate',
                `comment` = '$comment'
            WHERE 
                (`id_user` = '$id_user') AND (`id_course` = '$id_course')";

    mysqli_query($connection, $sql);

    mysqli_close($connection);

    header("Location: ../view_course.php?id=$id_course#rate-form");