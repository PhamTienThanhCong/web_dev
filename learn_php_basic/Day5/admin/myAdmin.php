<?php  
    session_start();
    if (isset($_SESSION['user'])==false){
        header('Location: ./check_loout.php');
    }
    if (isset($_SESSION['lever'])==false){
        header('Location: ./index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Admin</title>
</head>
<body>
    <h2>admin</h2>
    Hello: <?php echo $_SESSION['user']?>
    <br>
    <a href="../index.php">Trang chủ</a>
    <br>
    <a href="./check_loout.php">Đăng xuất</a>
    <br>
    <a href="./type/manage_type.php">Quản lý các loại mặt hàng</a>
    <br>
    <a href="./mat_hang/manage_mat_hang.php">Quản lý các mặt hàng</a>
    <br>
    <a href="./don_hang/don_hang.php">Quản lý đơn hàng</a>
    
</body>
</html>