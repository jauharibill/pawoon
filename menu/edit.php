<?php 

session_start();
if(!isset($_SESSION['login'])) {
	header("Location: login.php");
	exit;
}

require '../functions.php';
$id = $_GET['id'];
$sql = "SELECT * FROM menu WHERE `ID`='$id'";

$sql = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$menu = mysqli_fetch_assoc($sql);

?>

<form action="update.php?id=<?= $menu['ID'] ?>" method="POST">
<input type="text" name="nama" placeholder="Nama Pesanan" value="<?= $menu['nama'] ?>">
<input type="number" name="harga" placeholder="Harga" value="<?= $menu['harga'] ?>">
<button>Update</button>
</form>