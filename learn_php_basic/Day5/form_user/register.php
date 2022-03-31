<?php session_start();
    if (isset($_COOKIE['user'])){
        $id = $_COOKIE['user'];
        require "./form_user/sever/connectMySql.php";
        $sql = "SELECT * FROM `user` WHERE `token` = '$id'";
        $kq = mysqli_query($connection,$sql);
        $userAccess = mysqli_fetch_array($kq);
        $_SESSION['user'] = $userAccess['name'];
        $_SESSION['id'] = $userAccess['id'];
    }
    if (isset($_SESSION['id'])){
        header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
</head>
<style>
    body{
        width: 100%;
    }
    form{
        width: 250px;
        margin: auto;
    }
    form input{
        width: 100%;
    }
</style>
<body>
    <h1 style="text-align: center;">Nhà Hàng Công Hạnh</h1>
    <h3 style="text-align: center;">Đăng kí tài khoản</h3>
    <form method="post" action="./sever/register.php">
        Tên đăng nhập
        <br>
        <input type="text" name="name">
        <br>
        email
        <?php
            if (empty($_SESSION['alert'])==false){
                echo "<br>";
                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
            }
        ?>
        <br>
        <input type="email" name="email">
        <br>
        Số điện thoại
        <br>
        <input type="text" name="phone_number">
        <br>
        Địa chỉ
        <br>
        <input type="text" name="address">
        <br>
        password
        <br>
        <input type="password" name="password">
        <br><br>
        <button>Đăng kí</button>
    </form>
    <p style="text-align: center;">
        Đã có tài khoản. 
        <a href="./login.php">đăng nhập</a>
    </p>
</body>
</html>