<?php
    if(!isset($_GET['token'])){
        header("Location: ./index.php");
    }
    $token = $_GET['token'];
    $type = $_GET['type'];
    require "../public/connect_sql.php";
    
    $sql = "SELECT * FROM `user` WHERE `token_user`='$token'";
    $check = mysqli_query($connection, $sql);
    $check = mysqli_fetch_array($check);

    if(!isset($check['token_user'])){
        header("Location: ./index.php");
    }

    if ($type == '0'){
        $sql = "UPDATE
                `user`
            SET
                `token_user` = ''
            WHERE
                `id_user` = '{$check['id_user']}'";

        mysqli_query($connection, $sql);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lấy lại mật khẩu</title>
    <link rel="stylesheet" href="../css/header.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<style>
    body{
        width: 100%;
        overflow: hidden;
        background-color: #f2f2f2;
    }
    .new-password{
        width: 100%;
        height: 70vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #cart-reset-password{
        width: 420px;
        background-color: white;
        padding: 15px;
        border-radius: 10px;
    }
    input{
        width: 100%;
        border-radius: 5px;
        border: 1px solid #d9d9d9;
        height: 35px;
        outline: none;
        padding: 10px;
        font-size: 17px;
    }
    .btn{
        text-decoration: none;
        color: black;
        border: none;
        float: right;
        margin-left: 15px;
        font-size: 17px;
        font-family: 'Times New Roman', Times, serif;
        padding: 8px 15px;
        background-color: #3399ff;
        border-radius: 5px;
        cursor: pointer;
    }
    #input-alert{
        width: 100%;
    }
    #btn-reset{
        width: 100%;
    }
</style>
<body>
    <header>
        <h2>Shop mua khóa học chẳng hạn</h2>
        
        <div class=user>
            <a class="user-a" id="back-home" href="./index.php">Trang chủ</a>
        </div>

    </header>
    <div class="new-password">
        <?php if($type == '0'){ ?>
            <div id="cart-reset-password">
                <h2>
                    Đặt lại mật khẩu của Bạn 
                </h2>
                <br>
                <p>
                    cảm ơn bạn đã báo cáo! <br>bạn nên đổi lại mật khẩu và email của mình.
                </p>
                <br>
                <a class="btn-reset" href="../login_and_register.php">Quay lại đăng nhập</a>
            </div>
        <?php } else { ?>
        <form id="cart-reset-password" method="post" action="">
            <h2>
                Đặt lại mật khẩu của Bạn 
            </h2>
            <br>
            <p>Nhập mật khẩu mới của bạn và cố gắng nhớ nó nhé</p>
            <br>
            <div id="input-alert">
                <input type="hidden" name="token" value=<?php echo $token; ?>>
                <input type="password" name="password" placeholder="Mật khẩu mới" required>
            </div>
            <br>
            <div id="btn-reset">
                <button class="btn">Đặt mật khẩu mới</button>
            </div>
        </form>
        <?php } ?>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            $("#cart-reset-password").submit(function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "./password_set_new.php",
                    data: $(this).serializeArray(),
                    dataType: "html",
                    success: function (response) {
                        if (response == 0){
                            toastr["success"]("Thay đổi mật khẩu thành công vui lòng đăng nhập lại", "Thành công");
                            $("#input-alert").html("Thay đổi mật khẩu thành công vui lòng <a href='../login_and_register.php'>đăng nhập lại</a>");
                            $("#btn-reset").html("<a class='btn' href='../login_and_register.php'>đăng nhập lại</a>")
                        }else{
                            toastr["error"]("Đã xảy ra lỗi khi đổi mật khẩu vui lòng thử lại sau", "Lỗi");
                            $("#input-alert").html("Thay đổi mật khẩu Đã xảy ra lỗi vui lòng <a href='../login_and_register.php'>đăng nhập lại</a> <br> hoặc thử cách khác");
                            $("#btn-reset").html("<a class='btn' href='../login_and_register.php'>đăng nhập lại</a>")
                        
                        }
                    }
                });
            })
            
        })
    </script>
</html>