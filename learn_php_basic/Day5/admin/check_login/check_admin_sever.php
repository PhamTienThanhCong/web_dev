<?php  
    session_start();
    if (isset($_SESSION['user'])==false){
        header('Location: ../../index.php');
    }
    if (isset($_SESSION['lever'])==false){
        header('Location: ../../check_loout.php');
    }