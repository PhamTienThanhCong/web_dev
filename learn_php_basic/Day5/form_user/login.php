<?php session_start();
    if (isset($_COOKIE['user'])){
        $id = $_COOKIE['user'];
        require "./sever/connectMySql.php";
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
    <title>Đăng nhập</title>
</head>
<style>
    body{
        width: 100%;
    }
    form{
        width: 350px !important;
        margin: auto;
        margin-top: 50px;
    }
    form input{
        width: 100%;
    }
</style>
<body>
    <h1 style="text-align: center;">Nhà Hàng Công Hạnh</h1>
    <form method="post" action="./sever/login.php">
        <h2 style="text-align: center;">Đăng Nhập</h2>
        <?php
            if (empty($_SESSION['alert'])==false){
                echo "<br>";
                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
                echo "<br>";
                echo "<br>";
            }
        ?>
        Email
        <input type="email" name="email">
        <br><br>
        Mật khẩu
        <input type="password" name="password">
        <br><br>
        Gi nhớ đăng Nhập
        <input style="width: 20px" type="checkbox" name="remember">
        <br><br>
        <button>Đăng nhập</button>
        <br>
        <p>Bạn chưa có tài khoản. 
            <a href="./register.php">Đăng kí</a>
        </p>
    </form>
</body>
</html>