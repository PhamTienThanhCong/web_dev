<?php
$ma = $_POST['ma'];
require "../../connectMySql.php";

$mysql = "DELETE FROM `type` 
WHERE ma = '$ma'";

mysqli_query($connection,$mysql);

mysqli_close($connection);

header("Location: ../manage_type.php");