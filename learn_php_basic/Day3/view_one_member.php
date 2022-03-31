<?php
    $stt = $_GET['stt'];
    // kết nối database
    $connection = mysqli_connect('localhost','root','cong','member');
    mysqli_set_charset($connection,'utf8');

    // lấy dữ liệu từ db
    $mysql = "select * from membership where stt='$stt'";
    $ketqua = mysqli_query($connection,$mysql);
    
    // chuyển từ array về duy nhất
    $member = mysqli_fetch_array($ketqua);
    mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    .size-1,.size-2{
        width: 400px;
        display: inline-block;
    }
    
</style>

<body>
    <h3>Thôn tin thành viên mới: </h3>
    <a href="./view_all_member.php">Quay lại</a>
    <br>
    <div class="size-1">
        <div>Tên: <?php echo $member['name']?></div>
        <div>Giới tính: <?php 
            if ($member['sex']==1){
                echo "Nam";
            }else if ($member['sex']==0){
                echo "Nữ";
            }else{
                echo "Ai biết đâu được";
            }
            ?>
        </div>
        <div>Năm sinh: <?php echo $member['age']?></div>
        <div>là sinh viên khóa: K<?php echo $member['grade']?></div>
        <p>Giới thiệu bản thân: <?php echo $member['myself']?></p>
    </div>
    <div class="size-2">
        <img width="100%" src="<?php echo $member['image']?>" alt="">
    </div>

</body>
</html>