<?php
require "../check_admin/check_admin_1.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../default/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
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

    #student-manager {
        background: #081D45;
    }
</style>

<body>
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
                <div class="title">Quản lý học viên</div>
                <br>

                <br>
                <div class="sales-details">
                    <?php
                    require "../../public/connect_sql.php";
                    $sql = "SELECT user.id_user,name_user,email_user,phone_number_user,image_user, user.token_user, count(*) 
                        FROM `user` join oder using(id_user) 
                        group by user.id_user,name_user,email_user,phone_number_user,image_user;";
                    $user = mysqli_query($connection, $sql);
                    ?>

                    <table>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên</th>
                            <th>email</th>
                            <th>Số điện thoại</th>
                            <th>Số khóa học đã đăng kí</th>
                            <th>Reset Password</th>
                        </tr>
                        <?php foreach ($user as $st) { ?>
                            <tr>
                                <th>
                                    <?php if ($st['image_user'] == "null") { ?>
                                        <img width="100" src="../../public/images/default/avata.png" alt="">
                                    <?php } else { ?>
                                        <img width="100"
                                             src="../../public/images/upload/<?php echo $st['image_user'] ?>"
                                             alt="">
                                    <?php } ?>
                                </th>
                                <th>
                                    <?php echo $st['name_user'] ?>
                                </th>
                                <th>
                                    <?php echo $st['email_user'] ?>
                                </th>
                                <th>
                                    <?php echo $st['phone_number_user'] ?>
                                </th>
                                <th>
                                    <?php echo $st['count(*)'] ?>
                                </th>
                                <th>
                                    <!-- <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe> -->
                                    <form class="form-reset-password" method="post" action="./processing/reset_password_user.php">
                                        <input type="hidden" name="type" value="0">
                                        <input class="email" type="hidden" name="email" value="<?php echo $st['email_user'] ?>">
                                        <button type="submit" >Reset password</button>
                                    </form>
                                    <br>
                                    <?php if($st['token_user'] != "") { ?>
                                        <form class="form-reset-token" method="post" action="./processing/reset_password_user.php">
                                            <input type="hidden" name="type" value="1">
                                            <input class="email" type="hidden" name="email" value="<?php echo $st['email_user'] ?>">
                                            <button type="submit" >Clear token</button>
                                        </form>
                                    <?php } ?>
                                </th>
                            </tr>
                        <?php } ?>
                    </table>
                </div>

            </div>
        </div>
        <?php require "../default/footer.php" ?>
    </div>
</section>

<script type="text/javascript" src="./script/js_chung.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $(document).ready(function() {
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
        $(".form-reset-password").submit(function(e){
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "./processing/reset_password_user.php",
                data: $(this).serializeArray(),
                dataType: "html",
            })
            .done(function(response){
                toastr["success"]("Gửi email reset password thành công", "Thành công");
            })

            $(this).parent().html(`
            <form class="form-reset-password" method="post" action="./processing/reset_password_user.php">
                <input type="hidden" name="type" value="0">
                <input class="email" type="hidden" name="email" value="`+$(this).find(".email").val()+`">
                <button type="submit" >Reset password</button>
            </form>
            <br>
            <form class="form-reset-token" method="post" action="./processing/reset_password_user.php">
                <input type="hidden" name="type" value="1">
                <input class="email" type="hidden" name="email" value="`+$(this).find(".email").val()+`">
                <button type="submit" >Clear token</button>
            </form>
            `);
            
  
        })
        $(".form-reset-token").submit(function(e){
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "./processing/reset_password_user.php",
                data: $(this).serializeArray(),
                dataType: "html",
            })
            .done(function(response){
                toastr["success"]("reset token thành công", "Thành công");
            })
            $(this).remove();
        })
    })
</script>

</body>

</html>