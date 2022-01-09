<?php 
    session_start();
    if (isset($_SESSION['lever'])){
        header('Location: ../index.php');
    }