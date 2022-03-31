<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo bài đăng mới</title>

</head>
<body>
    <?php
        $ma = $_GET['ma'];
        require "connect.php";
        $mysql = "select * from post_facebook where ma='$ma'";

        $post_raw = mysqli_query($connection,$mysql);
        $post = mysqli_fetch_array($post_raw);

        mysqli_close($connection);
    ?>
    <h2>Sửa bài đăng có tên: <?php echo $post['name']?></h2>
    <form method="post" action="edit_sever.php">
        - Tên
        <br>
        <input type="hidden" name="ma"  value="<?php echo $ma?>">
        <input type="text" name="name" value="<?php echo $post['name']?>">
        <br>
        - Nội dung:
        <br>
        <textarea name="content" cols="30" rows="10"><?php echo $post['content']?></textarea>
        <br>
        - ảnh minh họa
        <br>
        <input type="text" name="image" value="<?php echo $post['image']?>">
        <br>
        <button>sửa bài đăng</button>
    </form>
    <a href="./show_all_post.php">back</a>
</body>
</html>