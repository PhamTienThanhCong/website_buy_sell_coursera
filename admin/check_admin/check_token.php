<?php
require "../../public/connect_sql.php";
$sql = "Select * from `admin` WHERE `token_admin` = '{$_SESSION['token']}' and `id_admin` = '{$_SESSION['id']}'";
$token = mysqli_query($connection, $sql);
if (mysqli_num_rows($token) != 1) {
    session_destroy();
    $_SESSION['alert'] = "Phiên đăng nhập của bạn đã bị đăng xuất bởi thiết bị khác";
    header('Location: ../index.php');
    exit();
}