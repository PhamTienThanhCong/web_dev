<?php 
    // check login
    session_start();
    if (isset($_COOKIE['user'])){
        $id = $_COOKIE['user'];
        require "./form_user/sever/connectMySql.php";
        $sql = "SELECT * FROM `user` WHERE `token` = '$id'";
        $kq = mysqli_query($connection,$sql);
        $userAccess = mysqli_fetch_array($kq);
        $_SESSION['user'] = $userAccess['name'];
        $_SESSION['id'] = $userAccess['id'];
    }

    $id = $_POST['id'];
    require "./form_user/sever/connectMySql.php";
    $sql = "SELECT * FROM mat_hang WHERE id = '$id'";
    $san_phan = mysqli_query($connection,$sql);
    $san_phan = mysqli_fetch_array($san_phan);

    // unset($_SESSION['gio_hang']);
    mysqli_close($connection);
    if ((isset($san_phan['id']) == 0) || (isset($_POST['id'])==false)){
        $_SESSION['alert'] = "bạn không thể đặt mua sản phẩn này";
        header("Location: ./xem_chi_tiet.php?id=$id");
    }else{
        if (isset($_SESSION['gio_hang'][$id]) == false ){
            $_SESSION['gio_hang'][$san_phan['id']]['so_luong'] = 1;
        }else{
            $_SESSION['gio_hang'][$san_phan['id']]['so_luong']++;
        }
        $_SESSION['gio_hang'][$san_phan['id']]['name'] = $san_phan['name'];
        $_SESSION['gio_hang'][$san_phan['id']]['price'] = $san_phan['price'];
        $_SESSION['gio_hang'][$san_phan['id']]['image'] = $san_phan['image'];
        $_SESSION['alert'] = "Đặt hành thành công";
        header("Location: ./xem_chi_tiet.php?id=$id");
    }

// xem trạng thái
// echo json_encode($_SESSION['gio_hang']);