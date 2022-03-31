<?php
    $ma = $_POST['ma'];

    require "connect.php";

    $mysql = "DELETE FROM `post_facebook` WHERE ma='$ma'";

    mysqli_query($connection,$mysql);

    mysqli_close($connection);

    echo ("<a href='./show_all_post.php'>back</a>");