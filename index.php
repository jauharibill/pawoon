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
	<title>Boss Coffee</title>
</head>
<body>
	<marquee><h1>Boss Coffee</h1></marquee>
	<button>
		<a href="penjualan.php">Laporan Penjualan</a>
	</button>
	<button>
		<a href="form.php">Form Penjualan</a>
	</button>
	<a href="logout.php">
		<button>Log Out</button>
	</a>
</body>
</html>