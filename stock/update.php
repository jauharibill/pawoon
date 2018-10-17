<?php

include "../functions.php";

$id = $_GET['id'];
$nama = $_POST['nama'];
$berat = $_POST['berat'];
$tanggal = $_POST['tanggal'];
$jumlah = $_POST['jumlah'];

$sql = "UPDATE stock SET nama='$nama', berat='$berat', tanggal='$tanggal', jumlah='$jumlah' WHERE ID='$id'";

mysqli_query($conn, $sql) or die(mysqli_error($conn));

header("Location: index.php");