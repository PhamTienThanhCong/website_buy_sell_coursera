<?php
session_start();

$user = $_POST['email_user'];
$password = $_POST['password_user'];

require "../public/connect_sql.php";

$sql = "SELECT * FROM `user` WHERE `email_user` = '$user' and `password` = '$password'";

$user = mysqli_query($connection, $sql);
$user = mysqli_fetch_array($user);

mysqli_close($connection);

if (isset($user['name_user'])) {
    $_SESSION['name'] = $user['name_user'];
    $_SESSION['id'] = $user['id_user'];
    $_SESSION['id'] = $user['image_user'];
    echo "1";
}else{
    echo "0";
}