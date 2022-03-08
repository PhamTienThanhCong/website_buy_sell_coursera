<?php
require "../../check_admin/check_admin_2.php";
$id_admin = htmlspecialchars($_SESSION['id']);
$password = htmlspecialchars($_POST['password']);
$new_password = htmlspecialchars($_POST['new_password']);

require "../../../public/connect_sql.php";

$sql = "SELECT * FROM `admin` WHERE (`id_admin` = '$id_admin') AND (`password` = '$password')";
$check_user = mysqli_query($connection, $sql);
$check_user = mysqli_fetch_array($check_user);

if ( isset($check_user['id_admin']) == false){
    echo 0 ;
}elseif ($password==$new_password){
    echo 2 ;
} else if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#",$new_password)){
    echo "4";}
else{
    $sql = "UPDATE
                `admin`
            SET
                `password` = '$new_password'
            WHERE 
                (`id_admin` = '$id_admin')";
    mysqli_query($connection, $sql);
    echo 1;
}
mysqli_close($connection);