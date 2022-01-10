<?php 
    session_start();
    if (isset($_SESSION['lever']) == false){
        header('Location: ./login.php');
    }else{
        header('Location: ./manage/my_account.php');
    }