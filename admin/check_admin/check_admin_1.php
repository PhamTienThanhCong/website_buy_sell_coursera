<?php 
    session_start();
    if (isset($_SESSION['lever']) == false){
        header('Location: ../index.php');
    }
    require "./check_token.php";