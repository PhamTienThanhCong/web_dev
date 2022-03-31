<?php  
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['user']);
    unset($_SESSION['lever']);
    header('Location: ./index.php');
?>