<?php
    session_start();
    require "./sever/connectMySql.php";
    if (isset($_COOKIE['user'])){
        $id = $_COOKIE['user'];
        $sql = "SELECT * FROM `user` WHERE `token` = '$id'";
        $kq = mysqli_query($connection,$sql);
        $userAccess = mysqli_fetch_array($kq);
        $_SESSION['user'] = $userAccess['name'];
        $_SESSION['id'] = $userAccess['id'];
    }
    $gio_hang = 0;
    if (isset($_SESSION['gio_hang'])){
        $gio_hang = $_SESSION['gio_hang'];
    }
    $Tong = 0;

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
    .user{
            width: 200px;
            float: right;
            margin-right: 50px;
            text-align: right;
        }
    body{
        width: 100%;
    }
    table{
        margin: auto;
        margin-top: 50px;
    }
</style>
<body>
    <h2 style="text-align: center;">Kho hàng của tôi</h2>
    <div class="user">
    <?php
            if (empty($_SESSION['user'])==false){ ?>
                Xin chào <?php echo $_SESSION['user']?>
                <br>
                <a href="./my_account.php">Trang cá nhân</a>
                <br>
                <a href="./sever/singout.php">Đăng xuất</a>
            <?php }else { ?>
            Bạn chưa có tài khoản
            <br>
            <a href="./login.php">Đăng nhập</a>
            <br>
            <a href="./register.php">Đăng kí</a>
    <?php } ?>  
    </div>
    <a style="margin-left: 50px;" href="../index.php">Quay lại mua sắm</a>
    <br>
    <h3 style="text-align: center;">
    <?php
            if (empty($_SESSION['alert'])==false){
                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
            }
    ?>
    </h3>
    <table border="1" width="95%" cellsp>
        <tr>
            <th>Tên</th>
            <th>Ảnh</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng giá</th>
            <th>Xem</th>
            <th>Xóa</th>
        </tr>
        <?php if(isset($_SESSION['gio_hang'])) { ?>
        <?php foreach ($gio_hang as $id => $san_phan) { ?>
            <?php $Tong = $Tong + $san_phan['price'] * $san_phan['so_luong'] ?>
            <tr>
                <th><?php echo $san_phan['name']?></th>
                <th>
                    <img height= 100px src="../admin/<?php echo $san_phan['image']?>" alt="">
                </th>
                <th>
                    <a style="text-decoration: none;" href="./sever/sua_gio_hang.php?id=<?php echo $id?>&type=1">-</a>
                    <?php echo $san_phan['so_luong']?>
                    <a style="text-decoration: none;" href="./sever/sua_gio_hang.php?id=<?php echo $id?>&type=2">+</a>
                </th>
                <th><?php echo $san_phan['price']?>$</th>
                <th><?php echo ($san_phan['price'] * $san_phan['so_luong'])?>$</th>
                <th>
                    <a href="../xem_chi_tiet.php?id=<?php echo $id?>">Xem</a>
                </th>
                <th>
                    <a href="./sever/sua_gio_hang.php?id=<?php echo $id?>&type=3">Xóa</a>
                </th>
            </tr>
        <?php } ?>
    </table>
    <?php } else { ?>
        </table>
        <h3 style="text-align: center;">Giỏ hàng của bạn trống.
            <a style="text-align: center;" href="../index.php">
            mua sắm ngay tại đây</a>
        </h3>
    <?php } ?>
    <br>
    <h3>Đăng kí đặt hàng</h3>
    <i>Số Tiền phải trả: <?php echo $Tong?> $ </i>
    <?php
        if (isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM `user` WHERE `id` = '$id'";
            $member = mysqli_query($connection,$sql);
            $member = mysqli_fetch_array($member);
    ?>
    <?php if(isset($_SESSION['gio_hang'])) { ?>
    <form method="post" action="./sever/order.php">
        <br>
        Tên người nhận:
        <br>
        <input type="text" name="name" value="<?php echo $member['name']?>">
        <br>
        Số điện thoại người nhận:
        <br>
        <input type="text" name="phone_number" value="<?php echo $member['phone_number']?>">
        <br>
        Địa chỉ người nhận:
        <br>
        <input type="text" name="address" value="<?php echo $member['address']?>">
        <br>
        <button>Đặt hàng</button>
    </form>
    <?php } else { ?>
        <br><br>
        Giỏ hàng trống bạn cần mua sắm để thanh toán
    <?php } ?>
    <?php } else { ?>
        <br><br>
        Bạn cần đăng nhập để đặt hàng. <a href="./login.php">Đăng nhập tại đây</a>
    <?php } ?>
</body>
</html>