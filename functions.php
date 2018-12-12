<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'secret'; #comment this line if your db need password
// $dbpass = ''; #uncomment this line if your db doesnt need password
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
	if(is_array($_POST['nama_list'])){
		$nama_pesanan = $_POST['nama_list'];
		foreach($nama_pesanan as $key => $pesanan){
			$tanggal = date("Y-m-d");
			$nama = $_POST['nama_list'][$key];
			$menu_id = $_POST['menu_id'][$key];
			$jumlah = (int) $_POST['jumlah_list'][$key];
			$harga = $_POST['harga_list'][$key];
			$total = $_POST['total_list'][$key];
			$penjualan_query = mysqli_query($conn, "INSERT INTO penjualan (`tanggal`, `nama`, `jumlah`, `harga`, `total`, `menu_id`) VALUES('$tanggal', '$nama', '$jumlah', '$harga', '$total', '$menu_id')") or die(mysqli_error($conn));		
			$menu_stock_query = mysqli_query($conn, "SELECT * FROM menu, stock where `menu`.`stock_id`=`stock`.`ID` AND `menu`.`ID`='$menu_id'") or die(mysqli_error($conn));
			$menu_stock = mysqli_fetch_assoc($menu_stock_query);
			$jumlah_stock = (int) $menu_stock['jumlah'];
			$kurangi_stock = $jumlah_stock-$jumlah;
			$stock_id = $menu_stock['stock_id'];
			$stock_query = mysqli_query($conn, "UPDATE stock SET `jumlah`='$kurangi_stock' WHERE `ID`='$stock_id'") or die(mysqli_error($conn));
		}
	}else{
		echo "gagal menyimpan";
	}
	 
	// if ($query) {
	// 	header("Location: form.php");
	// } else {
	// 	echo "Error: ". mysqli_error($conn);
	// }
}

if(isset($_GET['delete']) == "hapus")	{
	$id = $_GET['id'];
	$query = mysqli_query($conn, "DELETE FROM penjualan WHERE `id`='$id'") or die(mysqli_error($conn));
	if ($query) {
		header("Location: penjualan.php");
	}else {
		echo "Error: ".mysqli_error($conn);
	}
}
?>