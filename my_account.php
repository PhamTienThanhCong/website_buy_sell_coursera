<?php
    session_start();
    if (isset($_SESSION['id']) == false){
        header('Location: ./login_and_register.php');
    }
    $id_user = $_SESSION['id'];
    require "./public/connect_sql.php";

    $sql = "SELECT * FROM `user` WHERE `id_user` = '$id_user'";

    $user = mysqli_query($connection, $sql);
    $user = mysqli_fetch_array($user);

    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = ' VND')
        {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản của tôi</title>
    <link rel="stylesheet" href="./css/header.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
    #my-account{
        background-color: #e8ebed;
    }
    .content{
        width: calc(100% - 150px);
        margin-left: 20px;
    }
    .image-avatar{
        width: 200px;
        height: 200px;
        background-color: #e8ebed;
        position: absolute;
        overflow: hidden;
        transform: translateY(20px);
        border: 4px solid #e8ebed;
    }
    .image-avatar img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }
    #my-in4{
        margin-left: 220px;
        display: inline-block;
        margin-top: 20px;
    }
    label{
        display: inline-block;
        width: 130px;
        font-size: 18px;
    }
    .input-in4{
        width: 350px;
        height: 35px;
        font-size: 18px;
        border: none;
        outline: none;
        font-family:'Times New Roman', Times, serif;
        margin-bottom: 5px;
    }
    .input-image{
        font-size: 16px;
        margin-bottom: 10px;
        margin-top: 5px;
    }
    .input-replace{
        border-bottom: 1px solid #d3d9de;
    }
    .btn{
        outline: none;
        border: none;
        padding: 10px 20px;
        font-size: 18px;
        font-family:'Times New Roman', Times, serif;
        border-radius: 10px;
        transition: all 0.5s;
        cursor: pointer;
    }
    .btn:hover{
        transform: scale(0.95);
    }
    .btn-primary{
        background-color: #2697ff;
        margin-top: 20px;
    }
    .btn-danger{
        background-color: #ff6666;
    }
    #my-password{
        /* transform: translateY(-170px); */
        /* margin-left: 50px; */
        width: 500px;
        height: 200px;
        display: inline-block;
        display: none;
    }
    .money-style{
        margin-top: 5px;
        font-size: 18px;
    }
    .your-cart{
        width: calc(100% - 150px);
        margin-top: 40px;
    }
</style>
<body>
    <?php require "./default/header.php"; ?>
    <div class=content>
        <h2 >Tài khoản của tôi </h2>
        <p class="money-style">Ngân hàng Quân đội (MBBANK)</p>
        <p class="money-style" id = "stk">
            Số tài khoản: 
        </p>
        <p class="money-style" id="my-money">
            Số tiền đang có: 
            <?php echo currency_format($_SESSION['money'])?>
        </p>
        <div class="image-avatar">
            <?php if( $_SESSION['image'] == 'null') { ?>
                <img id="avatar-preview" src="./public/images/default/avata.png" alt="">
            <?php } else { ?>
                <img id="avatar-preview" src="./public/images/upload/<?php echo $_SESSION['image']?>" alt="">
            <?php } ?>
        </div>
        <form id="my-in4" method="post" action="./processing/my_account_update.php" enctype="multipart/form-data">
            <label for="">Tên tài khoản: </label>
            <input name="name_user" class="input-in4" type="text" value="<?php echo $user['name_user']?>" readonly>
            <br>
            <label for="">Email đăng nhập: </label> 
            <input name="email_user" class="input-in4" type="text" value="<?php echo $user['email_user']?>" readonly>
            <br>
            <label for="">Số điện thoại: </label>
            <input name="phone_number_user" class="input-in4" type="text" value="<?php echo $user['phone_number_user']?>" readonly>
            <br>
            <input type="hidden">
            <br>
            <button class="btn btn-primary" type="button">Sửa đổi và bổ sung</button>    
            <button id="change-danger" class="btn btn-danger" type="button">Chỉnh sửa nâng cao</button>    
        </form>
        
        <form id="my-password" method="post" action="./processing/my_account_change_password.php">
            <h3 style="display: inline">Đổi mật khẩu và tài khoản ngân hàng</h3>
            <br><br>
            <label for="">Mật khẩu cũ:</label>
            <input class="input-in4 input-replace" type="password" name="password">
            <br>
            <label for="">Mật khẩu mới</label>
            <input class="input-in4 input-replace" type="password" name="new_password">
            <br>
            <label for="">Số tiền hiện tại</label>
            <input class="input-in4 input-replace" type="number" name="money" value="<?php echo $_SESSION['money']?>">
            <button class="btn btn-danger">Lưu Thông tin lại</button>
        </form>
        <div class = "your-cart">
            <h2>Giỏ hàng đã mua</h2>
        </div>
    </div>
    <div class="tab-right"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="./script/my_account.js"></script>
</body>
</html>