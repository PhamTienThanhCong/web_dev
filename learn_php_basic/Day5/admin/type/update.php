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
    <title>Chỉnh Sửa</title>
</head>
<body>
    <h2>Chỉnh sửa nhóm mặt hàng</h2>
    <?php
        require "../folder/header.php";
        require "../connectMySql.php";
        $id = $_GET["id"];
        $sql = "SELECT * FROM `type` 
        WHERE `ma` = '$id'";
        $ket_qua = mysqli_query($connection,$sql);
        $ket_qua = mysqli_fetch_array($ket_qua);
    ?>
    <br>
    <br>
    <form method="post" action="./sever/update_sever.php">
        Tên nhóm
        <input type="hidden" name="ma" value="<?php echo $ket_qua['ma']?>">
        <input type="text" name="name" value="<?php echo $ket_qua['name']?>">
        <br>
        <button>Sửa</button>
    </form>
</body>
</html>