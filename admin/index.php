<?php 
    session_start();
    if (isset($_SESSION['lever']) == false){
        session_destroy();
        header('Location: ../admin/login.php');
    }else{
        header('Location: ./manage/my_account.php');
    }