<?php

require "../public/connect_sql.php";

$name_user = htmlspecialchars($_POST['name_user']);
$email_user = htmlspecialchars($_POST['email_user']);
$phone_number_user = htmlspecialchars($_POST['phone_number_user']);
$password_user = htmlspecialchars($_POST['password_user']);

$sql = "SELECT * FROM `user` WHERE `email_user` = '$email_user'";

$check_email = mysqli_query($connection, $sql);
$check_email = mysqli_fetch_array($check_email);

if (isset($check_email['id_user'])) {
    echo "0" ;
}else{
    $sql = "INSERT INTO `user` (name_user,email_user,phone_number_user,password)
            VALUES ('$name_user','$email_user','$phone_number_user','$password_user')";
    mysqli_query($connection, $sql);
    mysqli_close($connection);
    echo "1" ;
}