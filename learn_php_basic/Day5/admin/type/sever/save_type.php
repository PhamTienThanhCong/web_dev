<?php
$name = $_POST['name'];
require "../../connectMySql.php";

$mysql = "INSERT INTO `type`(`name`) 
VALUES ('$name')";

mysqli_query($connection,$mysql);

mysqli_close($connection);

header("Location: ../manage_type.php");