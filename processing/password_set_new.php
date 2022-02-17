<?php 
require "../public/connect_sql.php";

$token = $_POST['token'];
$password = $_POST['password'];

if($password != ""){
    $sql = "UPDATE `user` SET `password` = '$password' WHERE `token_user` = '$token'";
    mysqli_query($connection, $sql);
    
    $sql = "UPDATE `user` SET `token_user` = '' WHERE `token_user` = '$token'";
    mysqli_query($connection, $sql);

    echo "0";
}else{
    echo "1";
}