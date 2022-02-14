<?php 
    session_start();
    if (isset($_SESSION['lever']) == false){
        if ($_SESSION['lever'] == 1){
            header('Location: ../../index.php');
        }      
    }