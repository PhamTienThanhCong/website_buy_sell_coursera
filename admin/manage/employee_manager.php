<?php 
    session_start();
    if (isset($_SESSION['lever']) == false){
        header('Location: ../login.php');
    }elseif ($_SESSION['lever'] != 2){
        header('Location: ../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý người dùng</title>
</head>
<body>
    <?php
        require "../../public/connect_sql.php";
        $sql = "SELECT * FROM `admin` WHERE (`lever` = '1')";
        $nhan_vien = mysqli_query($connection, $sql);
    ?>
    <h3>Quản lý nhân viên</h3>
    <br><br>
    <table border="1" width="100%" cellsp>
        <tr>
            <th>ảnh</th>
            <th>Tên</th>
            <th>email</th>
            <th>Số điện thoại</th>
            <th>địa chỉ</th>
            <th>Trạng thái</th>
            <th>chức nắng</th>
        </tr>
        <?php foreach($nhan_vien as $nv) { ?>
            <tr>
                <th>
                    <?php if($nv['image'] == "none") { ?>
                        <img width="100" src="../../public/images/default/avata.png" alt="">   
                    <?php } else { ?>  
                        <img width="100" src="../../public/images/upload/<?php echo $nv['image']?>" alt="">  
                    <?php } ?>          
                </th>
                <th>
                    <?php echo $nv['name_admin']?>
                </th>
                <th>
                    <?php echo $nv['email_admin']?>
                </th>
                <th>
                    <?php echo $nv['phone_number_admin']?>
                </th>
                <th>
                    <?php echo $nv['address_admin']?>
                </th>
                <th>
                    <?php if ($nv['status_admin'] == 1){
                        echo "Đã xác nhận";
                    }elseif ($nv['status_admin'] == -1){
                        echo "bị cấm";
                    }elseif ($nv['status_admin'] == 0) {
                        echo "Chờ xác nhận";
                    }
                    ?>
                </th>
                <th>
                    <?php if ($nv['status_admin'] == 0) { ?>
                        <a href="./processing/comfirm_employee.php?id=<?php echo $nv['id_admin']?>&type=1">Xác nhận</a>
                        <br>
                        <a href="./processing/comfirm_employee.php?id=<?php echo $nv['id_admin']?>&type=0">Từ chối</a>
                    <?php }elseif ($nv['status_admin'] == 1) { ?>
                        <a href="./processing/comfirm_employee.php?id=<?php echo $nv['id_admin']?>&type=-1">CẤM !</a>
                    <?php }else { ?>
                        <a href="./processing/comfirm_employee.php?id=<?php echo $nv['id_admin']?>&type=2">Gỡ cấm !</a>
                    <?php } ?>
                </th>
            </tr>
        <?php } ?>
    </table>
</body>
</html>