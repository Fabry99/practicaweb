<?php


$id = $_GET['id'];
require_once("bd.php");
$query = mysqli_query($conexion, "DELETE FROM dato WHERE id = '$id'");

header('Location: x.php?m=1');
