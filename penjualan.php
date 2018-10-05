<?php
session_start();
if(!isset($_SESSION['login'])) {
	header("Location: login.php");
	exit;
}

	require 'functions.php';
	$data = mysqli_query ($conn, "select * from penjualan");
	$no = 1;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Laporan Penjualan</title>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th scope="no">No.</th>
				<th scope="tanggal">Tanggal</th>
				<th scope="nama">Nama</th>
				<th scope="jumlah">Jumlah</th>
				<th scope="harga">Harga</th>
				<th scope="total">Total</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$total = 0;
				while($value = mysqli_fetch_assoc($data))	{
					$total += $value['total'];
			?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $value['tanggal']?></td>
				<td><?= $value['nama']?></td>
				<td><?= $value['jumlah']?></td>
				<td><?= $value['harga']?></td>
				<td><?= $value['total']?></td>

				<td>
					<a href="functions.php?delete=hapus&id=<?= $value['id'];?>">
						<button>Hapus</button>
					</a>
				</td>
			</tr>
			<?php
				$no++;
			}
				 
			?>
		</tbody>
	</table>
	<?php
		echo $total;
	?>
	<button>
		<a href="index.php">Kembali</a>
	</button>
</body>
</html>