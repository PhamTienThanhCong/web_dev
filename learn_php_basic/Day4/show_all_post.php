<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post</title>
</head>
<body>
    <?php
        $so_bai_trong_mot_trang = 2;
        $so_trang_hien_tai = 1;
        $tim_kiem = "";

        if (isset($_GET['search'])){
            $tim_kiem = $_GET['search'];
        }
        if (isset($_GET["trang"])){
            $so_trang_hien_tai = $_GET["trang"];
        }

        require "connect.php";
        $mysql_count = "select count(*) as so_luong from post_facebook
        where name like '%$tim_kiem%'
        ";

        $so_luong_bai_dang = mysqli_query($connection,$mysql_count);
        $so_luong_bai_dang = mysqli_fetch_array($so_luong_bai_dang);

        $Tong_so_trang = ceil($so_luong_bai_dang['so_luong']/$so_bai_trong_mot_trang);
        $lay_tu_bai_dang_thu = ($so_trang_hien_tai-1)*$so_bai_trong_mot_trang;
 
        $mysql = "select * from post_facebook
        where name like '%$tim_kiem%'
        limit $so_bai_trong_mot_trang offset $lay_tu_bai_dang_thu";

        $allpost = mysqli_query($connection,$mysql);
        mysqli_close($connection);
    ?>
    <h2 style="text-align:center">Toàn bộ gái nhà</h2>
    <form method="get" action="">
        <input type="text" name="search"  value="<?php echo $tim_kiem ?>">
    </form>
    <table width="100%" border=1>
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Ảnh minh họa</th>
            <th>Công cụ</th>
        </tr>
        <?php foreach($allpost as $post) {?>
            <tr>
                <th>
                    <?php echo($post['ma'])?>
                </th>
                <th>
                    <a href="show_one_post.php?ma=<?php echo($post['ma'])?>"><?php echo($post['name'])?></a>
                </th>
                <th>
                    <img height="150" src="<?php echo($post['image'])?>" alt="">  
                </th>
                <th>
                    <a href="./edit.php?ma=<?php echo($post['ma'])?>">Sửa</a>
                    <a type="button" onclick="test(<?php echo($post['ma'])?>)" style="cursor: pointer;">Xóa</a>
                </th>
            </tr>
        <?php } ?>
    </table>
    <?php for($i=1;$i<$so_trang_hien_tai;$i++) { 
        if ($tim_kiem == ""){
            echo ("<a href='?trang=$i'>$i</a>");
        } else{
            echo ("<a href='?search=$tim_kiem&trang=$i'>$i</a>");
        }
    ?>
    <?php } ?>
    <?php 
    if ($tim_kiem == ""){
        echo ("<a style='color:red' href='?trang=$i'>$i</a>");
    } else{
        echo ("<a style='color:red' href='?search=$tim_kiem&trang=$i'>$i</a>");
    }
    for($i=$so_trang_hien_tai+1;$i<=$Tong_so_trang;$i++) {
        if ($tim_kiem == ""){
            echo ("<a href='?trang=$i'>$i</a>");
        } else{
            echo ("<a href='?search=$tim_kiem&trang=$i'>$i</a>");
        }
    } ?>
        

</body>
<form method="post" action="./delete_sever.php" id="delete"></form>
<a href="./formCreate.html">post</a>
<script>
    function test(ma){
        const deletePost = document.getElementById("delete");
        deletePost.innerHTML = "<input type='hidden' name='ma'  value="+ma+">"
        deletePost.submit()
    }
</script>
</html>