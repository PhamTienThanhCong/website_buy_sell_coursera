<?php
require "../../check_admin/check_admin_pro_2.php";
$id_course = htmlspecialchars($_GET["id"]);
$type = htmlspecialchars($_GET["type"]);
require "../../../public/connect_sql.php";

if ($type == 'accept') {
    $sql = "UPDATE `course` SET `status_course` = '1' WHERE `id_course` = {$id_course}";
    mysqli_query($connection, $sql);
} elseif ($type == 'unaccepted') {
    $sql = "UPDATE `course` SET `status_course` = '0' WHERE `id_course` = {$id_course}";
    mysqli_query($connection, $sql);
} elseif ($type == 'delete') {
    $sql = "DELETE FROM `course` WHERE `id_course` = $id_course";
}

// require "../../mail/mailer.php";
// mail_send_by_cong($employee['email_admin'],$user,$title,$content);

    header("Location: ../course_manager_admin.php");