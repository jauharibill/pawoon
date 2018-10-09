<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<a href="create.php">New</a>
<table>
    <tr>
      <th>ID</th> 
      <th>Nama</th> 
      <th>Harga</th> 
      <th>Action</th> 
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
        <td><a href="edit.php?id=<?= $data['ID']; ?>">Edit</a><a href="delete.php?id=<?= $data['ID']; ?>">Delete</a></td> 
    </tr>
    <?php 
    }
    ?>
</table>