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
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FORM PENJUALAN</title>
  	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="style.css">
  	<link rel="stylesheet" type="text/css" href="coba.css">
  	<link rel="icon" href="img/kopi.png">
	<style>
          body{ 
    			background-image:url(img/belakang2.jpg);  
    			background-repeat:no-repeat;
              	background-size:1375px; 
        	  }
          label {
				 display: block;
				 color: #ffffff;
				}

  	</style>
  	<div>
		<nav class="navbar navbar-expand navbar-dark-bg- sticky-top" style="background-color: #000000">
			<div>
				<a class="navbar-brand" href="index.php">
					<img src="img/boss.png" width="45" height="45">				
					<b style="color: #fff">BOSS COFFEE</b>
				</a>
			</div>
		</nav>
	</div>
</head>
<body >
	<div class="row m-auto">
		<div class="col" style="background-color:rgba(23,20,20,0.52); box-shadow:2px 2px 16px 0px #757575; margin-top: 30px; margin-left:10px;"  >
			<form>
				<ul style="font-family: comis sans ms; color: #fff; width: 400px; margin-left: 15px">
					<li>
						<label style="font-family: comic sans ms;" for="tanggal">Tanggal</label>
						<input class="form-control" type="text" name="tanggal" id="tanggal" style="font-family: comic sans ms;" value="<?php echo @date("d"."-"."m"."-"."y");?>">
					</li>
					<li>
						<label style="font-family: comic sans ms;" for="nama">Pesanan</label>
						<select class="form-control" style="font-family: comic sans ms;" name="nama" id="nama" onchange="gantiPesanan()">
							<option value="">-- Pilih --</option>
							<?php 
							$sql = "SELECT * FROM `menu`";
							$menus = mysqli_query($conn, $sql) or die(mysqli_error($conn));
							while($menu = mysqli_fetch_assoc($menus)){
							?>
							<option style="font-family: comic sans ms;" value="<?= $menu['ID'] ?>"><?= $menu['nama'] ?></option>
							<?php 
							}
							?>
						</select>
					</li>
					<li>
						<label style="font-family: comic sans ms;" for="jumlah">Jumlah</label>
						<input class="form-control" style="font-family: comic sans ms;" type="number" name="jumlah" id="jumlah" onkeyup="Hitun()">
					</li>
					<li>
						<label style="font-family: comic sans ms;" for="harga">Harga</label>
						<input class="form-control" style="font-family: comic sans ms;" type="text" name="harga" id="harga">
					</li>
					<li>
						<label style="font-family: comic sans ms;" for="harga">Total Harga</label>
						<input class="form-control" style="font-family: comic sans ms;" type="text" name="total_harga" id="total_harga">
					</li> 
					<br>
					<button class="btn btn-primary" style="font-family: comic sans ms;" type="button" id="tambah_pesanan" onclick="tambahPesanan()">
						Tambah
					</button>
					<a href="index.php" class="btn btn-warning" style="font-family: comic sans ms">Kembali</a>
				</ul>
			</form>
		</div>
		<div class=" col kanan" style="color: #fff">
			<form method="POST" action="">
				<table class="table"  border="1" style=" background-color:rgba(23,20,20,0.52); box-shadow:2px 2px 16px 0px #757575; margin-top: 30px;">
					<thead>
						<tr>
							<th colspan="5" style="text-align: center;">LAPORAN</th>
						</tr>
						<tr>
							<th>Tanggal</th>
							<th>Pesanan</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Total</th>
						</tr>	
					</thead>
					<tbody id="total_pesanan" >
					</tbody>
				</table>
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#simpan">Simpan</button>
		    	<div class="modal fade" id="simpan" tabindex="-1" role="dialog" aria-labelledby="simpanTitle" aria-hidden="true">
		        	<div class="modal-dialog p-3 mb-2 bg text-dark" role="document">
		        		<div class="modal-content">
		        			<div class="modal-header">
		              			<h5 class="modal-title" id="simpanTitle">Tersimpan</h5>
		              			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              				<span aria-hidden="true">&times;</span>
		              			</button>
		            		</div>
		            		<div class="modal-body">
		              			Data Sukses Tersimpan
		            		</div>
		            		<div class="modal-footer">
		              			<a href="form.php"><button class="btn btn-success" name="input">OK</button></a>
		            		</div>
		          		</div>
		        	</div>
		      	</div>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLong">Batal</button>
		    	<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		        	<div class="modal-dialog p-3 mb-2 bg text-dark" role="document">
		        		<div class="modal-content">
		        			<div class="modal-header">
		              			<h5 class="modal-title" id="exampleModalLongTitle">Batal</h5>
		              			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              				<span aria-hidden="true">&times;</span>
		              			</button>
		            		</div>
		            		<div class="modal-body">
		              			Anda yakin ingin membatalkan?
		            		</div>
		            		<div class="modal-footer">
		              			<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="close">Batal</button>
		              			<a href="index.php"><button type="button" class="btn btn-danger">OK</button></a>
		            		</div>
		          		</div>
		        	</div>
		      	</div>
			</form>
		</div>
	</div>
	<div id="footer">
      <footer class="" style="height: auto;line-height: 40px;background-color: #000000; position: fixed;bottom: 0px;width: 100%;text-align: center;">
            <p style="color: #ffffff">&copy; <?php echo  @date("Y");?>. BOSS COFFE | HALF HUMAN HALF COFFEE | </p>
      </footer>
    </div>
    <!-- <div>
    	<p>INI FOOTER</p>
    </div> -->
	<script type="text/javascript" src="jquery-3.3.1.js"></script>
	<script type="text/javascript">
		function tambahPesanan(){
			jumlah = $("#jumlah").val();
			harga = $("#harga").val();
			total = $("#total_harga").val();
			ID = $("#nama").val();
			tanggal = $("#tanggal").val();
			$("#total_pesanan").append(
				"<tr>"+
					"<td><input type='hidden' name='tanggal_list[]' value='"+tanggal+"'>"+tanggal+"</td>"+
					"<td><input type='hidden' name='nama_list[]' value='"+ID+"'>"+ID+"</td>"+
					"<td><input type='hidden' name='jumlah_list[]' value='"+jumlah+"'>"+jumlah+"</td>"+
					"<td><input type='hidden' name='harga_list[]' value='"+harga+"'>"+harga+"</td>"+
					"<td><input type='hidden' name='total_list[]' value='"+total+"'>"+total+"</td>"+
				"</tr>");
		}
			
		function gantiPesanan(){
			ID = $('#nama').val();
			jumlah = $("#jumlah").val();
			harga = $("#harga").val();
			$.ajax({
				url:'menu/getMenu.php?id='+ID, 
				type:'GET',
				success: function(result){
					data = jQuery.parseJSON(result);
					total = jumlah*(data.harga);
					$("#harga").val(data.harga);
					$("#total_harga").val(total);
				}
			});
		}
			
		function mulaiHitung()  {
			Interval = setInterval("Hitung()",1);
		}

		function Hitung()  {
			console.log('hello');
			jumlah = parseInt(document.getElementById("jumlah").value);
			harga = parseInt(document.getElementById("harga").value);
			total = jumlah * harga;
			document.getElementById("total_harga").value = total;
		}

		function berhentiHitung()  {
			clearInterval(Interval);
		}
	</script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>