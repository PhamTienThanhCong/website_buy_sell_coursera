<?php
session_start();
$id_course = $_GET["id"];
$type = $_GET["type"];
require "../../../public/connect_sql.php";

if ($type = 'accept'){
    $sql = "UPDATE `course` SET `status_course` = '1' WHERE `id_course` = '$id_course '";
    mysqli_query($connection,$sql);
}else if ($type = 'delete'){
    $sql = "DELETE FROM `course` WHERE `id_course` = '$id_course'";
}

// require "../../mail/mailer.php";
// mail_send_by_cong($employee['email_admin'],$user,$title,$content);

header("Location: ../course_manager_admin.php");