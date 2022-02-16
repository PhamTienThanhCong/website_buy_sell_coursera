<?php
session_start();

$user = htmlspecialchars($_POST['email_user']);
$password = htmlspecialchars($_POST['password_user']);

require "../public/connect_sql.php";

if (($user == "") || ($password == "")){
    echo "0";
}else{
    if (!filter_var($user, FILTER_VALIDATE_EMAIL)){
        echo "0";
    }else{
        $sql = "SELECT * FROM `user` WHERE `email_user` = '$user' and `password` = '$password'";

        $user = mysqli_query($connection, $sql);
        $user = mysqli_fetch_array($user);

        mysqli_close($connection);

        if (isset($user['name_user'])) {
            $_SESSION['name'] = $user['name_user'];
            $_SESSION['id'] = $user['id_user'];
            $_SESSION['image'] = $user['image_user'];
            echo "1";
        }else{
            echo "0";
        }
    }
}


