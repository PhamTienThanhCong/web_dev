<?php  
    require "../check_login/check_admin.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mặt hàng</title>
</head>
<body>
    <h2>Thêm mặt hàng mới</h2>
    <?php
        require "../folder/header.php";
        require "../connectMySql.php";
        $sql = "SELECT * FROM `type`";
        $type = mysqli_query($connection,$sql);

        $id = $_GET["id"];

        $sql = "SELECT mat_hang.*,type.name as nameType, type.ma as ma_mat_hang FROM mat_hang
        JOIN type on mat_hang.type = type.ma
        WHERE mat_hang.id = '$id'";

        $mat_hang = mysqli_query($connection,$sql);
        $mat_hang = mysqli_fetch_array($mat_hang);

        mysqli_close($connection);
    ?>
    <br><br>
    <form method="post" action="./sever/update_sever.php" enctype="multipart/form-data">
        <input type="hidden" name = "id" value="<?php echo $id ?>">
        <input type="hidden" name = "image_name" value="<?php echo $mat_hang['image'] ?>">
        Tên mặt hàng
        <input type="text" name="name" value="<?php echo $mat_hang['name'] ?>">
        <br>
        Ảnh mô tả
        <input type="file" name="image">
        <br>
        <img height= 100px src="../<?php echo $mat_hang['image']?>" alt="">
        <br>
        Mô tả mặt hàng 
        <br>
        <textarea name="description"cols="30" rows="10"><?php echo $mat_hang['description'] ?></textarea>
        <br>
        Giá
        <input type="number" name="price" value="<?php echo $mat_hang['price'] ?>">
        <br>
        Lựa chọn thể loại
        <select name="type">
            <?php foreach ($type as $kq) { ?>
                <?php if ( $mat_hang['ma_mat_hang'] == $kq['ma']) { ?>
                    <option value="<?php echo $kq['ma']?>"><?php echo $kq['name']?></option>
                <?php } ?>
            <?php } ?>
            <option value="">Mời bạn chọn thể loại</option>
            <?php foreach ($type as $kq) { ?>
                <?php if ( $mat_hang['ma_mat_hang'] != $kq['ma']) { ?>
                    <option value="<?php echo $kq['ma']?>"><?php echo $kq['name']?></option>
                <?php } ?>
            <?php } ?>
        </select>
        <br>
        <button>Sửa</button>
    </form>
</body>
</html>