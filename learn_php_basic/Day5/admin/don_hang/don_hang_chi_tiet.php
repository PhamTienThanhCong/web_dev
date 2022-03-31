<?php  
    require "../check_login/check_admin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem chi tiêt</title>
</head>
<body>
    <h2 style="text-align: center;">Xem chi tiết đơn hàng</h2>

    <?php 
        $id = addslashes($_GET["id"]);
        require "../folder/header.php"; 
        require "../connectMySql.php";
        $sql = "SELECT order_detail.*, mat_hang.name as name , mat_hang.image as img , mat_hang.price as price
        FROM order_detail
        JOIN mat_hang on order_detail.id_product = mat_hang.id
        WHERE id_order = '$id'";
        $don_hang = mysqli_query($connection,$sql);
    ?>
    <br><br>
    <a href="./don_hang.php"><<< Trở lại</a>
    <br><br>
    <table border="1" width="95%" cellsp>
        <tr>
            <th>Stt</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
        </tr>
        <?php foreach($don_hang as $index => $kq) { ?>
            <tr>
                <th><?php echo $index+1 ?></th>
                <th><?php echo $kq['name'] ?></th>
                <th>
                    <img height= 100px src="../<?php echo $kq['img'] ?>" alt="">
                </th>
                <th><?php echo $kq['quantily'] ?></th>
                <th><?php echo $kq['price'] ?></th>
            </tr>
        <?php } ?>
    </table>
</body>
</html>