<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'secret';
$dbname = 'bosscoffee';

$conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if ($conn->connect_error) {
	die('Maaf Koneksi Gagal: '. $conn->connect_error);
}else {
	//echo "Koneksi Berhasil";
}

function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username yang sama
	$result = mysqli_query($conn, "SELECT username FROM bosses WHERE username = '$username'");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert ('username sudah terdaftar!')
			  </script>";
		return false;
	}

	// cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
				alert('Konfirmasi Password Tidak Sesuai');
			 </script>";
		return false;	 	
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// insert database
	mysqli_query($conn, "INSERT INTO bosses (`username`, `password`) VALUES('$username', '$password')");
	return mysqli_affected_rows($conn);  
}

if (isset($_POST['input'])) {
	$tanggal = date("Y-m-d");
	$nama = $_POST['nama'];
	$jumlah = $_POST['jumlah'];
	$harga = $_POST['harga'];
	$total = $_POST['total'];
	$query = mysqli_query($conn, "INSERT INTO penjualan VALUES('', '$tanggal', '$nama', '$jumlah', '$harga', '$total')");
	if ($query) {
		echo "<script>
				alert('Berhasil ditambahkan kedalam laporan penjualan');
			 </script>";
	} else {
		echo "Error: ". mysqli_error($conn);
	}
}

if(isset($_GET['delete']) == "hapus")	{
	$id = $_GET['id'];
	$query = mysqli_query($conn, "delete from penjualan where id = '$id'");
	if ($query) {
		echo "<script>
				alert('Berhasil dihapus dari laporan penjualan');
			 </script>";	 
	}else {
		echo "Error: ".mysqli_error($conn);
	}
}
?>