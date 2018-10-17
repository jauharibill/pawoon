<?php

include "../functions.php";

$sql = "SELECT ID, nama, tanggal, berat FROM stock";

$stocks = mysqli_query($conn, $sql) or die(mysqli_error($conn));

?>

<a href="create.php">Tambah Stock</a>

<table class="table table-hover">

<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Berat</th>
    <th>Tanggal</th>
    <th colspan=2>Action</th>
</tr>

<?php

while($stock=mysqli_fetch_assoc($stocks)){
?>

<tr>
    <td><?= $stock['ID'] ?></td>
    <td><?= $stock['nama'] ?></td>
    <td><?= $stock['berat'] ?></td>
    <td><?= $stock['tanggal'] ?></td>
    <td><a href="edit.php?id=<?= $stock['ID'] ?>">Edit</a></td>
    <td><a href="delete.php?id=<?= $stock['ID'] ?>">Delete</a></td>
</tr>

<?php

}

?>

</table>