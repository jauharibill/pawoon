<?php

include "../functions.php";

$nama = $_POST['nama'];
$berat = $_POST['berat'];
$tanggal = $_POST['tanggal'];

$sql = "INSERT INTO stock (`nama`, `berat`, `tanggal`) VALUES('$nama', '$berat', '$tanggal')";

mysqli_query($conn, $sql) or die(mysqli_error($conn));

header("Location: index.php"); 