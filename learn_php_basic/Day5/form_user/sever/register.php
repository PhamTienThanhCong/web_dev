<?php

$name = addslashes($_POST['name']);
$email = addslashes($_POST['email']);
$phone_number = addslashes($_POST['phone_number']);
$address = addslashes($_POST['address']);
$password = addslashes($_POST['password']);

require "./connectMySql.php";

$sqlCheck = "SELECT count(*) as `number` FROM `user`
WHERE `email` = '$email'";

$emailCheck = mysqli_query($connection,$sqlCheck);
$emailCheck = mysqli_fetch_array($emailCheck);
session_start();

if ($emailCheck['number'] != 0){
    $_SESSION['alert'] = "Email này đã được sử dụng";
    header("Location: ../register.php");
    exit();
}

$sql = "INSERT INTO `user`(`name`, `email`, `phone_number`, `address` , `password`) 
VALUES ('$name','$email','$phone_number', '$address' ,'$password')";

mysqli_query($connection,$sql);
mysqli_close($connection);
$_SESSION['alert'] = "Tạo Tài Khoản thành công vui lòng đăng nhập";
header("Location: ../login.php");