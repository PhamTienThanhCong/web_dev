<?php  
    require "../check_login/check_admin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng</title>
</head>
<body>
<h2 style="text-align: center;">Quản lý đơn hàng</h2>

<?php 
    require "../folder/header.php"; 
    require "../connectMySql.php";
    $sql = "SELECT oder.*, user.name as name , user.phone_number as phone FROM oder
    JOIN user on oder.id_customer = user.id";
    $don_hang = mysqli_query($connection,$sql);
?>
<br>
<br>

<table border="1" width="95%" cellsp>
        <tr>
            <th>STT</th>
            <th>Tên Người đặt</th>
            <th>Tên người nhận</th>
            <th>SĐT Người nhận</th>
            <th>Địa chỉ nhận hàng</th>
            <th>Thời gian đặt</th>
            <th>Giá</th>
            <th>Trạng thái</th>
            <th>Xem chi tiết</th>
            <?php if ($_SESSION['lever']==2) { ?>
            <th>Hoạt động</th>
            <?php } ?>
        </tr>
        <?php foreach($don_hang as $index=>$kq) { ?>
            <tr>
                <th><?php echo $index+1;?></th>
                <th><?php echo $kq['name'] ?></th>
                <th><?php echo $kq['phone'] ?></th>
                <th><?php echo $kq['name_customer'] ?></th>
                <th><?php echo $kq['address_customer'] ?></th>
                <th>
                    <?php echo date("H:i d/m/Y", strtotime($kq['created_at'])) ?>
                </th>
                <th><?php echo $kq['total_price'] ?>$</th>
                <th>
                    <?php 
                        if ($kq['status'] == 0 ){
                            echo "Mới đặt";
                        }elseif ($kq['status'] == 1 ){
                            echo "Đang giao";
                        }elseif ($kq['status'] == 2 ){
                            echo "Đã giao";
                        }elseif ($kq['status'] == -1 ){
                            echo "Đã hủy";
                        }
                    ?>
                </th>
                <th>
                    <a href="./don_hang_chi_tiet.php?id=<?php echo $kq['id'] ?>">Xem</a>
                </th>
                <?php if ($_SESSION['lever']==2) { ?>
                <th>
                    <?php if($kq['status'] == 0 ) { ?>
                        <a href="./xac_nhan_don.php?type=1&id=<?php echo $kq['id'] ?>">Xác nhận</a>
                        <br>
                        <a href="./xac_nhan_don.php?type=0&id=<?php echo $kq['id'] ?>">Hủy</a>
                    <?php }elseif($kq['status'] == 1) { ?>
                    <a href="./xac_nhan_don.php?type=2&id=<?php echo $kq['id'] ?>">Đã đến</a>
                    <?php } else {
                        echo "...";
                    } ?>
                </th>
                <?php } ?>
            </tr>
        <?php } ?>
</table>
</body>
</html>