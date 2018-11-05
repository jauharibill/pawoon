<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MASUKKAN STOCK</title>
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
                    <img src="../img/boss.png" width="45" height="45">             
                    <b style="color: #fff">BOSS COFFEE</b>
                </a>
            </div>
        </nav>
  </div><br>
  <div>
  </div>
	<div class="mr-5 ml-5" ">
		<form action="store.php" method="POST" class="center" >
		    <input type="text" class="form-control" name="nama" placeholder="Nama Barang"><br>
		    <input type="text" class="form-control" name="banyaknya" placeholder="Banyaknya Barang"><br>
		    <input type="text" class="form-control" name="tanggal" placeholder="Tanggal Stock" value="<?= Date('d-m-Y') ?>"><br>
		    <input type="text" class="form-control" name="jumlah" placeholder="Jumlah Stock">
		    <br>
		    <button class="btn btn-primary">Simpan</button>
		</form> 
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