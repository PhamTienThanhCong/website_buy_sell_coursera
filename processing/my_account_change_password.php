<?php
session_start();

$id_user = htmlspecialchars($_SESSION['id']);
$password = htmlspecialchars($_POST['password']);
$new_password = htmlspecialchars($_POST['new_password']);

require "../public/connect_sql.php";

$sql = "SELECT * FROM `user` WHERE (`id_user` = '$id_user') AND (`password` = '$password')";
$check_user = mysqli_query($connection, $sql);
$check_user = mysqli_fetch_array($check_user);

if ( isset($check_user['id_user']) == false){
    echo 0 ;
}elseif ($password==$new_password){
    echo 2 ;
} else if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#",$new_password)){
    echo "4";}
else{
    $sql = "UPDATE
                `user`
            SET
                `password` = '$new_password'
            WHERE 
                (`id_user` = '$id_user')";
    mysqli_query($connection, $sql);
    echo 1;
}
mysqli_close($connection);