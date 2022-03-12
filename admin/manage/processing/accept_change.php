<?php

require "../../../public/connect_sql.php";
// require "../../mail/mailer.php";

$id_lesson_update = htmlspecialchars($_POST['id_lesson_update']);

$sql = "SELECT * FROM `update_course` Join course using(id_course) join admin using(id_admin) WHERE `id_lesson_update` = '$id_lesson_update'";
$in4 = mysqli_query($connection, $sql);
$in4 = mysqli_fetch_array($in4);
$user = $in4['name_admin'];
$lesson = $in4['name_lesson'];
$course = $in4['name_course'];
$title = "Thông báo về việc chấp thuận yêu cầu thay đổi bài học";
$content = "Chào $user !<br> Chúng tôi đã chấp nhận yêu cầu phê duyệt bài '$lesson' trong khoá học '$course' của bạn. Nếu không phải bạn yêu cầu đề nghị liên hệ để giải quyết";
// mail_send_by_cong($in4['email_admin'], $user, $title, $content);


$sql = "SELECT * FROM `update_course` WHERE `id_lesson_update` = '$id_lesson_update'";
$check = mysqli_query($connection, $sql);
$check = mysqli_fetch_array($check);

if ($check['action'] == -1) {
    $sql = "delete from `update_course` WHERE id_lesson_update='$id_lesson_update'";
    $sql2 = "delete from `lesson` where id_lesson='{$check['id_lesson']}' and id_course='{$check['id_course']}'";
    mysqli_query($connection, $sql);
    mysqli_query($connection, $sql2);
} elseif ($check['action'] == 1) {
    $sql = "delete from `update_course` WHERE id_lesson_update='$id_lesson_update'";
    $sql2 = "update `lesson` set name_lesson = '{$check['name_lesson']}',
                    link = '{$check['link']}',
                    type_link = '{$check['type_link']}',
                    description_lesson = '{$check['description_lesson']}'
where id_lesson='{$check['id_lesson']}' and id_course='{$check['id_course']}'";
    mysqli_query($connection, $sql);
    mysqli_query($connection, $sql2);
} elseif ($check['action'] == 2) {
    $sql = "delete from `update_course` WHERE id_lesson_update='$id_lesson_update'";
    $sql2 = "INSERT INTO `lesson`(
                `id_course`,
                `name_lesson`,
                `link`,
                `type_link`,
                `description_lesson`
            )
            VALUES(
                '{$check['id_course']}',
                '{$check['name_lesson']}',
                '{$check['link']}',
                '{$check['type_link']}',
                '{$check['description_lesson']}'
            )";
    mysqli_query($connection, $sql);
    mysqli_query($connection, $sql2);
}
echo "0";
