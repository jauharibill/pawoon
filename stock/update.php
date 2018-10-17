<?php

include "../functions.php";

$id = $_GET['id'];
$nama = $_POST['nama'];
$berat = $_POST['berat'];
$tanggal = $_POST['tanggal'];

$sql = "UPDATE stock SET nama='$nama', berat='$berat', tanggal='$tanggal' WHERE ID='$id'";

mysqli_query($conn, $sql) or die(mysqli_error($conn));

header("Location: index.php");