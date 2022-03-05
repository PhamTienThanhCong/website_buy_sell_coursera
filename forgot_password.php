<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>
    <link rel="stylesheet" href="./css/header.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<style>
    .content{
        width: 100%;
        height: 60vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    body {
        overflow: hidden;
        background-color: #f2f2f2;
    }
    .tab-content{
        width: 420px;
        background-color: white;
        border-radius : 10px;
        border: 1px solid #d9d9d9;
        padding: 20px;
    }
    #search-email{
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
        background-color: #d9d9d9;
        border-radius: 5px;
        cursor: pointer;
    }
    .action{
        margin-top: 15px;
        width: 100%;
    }

</style>

<body>
    <?php require "./default/header.php" ?>
        <div class=content>
            <div class="tab-content">
                <h2>Lấy lại tài khoản của bạn</h2>
                <br>
                <p>Vui lòng nhập email để tìm kiếm tài khoản của bạn.</p>
                <br>
                <form action="./processing/password_forgot.php" method="post" id="form-email">
                    
                    <input id="search-email" name="email" type="text" required>
                    <!-- <button></button> -->
                    <div class="action">
                        <button class="btn" style="background-color: #3399ff">Tìm kiếm</button>
                        <a class="btn" href="./login_and_register.php">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include "./default/footer.php" ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript">
        const validateEmail = (email) => {
            return String(email)
                .toLowerCase()
                .match(
                    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                );
        };
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
            // $("#form-email").submit(function () {
            //     event.preventDefault();
            //     var check = true;
                
            //     if (!validateEmail($('#search-email').val())){
            //         check = false;
            //         toastr["error"]("email không hợp lệ", "Lỗi email");
                    
            //     }
            //     if (check == true){
            //         console.log("true")
            //     }
            // })
        })
    </script>

</html>