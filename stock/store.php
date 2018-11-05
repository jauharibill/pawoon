<?php

include "../functions.php";

$nama = $_POST['nama'];
$banyaknya = $_POST['banyaknya'];
$tanggal = $_POST['tanggal'];
$jumlah = $_POST['jumlah'];

$sql = "INSERT INTO stock (`nama`, `banyaknya`, `tanggal`, `jumlah`) VALUES('$nama', '$banyaknya', '$tanggal', '$jumlah')";

mysqli_query($conn, $sql) or die(mysqli_error($conn));

header("Location: index.php"); 