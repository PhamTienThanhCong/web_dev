<?php 
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        width: 100%;
    }
    .container{
        width: 800px;
        margin: auto;
    }
    .user{
        width: 200px;
        float: right;
        margin-right: 280px;
        transform: translateY(85px);
        text-align: right;
    }
</style>
<body>
    <h1 style="text-align: center;">Nhà Hàng Công Hạnh</h1>
    <?php 
        require "./admin/connectMySql.php";

        $id = $_GET['id'];

        $sql = "SELECT mat_hang.*,type.name as nameType
        FROM mat_hang
        JOIN type on mat_hang.type = type.ma
        where mat_hang.id like '$id'";
        $ket_qua = mysqli_query($connection,$sql);
        $ket_qua = mysqli_fetch_array($ket_qua);
        mysqli_close($connection);
    ?>
    <br><br>
    <?php if(isset($_SESSION['alert'])){ ?>
            <p style="text-align: center; font-size: 20px; color: green"><?php echo $_SESSION['alert']?></p>
            <?php unset($_SESSION['alert']); ?>
    <?php } ?>
    
    <div class="user">
    <?php
            if (empty($_SESSION['user'])==false){ ?>
                Xin chào <?php echo $_SESSION['user']?>
                <br>
                <a href="./form_user/my_account.php">Trang cá nhân</a>
                <br>
                <a href="./form_user/sever/singout.php">Đăng xuất</a>
            <?php }else { ?>
            Bạn chưa có tài khoản
            <br>
            <a href="./form_user/login.php">Đăng nhập</a>
            <br>
            <a href="./form_user/register.php">Đăng kí</a>
    <?php } ?>  
    <br>
    <a href="./form_user/gio_hang.php">giỏ hàng</a>
    </div>
    <div class="container">
        <h2>Món Ăn: <?php echo $ket_qua['name']?></h2>
        <p>Mặt hàng loại: <?php echo $ket_qua['nameType']?></p>
        <p>Giá: <?php echo $ket_qua['price']?></p>
        <a href="./index.php">quay lai trang chủ</a>
        <br>
        <br>
        <?php if(isset($_SESSION['gio_hang'][$ket_qua['id']]['so_luong'])){ ?>
            <p style="text-align: center; font-size: 18px;">
                Bạn đã đặt 
                <?php echo $_SESSION['gio_hang'][$ket_qua['id']]['so_luong']?> 
                sản phần này. 
                <a href="./form_user/gio_hang.php">Xem chi tiết</a>
            </p>
        <?php } ?>
        <img width="100%" src="./admin/<?php echo $ket_qua['image']?>" alt="">
        <br>
        <p>Mô tả: <?php echo nl2br($ket_qua['description'])?></p>
        <button onclick="Dat_hang(<?php echo $ket_qua['id']?>)">
                Đặt hàng
        </button>
    </div>
</body>
<form id="buy" method="post" action="./mua_san_pham.php"></form>
<script>
    function Dat_hang(id){
        var a =document.getElementById('buy');
        a.innerHTML = `<input type="hidden" name="id" value= `+id+`>`;
        a.submit();
    }
</script>
</html>