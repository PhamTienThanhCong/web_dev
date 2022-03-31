<?php  
    require "../check_login/check_admin.php";
    if ($_SESSION['lever']!=2){
        header("Location: ../check_loout.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo các thể loại mới</title>
</head>
<body>
    <h2>Thêm nhóm mặt hàng mới</h2>
    <?php
        require "../folder/header.php";
    ?>
    <br>
    <br>
    <form method="post" action="./sever/save_type.php">
        Tên nhóm
        <input type="text" name="name">
        <br>
        <button>Thêm</button>
    </form>
</body>
</html>