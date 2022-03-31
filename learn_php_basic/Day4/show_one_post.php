<?php
    require "connect.php";
    $ma = $_GET['ma'];
    $mysql = "select * from post_facebook where ma='$ma'";
    $post = mysqli_query($connection,$mysql);
    $post = mysqli_fetch_array($post);
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
    body {
        width: 100%;
    }
    .container{
        width: 600px;
        margin: auto;
    }
    .avata{
        width: 50px;
        height: 50px;
        display: inline-block;
        transform: translateY(20px);
        border-radius: 50%;
        overflow: hidden;
    }
    h3{
        display: inline-block;
    }
</style>

<body>
    <div class="container">
        <div class="avata"><img width="100%" src="<?php echo $post['image']?>" alt=""></div>
        <h3><?php echo $post['name']?></h3>
        <p><?php echo nl2br($post['content'])?></p>
        <img width="100%" src="<?php echo $post['image']?>" alt="">
        <a href="./show_all_post.php">back</a>
    </div>
</body>
</html>