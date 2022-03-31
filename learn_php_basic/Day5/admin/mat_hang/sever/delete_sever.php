<?php
$id = $_POST['id'];
require "../../connectMySql.php";

$mysql = "DELETE FROM `mat_hang` 
WHERE id = '$id'";

mysqli_query($connection,$mysql);

mysqli_close($connection);

header("Location: ../manage_mat_hang.php");