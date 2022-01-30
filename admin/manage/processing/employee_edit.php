<?php
    session_start();
    $name_admin = htmlspecialchars($_POST['name_admin']);
    $email_admin = htmlspecialchars($_POST['email_admin']);
    $phone_number_admin = htmlspecialchars($_POST['phone_number_admin']);
    $address_admin = htmlspecialchars($_POST['address_admin']);
    $image = $_FILES['image'];

    require "../../../public/connect_sql.php";

    $fileImageName = $_SESSION['image'];

    if (basename($image["name"]) != ""){
        // thư mục lưu file
        $target_dir = "../../../public/images/upload/";
        // if ($fileImageName == "none"){
            // lấy đặt tên file 
            $target_file = $target_dir . basename($image["name"]);
            // Lấy đuôi mở rộng
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // đặt lại tên file 
            $ramdomValue = time();
            $fileImageName = "$name_admin"."$ramdomValue"."."."$imageFileType";
        // }
        $target_file = $target_dir . basename($fileImageName);
        // Lưu file
        move_uploaded_file($image["tmp_name"], $target_file);
    }
    $id = $_SESSION['id'];
    $sql = "UPDATE `admin` SET 
    `name_admin`='$name_admin',`email_admin`='$email_admin',`phone_number_admin`='$phone_number_admin',`address_admin`='$address_admin',`image`='$fileImageName'
    WHERE `id_admin` = $id";
    $_SESSION['user'] = $name_admin;
    $_SESSION['image'] = $fileImageName;

    mysqli_query($connection,$sql);
    mysqli_close($connection);
    header('Location: ../my_account.php');