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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
    }
    body {
        width: 100%;
    }
    .mat_hang{
        width: 990px;
        margin: auto;
    }
    .The_hang{
        width: 290px;
        margin: 20px;
        float: left;
        border-radius: 10px;
        overflow: hidden;
        background-color: #a6e3c4;
    }
    .anh_mo_ta img {
        width: 100%;
        height: 100%;
        object-fit: center;
    }
    .The_hang button{
        width: 80px;
        height: 30px;
        margin: 20px;
    }
    .anh_mo_ta{
        width: 100%;
        height: 200px;
        overflow: hidden;
    }
    form{
        margin: auto;
        width: 900px;
        margin-top: 40px;
    }
    .user{
        width: 200px;
        float: right;
        margin-right: 230px;
        transform: translateY(40px);
        text-align: right;
    }
</style>
<body>
<?php
        require "./admin/connectMySql.php";
        $ma_mat_hang = '';
        $name = '';
        if (isset($_GET["name"])){
            $name = $_GET["name"];
        }

        $sql = "SELECT mat_hang.*,type.name as nameType, type.ma as ma_mat_hang
        FROM mat_hang
        JOIN type on mat_hang.type = type.ma
        where mat_hang.name like '%$name%'";

        if (isset($_GET["ma_mat_hang"])){
            $ma_mat_hang = $_GET["ma_mat_hang"];
            if ($ma_mat_hang != ""){
                $sql = "SELECT mat_hang.*,type.name as nameType, type.ma as ma_mat_hang
                FROM mat_hang
                JOIN type on mat_hang.type = type.ma
                WHERE (type.ma = '$ma_mat_hang') and (mat_hang.name like '%$name%')";
            }
        }
        $option = mysqli_query($connection,"SELECT * FROM `type`");
        $ket_qua = mysqli_query($connection,$sql);
        mysqli_close($connection);
    ?>
    <h1 style="text-align: center;">Nhà Hàng Công Hạnh</h1>
    <br>
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
    <form method="get" action="">
        Tên
        <input type="text" name="name" value="<?php echo $name?>">
        <br>
        Thể loại
        <select name="ma_mat_hang">
            <?php foreach ($option as $kq) { ?>
                <?php if ( $ma_mat_hang == $kq['ma']) { ?>
                    <option value="<?php echo $kq['ma']?>"><?php echo $kq['name']?></option>
                <?php } ?>
            <?php } ?>
            <option value="">Mời bạn chọn thể loại</option>
            <?php foreach ($option as $kq) { ?>
                <?php if ( $ma_mat_hang != $kq['ma']) { ?>
                    <option value="<?php echo $kq['ma']?>"><?php echo $kq['name']?></option>
                <?php } ?>
            <?php } ?>
        </select>
        <br>
        <button>Tìm kiếm</button>
    </form>
    <?php foreach ($ket_qua as $kq) { ?>
    <div class="mat_hang">
        <div class = "The_hang">
            <div class = "anh_mo_ta">
                <img src="./admin/<?php echo $kq['image']?>" alt="">
            </div>
            <h3 style="margin: 10px"><?php echo $kq['name']?></h3>
            <p style="margin-left: 10px">Giá: <?php echo $kq['price']?>$</p>
            <button>
                <a href="./xem_chi_tiet.php?id=<?php echo $kq['id']?>">Xem chi tiết</a>
            </button>
            <button onclick="Dat_hang(<?php echo $kq['id']?>)">
                Đặt hàng
            </button>
        </div>
    </div>
    <?php } ?>
    <form id="buy" method="post" action="./mua_san_pham.php"></form>
</body>
<script>
    function Dat_hang(id){
        var a =document.getElementById('buy');
        a.innerHTML = `<input type="hidden" name="id" value= `+id+`>`;
        a.submit();
    }
</script>
</html>