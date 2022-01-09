<?php
$id_admin = $_GET['id'];
$type = $_GET['type'];

require "../../../public/connect_sql.php";

$sql = "SELECT * FROM `admin` WHERE `id_admin` = '$id_admin'";

$employee = mysqli_query($connection, $sql);
$employee = mysqli_fetch_array($employee);

if (isset($employee['id_admin'])){
    if ($employee['lever'] == 1){
        if ($type == 1){
            $sql = "UPDATE `admin` SET `status_admin` = '1' where `id_admin` = '$id_admin'";
            mysqli_query($connection, $sql);
        }elseif($type == 0){
            $sql = "DELETE FROM `admin` WHERE `id_admin` = '$id_admin'";
            mysqli_query($connection, $sql);
        }elseif($type == -1){
            $sql = "UPDATE `admin` SET `status_admin` = '-1' where `id_admin` = '$id_admin'";
            mysqli_query($connection, $sql);
        }elseif($type == 2){
            $sql = "UPDATE `admin` SET `status_admin` = '1' where `id_admin` = '$id_admin'";
            mysqli_query($connection, $sql);
        }else{
            $_SESSION['alert'] = "yêu cầu không hợp lệ";
        }
    }else{
        $_SESSION['alert'] = "Điều này bị cấm";
    }
}else{
    $_SESSION['alert'] = "id người dùng không hợp lệ";
}

header("Location: ../employee_manager.php");