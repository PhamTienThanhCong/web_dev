<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>member</title>
</head>

<style>
    h1{
        text-align: center;
    }
    table{
        width: 100%;
    }
    table, th, td {
        border: 1px solid black;
    }
</style>

<body>
    <h1>Tất cả Thành viên</h1>

    <?php
    // kết nối
        $connection = mysqli_connect('localhost','root','cong','member');
        mysqli_set_charset($connection,'utf8');

        $mysql = "select * from membership";

        $ketqua = mysqli_query($connection,$mysql);

        mysqli_close($connection);
    ?>

    <table>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>giới tính</th>
            <th>Khóa</th>
        </tr>
        <?php foreach ($ketqua as $member){?>
            <tr>
                <th><?php echo $member['stt']?></th>
                <th><a href="./view_one_member.php?stt=<?php echo $member['stt']?>">
                    <?php echo $member['name']?>
                </a></th>
                <th><?php
                     if ($member['sex'] == 0){
                         echo "Nữ";
                     }else if ($member['sex']== 1){
                         echo "Nam";
                     }else{
                         echo "know";
                     }
                ?></th>
                <th>K<?php echo $member['grade']?></th>
            </tr>
        <?php } ?>
    </table>
    <a href="./form_register.html">Quay lại đăng ký</a>
</body>
</html>