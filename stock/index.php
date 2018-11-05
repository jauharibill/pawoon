<?php

include "../functions.php";

$sql = "SELECT ID, nama, tanggal, banyaknya, jumlah FROM stock";

$stocks = mysqli_query($conn, $sql) or die(mysqli_error($conn));

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
    </style>
</head>
<body class="text-center">
    <div>
        <nav class="navbar navbar-expand navbar-dark-bg- sticky-top" style="background-color: #000000">
            <div>
                <a class="navbar-brand" href="../index.php">
                    <img src="../img/boss.png" width="45" height="45">             
                    <b style="color: #fff">BOSS COFFEE</b>
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">    
                    <a href="create.php">
                        <button class="btn btn-primary">Tambah Stock</button>
                    </a>
                </ul>    
            </div>
        </nav>
    </div>
    <div class="mr-5 ml-5">
        <table class="table" border="0" style="color: #ffffff;background-color:rgba(23,20,20,0.32); box-shadow:2px 2px 16px 0px #757575; margin-top: 30px;">
            <thead class="">  
                <tr class="">
                    <th scope="no">NO</th>
                    <th>Nama</th>
                    <th>Banyaknya</th>
                    <th>Tanggal</th>
                    <th>Jumlah Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($stock=mysqli_fetch_assoc($stocks)){ 
                    $no++;
                ?>
                <tr class="" >
                    <td><?= $no; ?></td>
                    <td><?= $stock['nama'] ?></td>
                    <td><?= $stock['banyaknya'] ?></td>
                    <td><?= $stock['tanggal'] ?></td>
                    <td><?= $stock['jumlah'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $stock['ID'] ?>"><button class="btn btn-warning">Edit</button></a>
                        <a href="delete.php?id=<?= $stock['ID'] ?>"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                <?php
                }
                ?>
        </table>
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

