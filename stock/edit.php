<?php

include "../functions.php";

$id = $_GET['id'];

$sql = "SELECT ID, nama, berat, tanggal FROM stock where ID=$id";

$stock = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$stock = mysqli_fetch_assoc($stock);
?>


<a href="index.php">List Stock</a>
<form action="update.php?id=<?= $stock['ID'] ?>" method="POST" class="form">

    <input type="text" class="form-control" name="nama" placeholder="Nama Barang" value="<?= $stock['nama'] ?>">
    <input type="number" class="form-control" name="berat" placeholder="Berat Barang Per Gram" value="<?= $stock['berat'] ?>">
    <input type="text" class="form-control" name="tanggal" placeholder="Tanggal Stock" value="<?= $stock['tanggal'] ?>">
    <button class="btn btn-primary">Update</button>

</form>