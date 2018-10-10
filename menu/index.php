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
    <link rel="icon" href="../img/kopi.png">
    <style>
         body{ 
                background-image:url(../img/);  
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
    </style>
</head>
<body>
    <div>
        <nav class="navbar navbar-expand navbar-dark-bg- sticky-top" style="background-color: #000000">
            <div>
                <a class="navbar-brand" href="index.php">
                    <img src="../img/boss.png" width="35" height="35">             
                    <b style="color: #fff">BOSS COFFEE</b>
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <a href="create.php">
                        <button type="button" class="btn btn-primary">New</button>
                    </a>
                </ul>
            </div>
        </nav>
    </div>
<!--<a href="create.php">
    <button>New</button>
</a>-->

<br>
<center>
<table class="table" border="1" style="font-family: comic sans ms">
    <tr>
        <th colspan="4" style="text-align: center;">MENU</th>
    </tr>
    <tr>
      <th>ID</th> 
      <th>NAMA</th> 
      <th>HARGA</th> 
      <th>ACTION</th> 
    </tr>
    <?php 

    require '../functions.php';
    $sql = "SELECT * FROM menu";
    $bunch_of_data = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    while($data = mysqli_fetch_assoc($bunch_of_data)){
    ?>
    <tr> 
        <td><?= $data['ID']; ?></td> 
        <td><?= $data['nama']; ?></td> 
        <td><?= $data['harga']; ?></td> 
        <td><a href="edit.php?id=<?= $data['ID']; ?>"><button class="btn btn-warning">Edit</button></a><a href="delete.php?id=<?= $data['ID']; ?>"><button class="btn btn-danger">Delete</button></a></td> 
    </tr>
    <?php 
    }
    ?>
</table>
</center>
</body>
</html>
