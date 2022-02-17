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
                <div class="title">Quản lý nhân sự</div>
                <br>

                <br>
                <div class="sales-details">
                    <?php
                    require "../../public/connect_sql.php";
                    $sql = "SELECT user.id_user,name_user,email_user,phone_number_user,image_user, count(*) 
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
                            <th>Số kóa học đã đăng kí</th>
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
                                    <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
                                    <form method="post" action="../../processing/password_forgot.php" target="dummyframe">
                                        <input type="hidden" name="email" value="<?php echo $st['email_user'] ?>">
                                        <button id="resetpass<?php echo $st['id_user'] ?>" type="submit" onclick="reset(<?php echo $st['id_user'] ?>)">Reset password</button>
                                    </form>
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
<script>
    function reset(id){
        Document.getElementById("resetpass"+id).innerHTML = "Reseted password";
        Document.getElementById("resetpass"+id).getAttribute("type") = "none";
    }
</script>

</body>

</html>