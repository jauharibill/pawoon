<?php
session_start();
if(!isset($_SESSION['login'])) {
	header("Location: login.php");
	exit;
}
?>

<form action="store.php" method="POST">
<input type="text" name="nama" placeholder="Nama Pesanan">
<input type="number" name="harga" placeholder="Harga">
<button>Simpan</button>
</form> 