<?php
    session_start();
    unset($_SESSION['user']);
    unset($_SESSION['id']);
    setcookie('user',"",-1,"/");
    header('Location: ../../index.php');