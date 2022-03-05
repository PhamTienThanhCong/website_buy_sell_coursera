<?php

// validate phone number
function isDigits(string $s): bool {
    return preg_match("/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/", $s);
}

require "../public/connect_sql.php";

$name_user = htmlspecialchars($_POST['name_user']);
$email_user = htmlspecialchars($_POST['email_user']);
$phone_number_user = htmlspecialchars($_POST['phone_number_user']);
$password_user = htmlspecialchars($_POST['password_user']);

$requested = true;

if (($name_user == "") || ($email_user == "") || ($phone_number_user == "") || ($password_user == "")) {
    echo "2";
    $requested = false;
}else if (!filter_var($email_user, FILTER_VALIDATE_EMAIL)) {
    echo "0";
    $requested = false;
}else if(!isDigits($phone_number_user)) {
    echo "1";
    $requested = false;
} else if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#",$password_user)){
    echo "4";
    $requested = false;
}
else  {
    $sql = "SELECT * FROM `user` WHERE `email_user` = '$email_user'";
    $check_email = mysqli_query($connection, $sql);
    $check_email = mysqli_fetch_array($check_email);
    if (isset($check_email['id_user'])){
        echo "0";
        $requested = false;
    }
}

if ($requested == true) {
    $sql = "INSERT INTO `user` (name_user,email_user,phone_number_user,password)
            VALUES ('$name_user','$email_user','$phone_number_user','$password_user')";
    mysqli_query($connection, $sql);
    mysqli_close($connection);
    echo "3" ;
}