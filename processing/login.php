<?php
session_start();

$user = htmlspecialchars($_POST['email_user']);
$password = htmlspecialchars($_POST['password_user']);

require "../public/connect_sql.php";

$sql = "SELECT * FROM `user` WHERE `email_user` = '$user' and `password` = '$password'";

$user = mysqli_query($connection, $sql);
$user = mysqli_fetch_array($user);

mysqli_close($connection);

if (isset($user['name_user'])) {
    $_SESSION['name'] = $user['name_user'];
    $_SESSION['id'] = $user['id_user'];
    $_SESSION['image'] = $user['image_user'];
    $_SESSION['money'] = $user['money'];
    echo "1";
}else{
    echo "0";
}