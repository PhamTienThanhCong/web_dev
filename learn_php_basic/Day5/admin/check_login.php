<?php

$email = addslashes($_POST['email']);
$password = addslashes($_POST['password']);

require "./connectMySql.php";

$sqlCheck = "SELECT * FROM `admin`
WHERE (`email` = '$email') and (`password` = '$password')";

$admin = mysqli_query($connection,$sqlCheck);
$admin = mysqli_fetch_array($admin);

mysqli_close($connection);

session_start();

if (isset($admin['id'])){
    $_SESSION['user'] = $admin['name'];
    $_SESSION['id'] = $admin['id'];
    $_SESSION['lever'] = $admin['lever'];
    header("Location: ./myAdmin.php");
    exit();
}else{
    $_SESSION['alert'] = "Email hoặc tài khoản không đúng";
    header("Location: ./index.php");
}