<?php
require '../functions.php';

$ID = $_GET['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];

$sql = "UPDATE `menu` SET `nama`='$nama', `harga`='$harga' where `ID`='$ID'";

mysqli_query($conn, $sql) or die(mysqli_error($conn));

header('Location: index.php');