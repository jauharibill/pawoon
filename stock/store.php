<?php

include "../functions.php";

$nama = $_POST['nama'];
$berat = $_POST['berat'];
$tanggal = $_POST['tanggal'];
$jumlah = $_POST['jumlah'];

$sql = "INSERT INTO stock (`nama`, `berat`, `tanggal`, `jumlah`) VALUES('$nama', '$berat', '$tanggal', '$jumlah')";

mysqli_query($conn, $sql) or die(mysqli_error($conn));

header("Location: index.php"); 