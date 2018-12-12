<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include "../functions.php";
$menus = mysqli_query($conn, "select * from menu");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU</title>
    <script type="text/javascript" src="../jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="icon" href="../img/kopi.png">
    <style>
         body{ 
                background-image:url(../img/gambar4.jpg);  
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
</head >
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
                    <a href="create.php">
                        <button type="button" class="btn btn-primary">New</button>
                    </a>
                </ul>
            </div>
        </nav>
    </div>


<br>
<?php
// connect to database

// define how many results you want per page
$results_per_page = 10;
// find out the number of results stored in database
$sql='SELECT * FROM menu';
$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);
// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);
// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;
// retrieve selected results from database and display them on page
$sql='SELECT * FROM menu LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($conn, $sql);

?>
<div class="mr-5 ml-5">
  <center>
  <table class="table" border="1" style="box-shadow: 0px 0px 0px 0px; background: rgba(23, 20, 20, 0.52); margin-top: 20px; text-align: center; width: 75%; font-family: comic sans ms;">
    <thead class="thead" style="text-align: center; color: #ffffff; width: auto; ">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>

<?php
while($row = mysqli_fetch_array($result)) {
  echo '<tr><td> ' . $row['ID'] . '</td>
            <td> ' . $row['nama']. '</td>
            <td> ' . $row['harga']. '</td>
            <td>
                <a href="edit.php?id= '.$row['ID'].'" >
                  <button class="btn btn-warning">Edit</button>
                </a>
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
                            Anda yakin ingin menghapus data dari menu?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="close">Batal</button>
                            <a href="delete.php?id= '.$row['ID'].'" >
                              <button class="btn btn-danger">Hapus</button>
                            </a>  
                        </div>
                      </div>
                  </div>
                </div>
            </td>
        </tr>';
}
?>
</tbody>
</table>
</center>
</div>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <?php
    // display the links to the pages
    for ($page=1;$page<=$number_of_pages;$page++) {
    echo '<li class="page-item active" style="font-family: comic sans ms;"><a class="page-link" href="index.php?page=' . $page . '">' . $page . '</a></li>';
}
?>    
  </ul>
</nav>
<br><br>
<div id="footer">
    <footer class="" 
        style="height: auto; line-height: 45px;
             background-color: #000000; 
             bottom: 0px; width: 100%; position: fixed;
             text-align: center;">
            <b style="color: #ffffff"> 
              &copy; <?php echo  @date("Y");?>. BOSS COFFEE | HALF HUMAN HALF COFFEE |
            </b>    
    </footer>
</div>
</body>
</html>
