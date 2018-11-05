<?php

include "../functions.php";

$ID = $_GET['id'];
$nama = $_POST['nama'];
$banyaknya = $_POST['banyaknya'];
$tanggal = $_POST['tanggal'];
$jumlah = $_POST['jumlah'];

$sql = "UPDATE `stock` SET `nama`='$nama', `banyaknya`='$banyaknya', `tanggal`='$tanggal', `jumlah`='$jumlah' WHERE `ID`='$ID'";

mysqli_query($conn, $sql) or die(mysqli_error($conn));

header("Location: index.php");