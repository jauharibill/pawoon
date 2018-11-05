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
    <link rel="icon" href="../img/kopi.png">
    <style>
         body{ 
                background-image:url(../img/belakang2.jpg);  
                background-repeat:no-repeat;
                color: #ffffff;
                background-position:top; 
                background-size:1400px; 
                border: 2px; 
         }
        .page-item.active .page-link {
          background-color: black;
          color: white;
          border-color: blue;
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
    <form action="update.php?id=<?= $menu['ID'] ?>" method="POST">
	<input type="text" name="nama" placeholder="Nama Pesanan" value="<?= $menu['nama'] ?>">
	<input type="number" name="harga" placeholder="Harga" value="<?= $menu['harga'] ?>">
	<button>Update</button>
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
