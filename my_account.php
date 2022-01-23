<?php
    session_start();
    if (isset($_SESSION['id']) == false){
        header('Location: ./login_and_register.php');
    }
    $id_user = $_SESSION['id'];
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
    
</style>
<body>
    <?php require "./default/header.php"; ?>
    <div class=content></div>
    <div class="tab-right"></div>
    </div>
</body>
</html>