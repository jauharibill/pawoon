<?php

require '../functions.php';

$ID = $_GET['id'];

$sql = "DELETE FROM `menu` WHERE `ID`='$ID'";

mysqli_query($conn, $sql) or die(mysqli_error($conn));

header('Location: index.php');