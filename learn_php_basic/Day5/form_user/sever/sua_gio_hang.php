<?php
    session_start();
    $type = $_GET['type'];
    $id = $_GET['id'];
    if (isset($_SESSION['gio_hang'][$id]['so_luong'])){
        if ($type == 1){
            if ($_SESSION['gio_hang'][$id]['so_luong']==1){
                unset($_SESSION['gio_hang']["$id"]);    
            }else{
                if (isset($_SESSION['gio_hang'][$id]['name'])){
                    $_SESSION['gio_hang']["$id"]['so_luong']--;
                }else{
                    header('Location: ../gio_hang.php');
                }
            }        
        }else if ($type == 2){
            $_SESSION['gio_hang']["$id"]['so_luong']++;
        }else if ($type == 3){
            unset($_SESSION['gio_hang']["$id"]);    
        }
    }

    header('Location: ../gio_hang.php');
    // echo json_encode($_SESSION['gio_hang']);