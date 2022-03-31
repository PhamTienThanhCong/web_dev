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
    <title>Document</title>
</head>
<body>
    <?php
        require "../folder/header.php";
        require "../connectMySql.php";
        $sql = "SELECT n.*,
        COALESCE(t.typeCount, 0) AS typeCount
        FROM type n
        LEFT JOIN
        (
            SELECT type, COUNT(*) AS typeCount
            FROM mat_hang
            GROUP BY type
        ) t
            ON n.ma = t.type
        ";
        $ket_qua = mysqli_query($connection,$sql);
        mysqli_close($connection);
    ?>
    <br>
    <h2>Quản lý các loại mặt hàng</h2>    
    <a href="./create_type.php">Thêm thể loại</a>
    <br><br>
    <table border="1" width="100%" cellsp>
        <tr>
            <th>STT</th>
            <th>Loại</th>
            <th>Số Lượng</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php foreach($ket_qua as $key=>$kq){ ?>
            <tr>
                <th><?php echo ($key+1)?></th>
                <th><?php echo $kq['name']?></th>
                <th>
                    <a href="../mat_hang/manage_mat_hang.php?ma_mat_hang=<?php echo $kq['ma']?>">
                        <?php echo $kq['typeCount']?> sản phẩm
                    </a>
                </th>
                <th>
                    <a href="./update.php?id=<?php echo $kq['ma']?>">Sửa</a>
                </th>
                <th>
                    <a style="cursor: pointer;" onclick="deleteFormSubmit(<?php echo $kq['ma']?>)">xóa</a>
                </th>
            </tr>
        <?php } ?>
    </table>
    <form id="form" method="post" action="./sever/delete_sever.php"></form>
</body>
<script>
    function deleteFormSubmit(id){
        a = document.getElementById('form');
        a.innerHTML = "<input type='hidden' name='ma' value='"+id+"''>";
        a.submit();
    }
</script>
</html>