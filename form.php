<?php
session_start();
if(!isset($_SESSION['login'])) {
	header("Location: login.php");
	exit;
}
	include 'functions.php';
	$data = mysqli_query($conn, "select * from penjualan");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Form Penjualan</title>
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>
	<form action="" method="POST">
		<ul>
			<li>
				<label for="tanggal">Tanggal</label>
					<input type="text" name="tanggal" id="tanggal" value="<?php echo @date("y"."-"."m"."-"."d");?>">
			</li>
			<li>
				<label for="nama">Pesanan</label>
				<input type="text" name="nama" id="nama">
			</li>
			<li>
				<label for="jumlah">Jumlah</label>
				<input type="text" name="jumlah" id="jumlah" onfocus="mulaiHitung()" onblur="berhentiHitung()">
			</li>
			<li>
				<label for="harga">Harga</label>
				<input type="text" name="harga" id="harga" onfocus="mulaiHitung()" onblur="berhentiHitung()">
			</li>
			<li>
				<label for="total">Total</label>
				<input type="text" name="total" id="total" readonly onfocus="mulaiHitung()" onblur="berhentiHitung()">
			</li>
			<button type="submit" name="input">Submit</button>
			<a href="penjualan.php">Kembali</a>
		</ul>
		<script type="text/javascript">
			function mulaiHitung()  {
				Interval = setInterval("Hitung()",1);
			}
			function Hitung()  {
				jumlah = parseInt(document.getElementById("jumlah").value);
				harga = parseInt(document.getElementById("harga").value);
				total = jumlah * harga;
				document.getElementById("total").value = total;
			}
			function berhentiHitung()  {
				clearInterval(Interval);
			}
		</script>
	</form>
</body>
</html>