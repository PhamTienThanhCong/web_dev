<?php
    $ma = $_POST['ma'];
    $name = $_POST['name'];
    $content = $_POST['content'];
    $image = $_POST['image'];

    require "connect.php";

    $mysql = "UPDATE post_facebook
    SET `name`='$name',`content`='$content',`image`='$image'
    WHERE `ma`=$ma";

    mysqli_query($connection,$mysql);

    mysqli_close($connection);

    echo ("<a href='./show_all_post.php'>back</a>");