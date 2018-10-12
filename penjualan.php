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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LAPORAN PENJUALAN</title>
	<script type="text/javascript" src="jquery-3.3.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" href="img/kopi.png">
	<style>
		 body{ 
			background-image:url(img/belakang2.jpg);  
			background-repeat:repeat; 
			background-size:1360px; 
	</style>
</head>
<body class="text-center">
	<div class="mr-5 ml-5 ">
	<table  class="table" border="1" style="box-shadow: 0px 0px 0px 0px; background: rgba(23,20,20,0.52); margin-top: 20px">
		<thead class="thead- " style="font-family: comic sans ms; text-align: center; color: #ffffff; width: auto; ">
			<tr>
          <td colspan="7"><h3> LAPORAN PENJUALAN</h3></td>
        </tr>
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
		<tbody style="font-family: comic sans ms; text-align: center; color: #ffffff;">
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
						<button class="btn btn-danger">Hapus</button>
					</a>
				</td>
			</tr>
			<?php
				$no++;
			}
				 
			?>
		</tbody>
	</table>
	<center>
	<form class="">
      <b style="font-family: comic sans ms; color: #ffffff; background:rgba(23,20,20,0.52);">HASIL</b>
      <input class="form-control" type="text" name="total" style="width: auto; box-shadow: 0px 0px 0px 0px; border-radius: 3px; color:#fff ; background: rgba(23,20,20,0.52); padding: 5px 5px 5px 10px; text-align: center; font-family: comic sans ms" value="<?php
		echo $total;
	?>">
    </form>
</center>
<!--<?php
		echo $total;
	?>-->
</div>
		<a href="index.php">
		 <button class="btn btn-primary">KEMBALI</button>
		</a>
	<div id="footer">
      <footer class="" style="height: auto;line-height: 40px;background-color: #000000; position: fixed;bottom: 0px;width: 100%;text-align: center;">
            <p style="color: #ffffff">&copy; <?php echo  @date("Y");?>. BOSS COFFE | HALF HUMAN HALF COFFEE | </p>
      </footer>
    </div>
</body>
</html>