<?php
    require "../check_admin/check_admin_1.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../default/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    table,
    td,
    th {
        border: 1px solid #ddd;
        text-align: left;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        padding: 15px;
        font-weight: normal;
        text-align: center;
    }

    #my-account {
        background: #081D45;
    }

    .user-detail {
        width: 100%;
        display: flex;
    }

    .avata {
        width: 200px;
    }

    #user-in4 {
        width: 470px;
    }

    #user-in4 label {
        margin-left: 30px;
        margin-right: 10px;
        display: inline-block;
        width: 106px;
    }

    #user-in4 input {
        width: 310px;
        outline: none;
        border: none;
        height: 30px;
        font-size: 16px;
        margin-bottom: 6px;
    }

    #btn,.btn {
        /* transform: translateY(7px); */
        margin-left: 30px;
        padding: 7px 20px;
        border: none;
        background-color: #0066cc;
        color: #fff;
        cursor: pointer;
        font-size: 16px;
        border-radius: 6px;
        transition: all 0.3s;
    }

    #btn:hover {
        background-color: #004080;
    }
    .btn{
        margin-top: 20px;
        background-color: #0066cc;
        margin-left: 0px;
    }
    #my-password{
        /* transform: translateY(-170px); */
        width: 330px;
        height: 200px;
        display: inline-block;
        display: none;
    }
    #change-danger{
        margin-top: 0px;
        margin-left: 30px;
        background-color:#004080
    }
    .input-in4{
        outline: none;
        border: none;
        border-bottom: 1px solid #004080;
        width: 180px;
        height: 30px;
        font-size: 16px;
        margin-bottom: 6px;
    }
    #my-password label {
        margin-right: 10px;
        display: inline-block;
        width: 135px;
    }
    .hidden-lable{
        display: none;
    }
</style>

<body>
    <input type="hidden" id="value-response" value="<?php
                                    if (isset($_SESSION['alert']) ) {
                                        echo $_SESSION['alert'];
                                        unset($_SESSION['alert']);
                                    }
                                    ?>">
    <?php
    require "../default/option.php"
    ?>
    <section class="home-section">
            <?php
            require "../default/user.php"
            ?>
            <div class="home-content">
                <div class="sales-boxes">
                    <div class="recent-sales box">
                        <div class="title">Tài khoản của tôi</div>
                        <br>
                        <br>
                        <div class="sales-details">
                            <?php
                            require "../../public/connect_sql.php";
                            $id = $_SESSION['id'];
                            $sql = "SELECT * FROM `admin` WHERE (`id_admin` = '$id')";
                            $admin = mysqli_query($connection, $sql);
                            $admin = mysqli_fetch_array($admin);
                            ?>

                            <div class="user-detail">
                                <div class="avata">
                                    <?php if ($admin['image'] == "none") { ?>
                                        <img id="output" width="100%" src="../../public/images/default/avata.png" alt="">
                                    <?php } else { ?>
                                        <img id="output" width="100%" src="../../public/images/upload/<?php echo $admin['image'] ?>" alt="">
                                    <?php } ?>
                                </div>


                                <form id="user-in4" method="post" action="./processing/employee_edit.php" enctype="multipart/form-data">
                                    <label for="name">Tên: </label>
                                    <input type="text" id="name" name="name_admin" value="<?php echo $admin['name_admin'] ?>" readonly>
                                    <br>
                                    <label for="email">Email: </label>
                                    <input type="email" id="email" name="email_admin" value="<?php echo $admin['email_admin'] ?>" readonly>
                                    <br>
                                    <label for="phone_number">Số Điện Thoại: </label>
                                    <input type="text" id="phone_number" name="phone_number_admin" value="<?php echo $admin['phone_number_admin'] ?>" readonly>
                                    <br>
                                    <label for="address">Địa chỉ: </label>
                                    <input type="text" id="address" name="address_admin" value="<?php echo $admin['address_admin'] ?>" readonly>
                                    <br>
                                    <div class="hidden-lable">
                                        <label for="phone_number">password</label>
                                        <input style="border-bottom: 1px solid #004080;" type="password" id="password" name="password" readonly required>
                                    </div>
                                    <input type='hidden' id='img' name='image'>
                                    <br>
                                    <button id="btn" type="button" onclick="edit()">Sửa</button>
                                    <button id="change-danger" class="btn btn-danger" type="button">Thay đổi mất khẩu</button>
                                </form>
                                <form id="my-password" method="post" action="./processing/my_account_change_password.php">
                                    <h3 style="display: inline">Đổi mật khẩu</h3>
                                    <br><br>
                                    <label for="">Mật khẩu cũ:</label>
                                    <input id="old-password" class="input-in4" type="password" name="password">
                                    <br>
                                    <label for="">Mật khẩu mới</label>
                                    <input id="new-password" class="input-in4" type="password" name="new_password">
                                    <br>
                                    <label for="">Nhập lại mật khẩu:</label>
                                    <input id="confirm-password" class="input-in4" type="password" name="new_password">
                                    <br>
                                    <button class="btn btn-danger">Lưu mật khẩu mới</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <?php require "../default/footer.php" ?>
            </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript" src="./script/js_chung.js"></script>
    <script type="text/javascript" src="./script/my_account.js"></script>

</body>

</html>