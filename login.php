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
		if(mysqli_num_rows($result) == 1) {

			// cek password
			$row = mysqli_fetch_assoc($result);
			if (password_verify($password, $row["password"])) {
				// set session
				$_SESSION["login"] = true;
				header("Location: index.php");
				exit;
			}
		}

		$error = true;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Admin BOSS COFFEE</title>
	<link rel="stylesheet" type="text/css" href="coba.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon"  href="img/kopi.png" >
</head>
<body>
	<div id="login">
		<div class="center">
			<div align="center">
				<table border="0">
	<tr >
						<td align="center"><h3>LOGIN</h3></td>
						<?php if(isset($error)) : ?>
						<p style="color: red; font-style: italic;">username / password salah</p>
						<?php endif; ?>
	</tr>
				</table>
			</div>
	<form class="fl" action="post">
				<input class="itpw" type="text" name="username" placeholder="username">
				<br>
				<input class="itpw" type="password" name="password" placeholder="password">
				<br>
				<input class="its" type="submit" name="login"  value="LOGIN">
			</form>
					<b style="font-family: comic sans ms"><a href="#"> lupa password ? </a></b>
		</div>
	</div>
</body>
</html>