<?php
require 'functions.php';

if(isset($_POST["register"])) {
	if (registrasi($_POST) > 0 ) {
		echo "<script>
				alert('Bos baru berhasil ditambahkan');
			 </script>";
	} else {
		echo mysqli_error($conn);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HALAMAN REGISTRASI</title>
	<script type="text/javascript" src="jquery-3.3.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="coba.css">
	<link rel="icon" href="img/kopi.png">
	<style>
		.center{
                      width:350px;
                      height:auto;
                      margin:0 auto;
                      color: #ffff;
                      margin-top:40px;
                      background-color:rgba(23,20,20,0.52);
                      box-shadow:2px 2px 16px 0px #757575;
                      padding:40px;
                  }
	</style>
</head>
<body>
	<div id="signup">
		<div class="center">
			<div align="center">
				<form action="" method="POST">
					<div class="form-group">
					    <label for="username"  style="text-align: left;">Username</label>
					    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
					</div>
					<div class="form-group">
					    <label for="password">Password</label>
					    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
					</div>
					<div class="form-group">
					    <label for="password2">Konfirmasi Password</label>
					    <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password">
					</div>
					<button type="submit" class="btn btn-primary" name="register">Register</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>