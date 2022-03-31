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
    ?>
    <br><br>
    <form method="post" action="./sever/save_mat_hang.php" enctype="multipart/form-data">
        Tên mặt hàng
        <input type="text" name="name">
        <br>
        Ảnh mô tả
        <input type="file" name="image">
        <br>
        Mô tả mặt hàng 
        <br>
        <textarea name="description"cols="30" rows="10"></textarea>
        <br>
        Giá
        <input type="number" name="price">
        <br>
        Lựa chọn thể loại
        <select name="type">
            <?php foreach($type as $t) { ?>
                <option value="<?php echo $t['ma']?>"><?php echo $t['name']?></option>
            <?php } ?>
        </select>
        <br>
        <button>Thêm</button>
    </form>
</body>
</html>