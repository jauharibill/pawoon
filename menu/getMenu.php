<?php

require '../functions.php';


$id = $_GET['id'];
$sql = "SELECT * FROM menu where `ID`='$id'";

$execute_query = mysqli_query($conn, $sql);

$menu = mysqli_fetch_assoc($execute_query);

echo json_encode($menu);
