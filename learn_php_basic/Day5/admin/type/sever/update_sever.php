<?php
$ma = $_POST['ma'];
$name = $_POST['name'];
require "../../connectMySql.php";

$mysql = "UPDATE `type` SET `name`='$name' 
WHERE `ma` = '$ma'";

mysqli_query($connection,$mysql);

mysqli_close($connection);

header("Location: ../manage_type.php");