<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
$conn = new mysqli('localhost', 'root', '', 'bosscoffee');
$data = mysqli_query($conn, "select * from menu");
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
                background-image:url(../img/gambar4.jpg);  
                background-repeat:no-repeat;
                font-family: comic sans ms;
                text-align: ;
                font-size:  ;
                text-align:;
                color: #ffffff;
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
</head >
<body>
    <div>
        <nav class="navbar navbar-expand navbar-dark-bg- sticky-top" style="background-color: #000000">
            <div>
                <a class="navbar-brand" href="../index.php">
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

<table class="table table-stripped">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Harga</th>
    <th colspan="2" style="text-align: center;">Aksi</th>
  </tr>

<?php
while($row = mysqli_fetch_array($result)) {
  echo "<tr><td>".$row['ID'] . '</td><td> ' . $row['nama']. '</td><td> ' . $row['harga']. "</td><td><button class='btn btn-warning'>Edit</button></td><td class='btn btn-danger'>Delete</td></tr>";
}

?>
</table>

<nav aria-label="Page navigation example" style="margin-left: 50px;">
  <ul class="pagination">
    <?php
    // display the links to the pages
    for ($page=1;$page<=$number_of_pages;$page++) {
    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $page . '">' . $page . '</a></li>';
}
?>    
  </ul>
</nav>

<br><br><br>
<div id="footer">
      <footer class="" style="height: auto;line-height: 40px;background-color: #000000; position: fixed;bottom: 0px;width: 100%;text-align: center;">
          <b style="color: #ffffff">&copy; <?php echo  @date("Y");?>. BOSS COFFE | HALF HUMAN HALF COFFEE </b>
        </footer>
</div>
</body>
</html>