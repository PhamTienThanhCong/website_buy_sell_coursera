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
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .tab-right{
        display: inline-block;
        width: 200px;
        background-color: #ccc;
        padding-top: 60px;
    }
    .container{
        width: 100%;
        display: flex;
    }
    ul{
        list-style-type: none;
    }
    li{
        list-style-type: none;
    }
    li a{
        text-decoration: none;
    }
    header{
        width: 100%;
        height: 50px;
        background-color: #009999;
    }
    .conten{
        width: 100%;
    }
    .avata{
        width: 100px;
        height: 100px;
        /* margin-left: 30px; */
        border-radius: 50%;
        overflow: hidden;
        margin: auto;
    }
    ul li img{
        width: 100%;
        height: 100%;

    }
</style>

<body>
    <?php
        require "../../public/connect_sql.php";
        $sql = "SELECT * FROM `admin` WHERE (`lever` = '1')";
        $nhan_vien = mysqli_query($connection, $sql);
    ?>
    <header>
        Đây là thẻ header
    </header>
    <br>
    <h2 style="text-align: center;">Quản lý nhân viên</h2>
    <br>
    <div class="container">
        <div class="tab-right">
            <ul>
                <li class = "avata">
                    <img width="100" src="../../public/images/default/avata.png" alt="">   
                </li>
                <li style="text-align: center;">
                    <p style="font-size: 22px">
                        <?php echo $_SESSION['user']?>
                    </p> 
                </li>
                <li>
                    <a href="">Tổng quan</a>
                </li>
                <li>
                    <a href="">Quản lý nhân viên</a>
                </li>
                <li>
                    <a href="">Quản lý người dùng</a>
                </li>
                <li>
                    <a href="">Quản lý khóa học</a>
                </li>
            </ul>
        </div>
        <div class="conten">
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
        </div>
    </div>
</body>
</html>