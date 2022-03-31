<?php  
    require "../check_login/check_admin.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require "../folder/header.php";
        require "../connectMySql.php";
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
    <br>
    <h2>Quản lý các mặt hàng</h2>    
    <a href="./create_mat_hang.php">Thêm mặt hàng</a>
    <br><br>
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
        <button>Lọc</button>
    </form>
    <table border="1" width="100%" cellsp>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Minh họa</th>
            <th>Thể loại</th>
            <th>Giá</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php foreach($ket_qua as $key=>$kq) { ?>
            <tr>
                <th><?php echo ($key+1) ?></th>
                <th><?php echo $kq['name'] ?></th>
                <th>
                    <img height= 100px src="../<?php echo $kq['image']?>" alt="">
                </th>
                <th><?php echo $kq['nameType']?></th>
                <th><?php echo $kq['price'] ?>$</th>
                <th>
                    <a href="./update.php?id=<?php echo $kq['id']?>">Sửa</a>
                </th>
                <th>
                    <a style="cursor: pointer;" onclick="deleteFormSubmit(<?php echo $kq['id']?>)">xóa</a>
                </th>
            </tr>
        <?php } ?>
    </table>
    <form id="form" method="post" action="./sever/delete_sever.php"></form>
</body>
<script>
    function deleteFormSubmit(id){
        a = document.getElementById('form');
        a.innerHTML = "<input type='hidden' name='id' value='"+id+"''>";
        a.submit();
    }
</script>
</html>