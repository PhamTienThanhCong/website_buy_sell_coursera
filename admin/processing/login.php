<?php

session_start();

$email = addslashes($_POST['email']);
$password = addslashes($_POST['password']);

require "../../public/connect_sql.php";

$sqlCheck = "SELECT * FROM `admin`
WHERE (`email_admin` = '$email') and (`password` = '$password')";

$admin = mysqli_query($connection,$sqlCheck);
$admin = mysqli_fetch_array($admin);

mysqli_close($connection);

if (isset($admin['id_admin'])){
    if($admin['status_admin'] == 1){
        $_SESSION['user'] = $admin['name_admin'];
        $_SESSION['id'] = $admin['id_admin'];
        $_SESSION['lever'] = $admin['lever'];
    }else{
        $_SESSION['alert'] = "Tài khoản của bạn đang đợi xác nhận";
    }
        header("Location: ../index.php");
        exit();
}else{
    $_SESSION['alert'] = "Email hoặc tài khoản không đúng";
    header("Location: ../login.php");
}