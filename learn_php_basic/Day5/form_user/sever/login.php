<?php

$email = addslashes($_POST['email']);
$password = addslashes($_POST['password']);

require "./connectMySql.php";

$sqlCheck = "SELECT * FROM `user`
WHERE (`email` = '$email') and (`password` = '$password')";
// die($sqlCheck);

$userAccess = mysqli_query($connection,$sqlCheck);
$userAccess = mysqli_fetch_array($userAccess);

session_start();

if ($userAccess['id'] != ""){
    $_SESSION['user'] = $userAccess['name'];
    $_SESSION['id'] = $userAccess['id'];
    if (isset($_POST['remember'])){
        $token = uniqid('user_',true).".".time();
        setcookie('user', $token, time() + (86400 * 30), "/"); 
        $id = $userAccess['id'];
        $set_cookie = "UPDATE `user` SET `token`='$token'
        WHERE `id`='$id'";
        mysqli_query($connection,$set_cookie);
    }
    header("Location: ../../index.php");
    exit();
}
mysqli_close($connection);
$_SESSION['alert'] = "Email hoặc tài khoản không đúng";
header("Location: ../login.php");