<?php
$host = "localhost";
$usuario="root";
$contrasena= "";
$database ="pruebas";

$conexion = mysqli_connect($host, $usuario, $contrasena, $database);
if(mysqli_connect_errno()){
    echo "Error en la conexion". mysqli_connect_error();
}
?>