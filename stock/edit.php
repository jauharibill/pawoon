<?php

include "../functions.php";

$id = $_GET['id'];

$sql = "SELECT ID, nama, banyaknya, tanggal, jumlah FROM stock where ID=$id";

$stock = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$stock = mysqli_fetch_assoc($stock);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABEL STOCK</title>
    <script type="text/javascript" src="../jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="icon" href="../img/kopi.png">
    <style>
         body{ 
	            background-image:url(../img/belakang2.jpg);  
	            background-repeat:repeat; 
	            background-size:1360px;
         	} 
         .center{
                  width:550px;
                  height:auto;
                  margin:0 auto;
                  margin-top:40px;
                  background-color:rgba(23,20,20,0.32);
                  box-shadow:2px 2px 16px 0px #757575;
                  padding:30px;
         		} 
    </style>
</head>
<body>
	<div>
        <nav class="navbar navbar-expand navbar-dark-bg- sticky-top" style="background-color: #000000">
            <div>
                <a class="navbar-brand" href="../index.php">
                    <img src="../img/boss.png" width="55" height="45">             
                    <b style="color: #fff">BOSS COFFEE</b>
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">    
                   <a href="index.php">
                   	<button class="btn btn-primary" style="font-family: comic sans ms">List Stock</button>
                   	</a> 
                </ul>    
            </div>
        </nav>
    </div>


	<form action="update.php?id=<?= $stock['ID'] ?>" method="POST" class="form center" style="font-family: comic sans ms" >

	    <input type="text" class="form-control" name="nama" placeholder="Nama Barang" value="<?= $stock['nama'] ?>"><br>
	    <input type="number" class="form-control" name="berat" placeholder="Berat Barang Per Gram" value="<?= $stock['bayaknya'] ?>"><br>
	    <input type="text" class="form-control" name="tanggal" placeholder="Tanggal Stock" value="<?= $stock['tanggal'] ?>"><br>
	    <input type="text" class="form-control" name="jumlah" placeholder="Jumlah Stok" value="<?= $stock['jumlah']?>"><br>
	    <button class="btn btn-primary">Update</button>

	</form>

	<div id="footer">
		  <footer class="" style="height: auto; line-height: 45px;background-color: #000000; position: fixed; bottom: 0px;width: 100%;  text-align: center;">
		        <b style="color: #ffffff"> 
		          &copy; <?php echo  @date("Y");?>.BOSS COFFEE | HALF HUMAN HALF COFFEE |
		        </b>    
		</footer>
	</div>
</body>
</html>