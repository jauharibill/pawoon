<?php

require '../functions.php';

$id = $_GET['ID'];

$sql = "DELETE FROM `menu` WHERE `ID`='$id'";

mysqli_query($conn, $sql) or die(mysqli_error($conn));

header('Location: index.php');