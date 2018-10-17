<?php


include "../functions.php";

$id = $_GET['id'];

$sql = "DELETE FROM stock where ID='$id'";

mysqli_query($conn, $sql) or die(mysqli_error($conn));

header('Location: index.php');