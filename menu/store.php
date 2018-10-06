<?php
require "../functions.php";

$nama = $_POST['nama'];
$harga = $_POST['harga'];

$sql = "INSERT INTO menu (`nama`, `harga`) VALUES('$nama', '$harga')";

mysqli_query($conn, $sql) or die(mysqli_error($conn));

header('Location: index.php');