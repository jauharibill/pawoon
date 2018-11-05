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
	            background-size:1400px;
              border: 2px;
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
        </nav>
    </div>
	<form action="update.php?id=<?= $stock['ID'] ?>" method="POST" class="form center" style="font-family: comic sans ms" >

	    <input type="text" class="form-control" name="nama" placeholder="Nama Barang" value="<?= $stock['nama'] ?>"><br>
	    <input type="text" class="form-control" name="banyaknya" placeholder="Banyaknya Barang" value="<?= $stock['banyaknya'] ?>"><br>
	    <input type="text" class="form-control" name="tanggal" placeholder="Tanggal Stock" value="<?= $stock['tanggal'] ?>"><br>
	    <input type="text" class="form-control" name="jumlah" placeholder="Jumlah Stok" value="<?= $stock['jumlah']?>"><br>
	    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#update">Update</button>
          <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="updateTitle" aria-hidden="true">
              <div class="modal-dialog p-3 mb-2 bg text-dark" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="updateTitle">Update</h5>
                    </div>
                    <div class="modal-body">
                        Data Sukses DiUpdate
                    </div>
                    <div class="modal-footer">
                        <a href="index.php"><button class="btn btn-success" name="input">OK</button></a>
                    </div>
                  </div>
              </div>
            </div>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#batal">Batal</button>
             <div class="modal fade" id="batal" tabindex="-1" role="dialog" aria-labelledby="batalTitle" aria-hidden="true">
              <div class="modal-dialog p-3 mb-2 bg text-dark" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="batalTitle">Batal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Anda yakin ingin membatalkan?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="close">Batal</button>
                        <a href="index.php"><button type="button" class="btn btn-danger">OK</button></a>
                    </div>
                  </div>
              </div>
            </div>

	</form>

	<div id="footer">
		  <footer class="" style="height: auto; line-height: 45px;background-color: #000000; position: fixed; bottom: 0px;width: 100%;  text-align: center;">
		        <b style="color: #ffffff"> 
		          &copy; <?php echo  @date("Y");?>. BOSS COFFEE | HALF HUMAN HALF COFFEE |
		        </b>    
		</footer>
	</div>
</body>
</html>