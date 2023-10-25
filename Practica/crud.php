<?php
include("bd.php");

if (isset($_POST['nombre'] )>= 1 && isset($_POST['id_estado'])) {
    $nombre = trim($_POST['nombre']);
    $id_estado = $_POST['id_estado']; // Use 'id_estado' directly from the POST data

    // Ensure that $id_estado is a numeric value to prevent SQL injection
    if (!is_numeric($id_estado)) {
        echo 'Invalid ID value';
    } else {
        $consulta = "INSERT INTO dato (nombre, id_estado) VALUES ('$nombre', $id_estado)";
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            echo 'Los Datos Se Guardaron Correctamente';
        } else {
            echo 'Ocurrió un error al guardar los datos: ' . mysqli_error($conexion);
        }
    }
} else {
    echo 'No data';
}

$conexion->close();
?>

