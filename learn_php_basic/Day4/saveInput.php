<?php
    $name = $_POST['name'];
    $content = $_POST['content'];
    $image = $_POST['image'];

    require 'connect.php';

    $sqlsave = "INSERT INTO `post_facebook`( `name`, `content`, `image`)
    VALUES ('$name','$content','$image')";

    mysqli_query($connection,$sqlsave);

    $loi = mysqli_error($connection);

    mysqli_close($connection);

    echo ("<a href='./formCreate.html'>trở lại </a>");