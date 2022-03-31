<?php
session_start();
require "./connectMySql.php";
if (isset($_COOKIE['user'])){
    $id = $_COOKIE['user'];
    $sql = "SELECT * FROM `user` WHERE `token` = '$id'";
    $kq = mysqli_query($connection,$sql);
    $userAccess = mysqli_fetch_array($kq);
    $_SESSION['user'] = $userAccess['name'];
    $_SESSION['id'] = $userAccess['id'];
}

$id_customer = $_SESSION['id'];
$name_customer = $_POST['name'];
$phone_number_customer = $_POST['phone_number'];
$address_customer = $_POST['address'];
$status = 0;

$gio_hang = $_SESSION['gio_hang'];
$total_price = 0;

foreach ($gio_hang as $id_product => $value){
    $total_price = $total_price + $value['price'] * $value['so_luong'];
}

$sql = "INSERT INTO `oder`(`id_customer`, `name_customer`, `phone_number_customer`, `address_customer`, `status`,`total_price`) 
VALUES ('$id_customer', '$name_customer', '$phone_number_customer', '$address_customer', '$status','$total_price')";

mysqli_query($connection,$sql);

$sql = "SELECT max(id) FROM `oder` WHERE `id_customer` = '$id_customer'";

$id_order = mysqli_query($connection,$sql);

$id_order = mysqli_fetch_array($id_order);

$id_order = $id_order['max(id)'];

foreach ($gio_hang as $id_product => $value){
    $quantily = $value['so_luong'];
    $sql = "INSERT INTO `order_detail`(`id_order`, `id_product`, `quantily`) 
    VALUES ('$id_order','$id_product','$quantily')";
    mysqli_query($connection,$sql);
}

unset($_SESSION['gio_hang']);

$_SESSION['alert'] = "đặt hàng thành công cảm ơn bạn";

header("Location: ../gio_hang.php");