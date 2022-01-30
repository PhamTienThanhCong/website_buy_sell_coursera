<?php
session_start();

$id_user = htmlspecialchars($_SESSION['id']);
$password = htmlspecialchars($_POST['password']);
$new_password = htmlspecialchars($_POST['new_password']);
$money = htmlspecialchars($_POST['money']);

require "../public/connect_sql.php";

$sql = "SELECT * FROM `user` WHERE (`id_user` = '$id_user') AND (`password` = '$password')";
$check_user = mysqli_query($connection, $sql);
$check_user = mysqli_fetch_array($check_user);

if ( isset($check_user['id_user']) == false){
    echo "0" ;
}else{
    $sql = "UPDATE
                `user`
            SET
                `password` = '$new_password'
            WHERE 
                (`id_user` = '$id_user')";
    $_SESSION['money'] = $money;
    mysqli_query($connection, $sql);
    echo 1;
}
mysqli_close($connection);