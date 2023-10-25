<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_GET['id'];
    $nombre=$_POST['nombre'];
    $id_estado=$_POST['id_estado'];
    include('bd.php');
    $sql="update dato set nombre='$nombre', id_estado='$id_estado' where id=$id";
    $result=mysqli_query($conexion,$sql);
    header('Location: x.php');
}
?>