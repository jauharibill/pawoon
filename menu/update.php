<?php
require '../functions.php';

$ID = $_GET['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stock_id = $_POST['stock_id'];

$sql = "UPDATE `menu` SET `nama`='$nama', `harga`='$harga', `stock_id`='$stock_id' where `ID`='$ID'";

mysqli_query($conn, $sql) or die(mysqli_error($conn));

header('Location: index.php');