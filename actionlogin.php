<?php
session_start();

if( isset($_SESSION['login'])) {
	header("Location: index.php");
	exit;
}
require 'functions.php';
	if (isset($_POST['login'])) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM bosses WHERE username = '$username'");

		// cek username
		if(mysqli_num_rows($result)> 0) {
			// cek password
			$row = mysqli_fetch_assoc($result);
			if (password_verify($password, $row["password"])) {
				// set session
                $_SESSION["login"] = true;
                echo "berhasil login";
				header("Location: index.php");
			}else{
				$_SESSION['login_gagal'] = "Username atau Password salah, silahkan ulangi lagi";
				echo "gagal login";
				header("Location: login.php");
			}
		}else{
			$_SESSION['login_gagal'] = "Username atau Password salah, silahkan ulangi lagi";
			echo "gagal login";
			header("Location: login.php");
		}

		$error = true;
	}
?>
