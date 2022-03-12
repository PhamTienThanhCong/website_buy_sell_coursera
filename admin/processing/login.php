<?php

session_start();

$email = htmlspecialchars($_POST['email']);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $_SESSION['alert'] = "Email không hợp lệ";
    header("Location: ../login.php");
}
$password = htmlspecialchars($_POST['password']);

require "../../public/connect_sql.php";

$sqlCheck = "SELECT * FROM `admin`
WHERE (`email_admin` = '$email') and (`password` = '$password')";

$admin = mysqli_query($connection,$sqlCheck);
$admin = mysqli_fetch_array($admin);

if (isset($admin['id_admin'])){
    if($admin['status_admin'] == 1){
        $_SESSION['user'] = $admin['name_admin'];
        $_SESSION['id'] = $admin['id_admin'];
        $_SESSION['lever'] = $admin['lever'];
        $_SESSION['image'] = $admin['image'];
        $bytes = random_bytes(20);
        $token = bin2hex($bytes);
        $sql = "UPDATE `admin` SET `token_admin` = '$token' WHERE `id_admin` = '{$admin['id_admin']}'";
        mysqli_query($connection, $sql);
        $_SESSION['token']=$token;
    }elseif($admin['status_admin'] == -1){
        $_SESSION['alert'] = "Tài khoản của bạn đang bị cấm";
    }else{
        $_SESSION['alert'] = "Tài khoản của bạn đang đợi xác nhận";
    }
        header("Location: ../index.php");
        exit();
}else{
    $_SESSION['alert'] = "Email hoặc tài khoản không đúng";
    header("Location: ../login.php");
}