<?php
session_start();
if(!isset($_SESSION['login'])) {
	header("Location: login.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX MENU</title>
    <script type="text/javascript" src="../jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../coba.css">
    <link rel="icon" href="../img/kopi.png">
    <style>
         body{ 
                background-image:url(../img/belakang2.jpg);  
                background-repeat:no-repeat;
                background-position:top; 
                background-size:1400px; 
                border: 2px; 
                        }

         #ex3{
                  width: auto; box-shadow: 0px 0px 0px 0px; 
                  border-radius: 3px; color:#fff ; 
                  background: rgba(23,20,20,0.52); 
                  padding: 5px 5px 5px 10px; 
                  font-family: comic sans ms; 
                  text-align: center; 
                  width: auto; 
                    }
         .center{
                      width:550px;
                      height:auto;
                      margin:0 auto;
                      margin-top:40px;
                      background-color:rgba(23,20,20,0.52);
                      box-shadow:2px 2px 16px 0px #757575;
                      padding:30px;
                  }
    </style>
</head>
<body >
		<form class="center" action="store.php" method="POST">
		<input class="form-control" type="text" name="nama" placeholder="Nama Pesanan">
		<br>
		<input class="form-control" type="number" name="harga" placeholder="Harga">
		<br>
		<button class="btn btn-primary" >Simpan</button>
		</form>

		<div id="footer">
      <footer class="" style="height: auto;line-height: 40px;background-color: #000000; position: fixed;bottom: 0px;width: 100%;text-align: center;">
            <p style="color: #ffffff">&copy; <?php echo  @date("Y");?>. BOSS COFFE | HALF HUMAN HALF COFFEE | </p>
      </footer>
    </div>
</body>
</html>
 