<?php

session_start();
require "../public/connect_sql.php";
$id_user = htmlspecialchars($_SESSION['id']);
$name_user = htmlspecialchars($_POST['name_user']);
$email_user = $_POST['email_user'];
if (!filter_var($email_user, FILTER_VALIDATE_EMAIL)){
    $_SESSION['alert'] = "3";
    header("Location: ../my_account.php");
    exit();
}
$sql = "SELECT
            *
        FROM
            `user`
        WHERE
            `email_user` = '$email_user'";
$check_email = mysqli_query($connection, $sql);
if(mysqli_num_rows($check_email)!=0){
    $_SESSION['alert'] = "3";
    header("Location: ../my_account.php");
    exit();
}
$phone_number_user = htmlspecialchars($_POST['phone_number_user']);
$image = $_FILES['image_user'];
$password = $_POST['password'];

// validate phone number
function isDigits(string $s): bool {
    return preg_match("/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/", $s);
}



$sql = "SELECT
            *
        FROM
            `user`
        WHERE
            `id_user` = '$id_user' AND `password` = '$password'";

$check_password = mysqli_query($connection, $sql);
$check_password = mysqli_fetch_array($check_password);

if (!isDigits($phone_number_user)){
    $_SESSION['alert'] = '2';
    header("Location: ../my_account.php");
}elseif (isset($check_password['id_user'])){
    $fileImageName = $_SESSION['image'];
    if (basename($image["name"]) != ""){
    // thư mục lưu file
        $target_dir = "../public/images/upload/";
        // if ($fileImageName == "none"){
            // lấy đặt tên file 
            $target_file = $target_dir . basename($image["name"]);
            // Lấy đuôi mở rộng
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // đặt lại tên file 
            $ramdomValue = time();
            $fileImageName = "$name_user"."$ramdomValue"."."."$imageFileType";
        // }
        $target_file = $target_dir . basename($fileImageName);
        // Lưu file
        $_SESSION['image'] = $fileImageName;
        move_uploaded_file($image["tmp_name"], $target_file);
    }
    $sql = "UPDATE
                `user`
            SET
                `name_user` = '$name_user',
                `email_user` = '$email_user',
                `phone_number_user` = '$phone_number_user',
                `image_user` = '$fileImageName'
            WHERE
                `id_user` = '$id_user' AND `password` = '$password'";
    mysqli_query($connection, $sql);
    $_SESSION['name'] = $name_user;
    $_SESSION['alert'] = '1';
    header("Location: ../my_account.php");
}else{
    $_SESSION['alert'] = '0';
    header("Location: ../my_account.php");
}

header("Location: ../my_account.php");