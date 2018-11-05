<?php

include "../functions.php";

$sql = "SELECT ID, nama, tanggal, banyaknya, jumlah FROM stock";

$stocks = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$no = 1;
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
         } 
    </style>
</head>
<body class="text-center">
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
                    <a href="create.php">
                        <button class="btn btn-primary" style="font-family: comic sans ms">Tambah Stock</button>
                    </a>
                </ul>    
            </div>
        </nav>
    </div>
    <div class="mr-5 ml-5" style="font-family: comic sans ms">
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
                ?>
                <tr class="" >
                    <td><?= $no; ?></td>
                    <td><?= $stock['nama'] ?></td>
                    <td><?= $stock['banyaknya'] ?></td>
                    <td><?= $stock['tanggal'] ?></td>
                    <td><?= $stock['jumlah'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $stock['ID'] ?>"><button class="btn btn-warning">Edit</button></a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLong">Hapus</button>
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog p-3 mb-2 bg text-dark" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Hapus</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="text-align: left;">
                                        Anda yakin ingin menghapus data stock?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="close">Batal</button>
                                        <a href="delete.php?id=<?= $stock['ID'] ?>"><button class="btn btn-danger">Delete</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
                $no++;
                }
                ?>
        </table>
    </div>
    <!--FOOTER-->
    <div id="footer">
          <footer class="" style="height: auto; line-height: 45px;background-color: #000000; position: fixed; bottom: 0px;width: 100%;  text-align: center;">
                <b style="color: #ffffff"> 
                 &copy; <?php echo  @date("Y");?>. BOSS COFFEE | HALF HUMAN HALF COFFEE |
                </b>    
        </footer>
    </div>    
</body>
</html>

