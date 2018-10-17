<a href="index.php">List Stock</a>

<form action="store.php" method="POST" class="form">

    <input type="text" class="form-control" name="nama" placeholder="Nama Barang">
    <input type="number" class="form-control" name="berat" placeholder="Berat Barang Per Gram">
    <input type="text" class="form-control" name="tanggal" placeholder="Tanggal Stock" value="<?= Date('Y-m-h') ?>">
    <input type="text" class="form-control" name="jumlah" placeholder="Jumlah Stok">
    <button class="btn btn-primary">Simpan</button>

</form> 