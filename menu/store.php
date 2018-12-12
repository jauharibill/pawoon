<?php
require "../functions.php";

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stock_id = $_POST['stock_id'];

$sql = "INSERT INTO menu (`nama`, `harga`, `stock_id`) VALUES('$nama', '$harga', '$stock_id')";

mysqli_query($conn, $sql) or die(mysqli_error($conn));

header('Location: index.php');