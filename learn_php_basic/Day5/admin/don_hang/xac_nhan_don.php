<?php
if ($_SESSION['lever']!=2){
    header("Location: ../check_loout.php");
}
$id = addslashes($_GET["id"]);
$type = addslashes($_GET["type"]);

require "../connectMySql.php";

if ($type == 0){
    $status = -1;
}else if ($type == 1){
    $status = 1;
}else if ($type == 2){
    $status = 2;
}

$sql = "UPDATE `oder` SET `status` = '$status' WHERE `id` = '$id'";

mysqli_query($connection,$sql);

header('Location: ./don_hang.php');