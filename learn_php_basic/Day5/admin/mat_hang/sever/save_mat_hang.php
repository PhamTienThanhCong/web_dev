<?php
$name = $_POST['name'];
$image = $_FILES['image'];
$description = $_POST['description'];
$price = $_POST['price'];
$type = $_POST['type'];

// thư mục lưu file
$target_dir = "../../uploads/";
// lấy đặt tên file 
$target_file = $target_dir . basename($image["name"]);
// Lấy đuôi mở rộng
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// đặt lại tên file 
$ramdomValue = time();
$fileImageName = "$name"."$ramdomValue"."."."$imageFileType";
$target_file = $target_dir . basename($fileImageName);

// Lưu file
move_uploaded_file($image["tmp_name"], $target_file);

// Đổi tên file cho dễ use
$fileImageName = "uploads/".$fileImageName;


require "../../connectMySql.php";

$sql = "INSERT INTO `mat_hang`(`name`, `image`, `description`, `price`, `type`) 
VALUES ('$name','$fileImageName','$description','$price','$type')";

mysqli_query($connection, $sql);

echo mysqli_error($connection);

mysqli_close($connection);

header("Location: ../manage_mat_hang.php");