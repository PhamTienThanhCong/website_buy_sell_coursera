<?php
require "../../check_admin/check_admin_pro_2.php";
$id_admin = htmlspecialchars($_GET['id']);
$type = htmlspecialchars($_GET['type']);

require "../../../public/connect_sql.php";

$sql = "SELECT * FROM `admin` WHERE `id_admin` = '$id_admin'";

$employee = mysqli_query($connection, $sql);
$employee = mysqli_fetch_array($employee);

if (isset($employee['id_admin'])){
    if ($employee['lever'] == 1){
        require "../../mail/mailer.php";
        $title = "";
        $content = "";
        $send = true;
        $user = $employee['name_admin'];
        if ($type == 1){
            $sql = "UPDATE `admin` SET `status_admin` = '1' where `id_admin` = '$id_admin'";
            mysqli_query($connection, $sql);
            $title = "Thông báo xác nhận tài khoản thành công";
            $content = "Chào $user <br> Chúng tôi đã xác nhận tài khoản của bạn thành công, chào mừng bạn gia nhập Cong Shop! <br> cảm ơn";
        }elseif($type == 0){
            $sql = "DELETE FROM `admin` WHERE `id_admin` = '$id_admin'";
            $title = "Thông báo xác nhận tài khoản thất bại";
            $content = "Chào $user <br> Chúng tôi đã xác nhận tài khoản của bạn rằng không hợp lệ, cảm ơn bạn đã theo giõi Cong Shop! <br> cảm ơn";
            mysqli_query($connection, $sql);
        }elseif($type == -1){
            $sql = "UPDATE `admin` SET `status_admin` = '-1' where `id_admin` = '$id_admin'";
            mysqli_query($connection, $sql);
            $title = "Thông báo xác nhận khóa tài khoản";
            $content = "Chào $user <br> Chúng tôi đã nhận thất tài khoản của bạn đã vi phạm tiêu chuẩn công đồng, điều này là không được phép với các thành viên của Cong Shop!<br>Chúng tôi sẽ mở khóa tài khoản sau thời gian cấm kết thúc <br>Báo cáo nhầm lẫn <a href=''>Tại đây</a> <br> cảm ơn";
        }elseif($type == 2){
            $sql = "UPDATE `admin` SET `status_admin` = '1' where `id_admin` = '$id_admin'";
            mysqli_query($connection, $sql);
            $title = "Thông báo mở khóa tài khoản ";
            $content = "Chào $user <br> Tài khoản của bạn đã hết thời gian bị cấm,hi vòng rằng bạn sẽ tiếp tục cống hiến cho chúng tôi! <br> cảm ơn";
        }else{
            $send = false;
            $_SESSION['alert'] = "yêu cầu không hợp lệ";
        }
        if ($send == true){
            echo "Đang gửi mail, vui lòng đợi";
            // mail_send_by_cong($employee['email_admin'],$user,$title,$content);
        }
    }else{
        $_SESSION['alert'] = "Điều này bị cấm";
    }
}else{
    $_SESSION['alert'] = "id người dùng không hợp lệ";
}

header("Location: ../employee_manager.php");