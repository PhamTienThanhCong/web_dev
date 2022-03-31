<?php
$id = $_POST['id'];
$name = $_POST['name'];
$image = $_FILES['image'];
$image_name = $_POST['image_name'];
$description = $_POST['description'];
$price = $_POST['price'];
$type = $_POST['type'];

// Lưu file
move_uploaded_file($image["tmp_name"], "../../".$image_name);

require "../../connectMySql.php";

$sql = "UPDATE `mat_hang` 
SET `name`='$name',`description`='$description',`price`='$price',`type`='$type' 
WHERE id = '$id'";

mysqli_query($connection, $sql);

echo mysqli_error($connection);

mysqli_close($connection);

header("Location: ../manage_mat_hang.php");