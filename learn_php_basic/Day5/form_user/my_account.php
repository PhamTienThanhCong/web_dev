<?php
    session_start();
    if (isset($_COOKIE['user'])){
        $id = $_COOKIE['user'];
        include "./sever/connectMySql.php";
        $sql = "SELECT * FROM `user` WHERE `token` = '$id'";
        $kq = mysqli_query($connection,$sql);
        $userAccess = mysqli_fetch_array($kq);
        $_SESSION['user'] = $userAccess['name'];
        $_SESSION['id'] = $userAccess['id'];
        // mysqli_close($connection);
    }
    if (empty($_SESSION['user'])){
        $_SESSION['alert'] = "Bạn phải đăng nhập";
        header('Location: ./login.php');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my account</title>
</head>
<style>
    body{
        width: 100%;
        background-color: #ccc;
    }
    .user{
        width: 320px;
        margin: auto;
        background-color: #eaeae1;
        height: 500px;
        border-radius: 20px;
        margin-top: 50px;
        padding: 20px;
    }
    .form-control{
        /* margin-left: 20px; */
        border: none !important;
        background-color: transparent !important;
        outline: none !important;
    }
    label{
        margin-left: 10px;
        width: 50px;
        display: inline-block;
    }
</style>
<body>
    <form class="user">
        <h2 style="text-align: center;">Thông tin cá nhân của tui</h2>
        <?php 
            include "./sever/connectMySql.php";
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM `user` WHERE `id` = '$id'";
            $kq = mysqli_query($connection,$sql);
            $kq = mysqli_fetch_array($kq);
        ?>
        <br>
        <label>Tên:</label>
        <input readonly type="hidden" name="id" value="<?php echo $kq['id'] ?>">
        <input readonly id="name" class="form-control" type="text" name="name" value="<?php echo $kq['name'] ?>">
        <br>
        <label>email:</label>
        <input readonly id="email" class="form-control" type="email" name="email" value="<?php echo $kq['email'] ?>">
        <br>
        <br>
        <a href="../index.php">Quay lại mua sắm</a>
        <br>
        <a href="./gio_hang.php">Giỏ hàng của tôi</a>
        <br>
        <button type="button" onclick="change()" >Thay đổi thông tin </button>
    </form>
</body>
<script>
    function change() {
        document.getElementById("name").setAttribute("readonly","false");
    }
</script>
</html>