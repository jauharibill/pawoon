<?php
session_start();
if(!isset($_SESSION['login'])) {
	header("Location: login.php");
	exit;
}

	require 'functions.php';
	$sql = 'SELECT * FROM penjualan';
	$conn = new mysqli('localhost', 'root', '', 'bosscoffee');
	$data = mysqli_query ($conn, $sql);
	$total = 0;
	while ($value= mysqli_fetch_assoc($data)){
		$total += $value['total'];
	}
	$jumlah_per_halaman = 10;
	$jumlah_data = mysqli_num_rows($data);
	$banyaknya_halaman = ceil($jumlah_data/$jumlah_per_halaman);
	if (!isset($_GET['halaman'])) {
		$halaman = 1;
	} else {
		$halaman = $_GET['halaman'];
	}
	$hasil_halaman_pertama = ($halaman-1)*$jumlah_per_halaman;
	$sql = 'SELECT * FROM penjualan LIMIT ' . $hasil_halaman_pertama . ',' . $jumlah_per_halaman;
	$data2 = mysqli_query ($conn, $sql);
	$no = $hasil_halaman_pertama*($halaman-1);
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
			background-size:1400px;
		 }
		 .page-item.active .page-link {
		 	background-color: black;
		 	color: white;
		 	border-color: blue;
		 } 
	</style>
</head>
<body class="text-center">
	<div>
		<nav class="navbar navbar-expand navbar-dark-bg- sticky-top" style="background-color: #000000">
			<div>
				<a class="navbar-brand" href="index.php">
					<img src="img/boss.png" width="55" height="45">				
					<b style="color: #fff">BOSS COFFEE</b>
				</a>
			</div>
		</nav>
	</div>
	<div class="mr-5 ml-5 ">
		<table  class="table" border="1" style="box-shadow: 0px 0px 0px 0px; background: rgba(23,20,20,0.52); margin-top: 20px">
			<thead class="thead- " style="font-family: comic sans ms; color: #ffffff; width: auto; ">
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
				while($value = mysqli_fetch_assoc($data2))	{
					$no++;
				?>
				<tr>
					<td><?= $no; ?></td>
					<td><?= $value['tanggal']?></td>
					<td><?= $value['nama']?></td>
					<td><?= $value['jumlah']?></td>
					<td><?= $value['harga']?></td>
					<td><?= $value['total']?></td>
					<td>
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLong">Hapus</button>
		    			<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		        			<div class="modal-dialog p-3 mb-2 bg text-dark" role="document">
		        				<div class="modal-content">
		        					<div class="modal-header">
		              					<h5 class="modal-title" id="exampleModalLongTitle">Hapus</h5>
		              					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              					<span aria-hidden="true">&times;</span>
		              					</button>
		            				</div>
		            				<div class="modal-body" style="text-align: left;">
		              					Anda yakin ingin menghapus data penjualan?
		            				</div>
		            				<div class="modal-footer">
		              					<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="close">Batal</button>
		              					<a href="functions.php?delete=hapus&id=<?= $value['id'];?>">
											<button class="btn btn-danger">Hapus</button>
										</a>
		            				</div>
		          				</div>
		        			</div>
		      			</div>
					</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center">
				<?php
				for ($halaman=1;$halaman<=$banyaknya_halaman;$halaman++) {
				echo '<li class="page-item active" style="font-family: comic sans ms;"><a class="page-link" href="penjualan.php?halaman=' .$halaman .'">' . $halaman . '</a></li>' ;
				}
				?>
			</ul>
		</nav>
		<center>
		<form class="">
      		<b style="font-family: comic sans ms; color: #ffffff; font-size: 20px;">TOTAL</b>
      		<input class="form-control" type="text" name="total" style="width: auto; box-shadow: 0px 0px 0px 0px; border-radius: 3px; color:#fff ; background: rgba(23,20,20,0.52); padding: 5px 5px 5px 10px; text-align: center; font-family: comic sans ms" value="<?php echo $total; ?>">
    	</form>
		</center>
	</div><br>
	<a href="index.php">
	 	<button class="btn btn-primary" style="font-family: comic sans ms;">KEMBALI</button>
	</a><br><br>
	<footer class="" 
        	style="height: auto; line-height: 45px;
            background-color: #000000;
            bottom: 0px; width: 100%; position: fixed;
            text-align: center;">
            <b style="color: #ffffff"> 
              &copy; <?php echo  @date("Y");?>. BOSS COFFEE | HALF HUMAN HALF COFFEE |
            </b>    
    </footer>
</body>
</html>