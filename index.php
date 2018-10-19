<?php
session_start();
if(!isset($_SESSION['login'])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BOSS COFFEE</title>
	<script type="text/javascript" src="jquery-3.3.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="njajal.css">
	<link rel="icon" href="img/kopi.png">
	<style>
		#ex3 {
			width: auto;
			box-shadow: 0px 0px 0px 0px;
			border-radius: 3px; color: #fff;
			background: rgba(23, 20, 20, 0.52);
			padding: 5px 5px 5px 10px;
			font-family: comic sans ms;
			text-align: center;
		}
	</style>
</head>
<body class="text-center">
	<slider>
		<slide><p></p></slide>
		<slide><p></p></slide>
		<slide><p></p></slide>
		<slide><p></p></slide>
	</slider>
	<div>
		<nav class="navbar navbar-expand navbar-dark-bg- sticky-top" style="background-color: #000000">
			<div>
				<a class="navbar-brand" href="index.php">
					<img src="img/boss.png" width="45" height="45">				
					<b style="color: #fff">BOSS COFFEE</b>
				</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav ml-auto">
					<a href="logout.php">
						<button type="button" class="btn btn-danger">Log Out</button>
					</a>
				</ul>
			</div>
		</nav>
	</div>
	<div class="row m-auto" style="width: 1000px; padding-top: 180px;">
	    <div class="col">
	    	<a href="form.php">
	    		<img src="img/penjualan.png" class="rounded" width="200">
	    	</a>
	    </div>
	    <div class="col">
	    	<a href="penjualan.php">
	    		<img src="img/barang.png" class="rounded" width="200">
	    	</a>
	    </div>
	    <div class="col">
			 <a href="menu/index.php">
	    		<img src="img/menu.png" class="rounded" width="200">
	    	</a>   
	    </div> 
		<div class="col">
			 <a href="stock/index.php">
	    		<img src="img/kulak.png" class="rounded" width="200">
	    	</a>   
	    </div>
  	</div>
  	<!--FOOTER-->
  	<div id="footer">
		  <footer class="" style="height: auto; line-height: 45px;background-color: #000000; position: fixed; bottom: 0px;width: 100%;  text-align: center;">
		        <b style="color: #ffffff"> 
		          &copy; <?php echo  @date("Y");?>.BOSS COFFEE | HALF HUMAN HALF COFFEE |
		        </b>    
		</footer>
	</div>
</body>
</html>