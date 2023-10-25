<?php
include("bd.php");

if (isset($_POST['nombre'], $_POST['id_estado'], $_POST['id'])) {
    // Sanitize and validate user input
    $nombre = mysqli_real_escape_string($conexion, trim($_POST['nombre']));
    $id_estado = intval($_POST['id_estado']);
    $id = intval($_POST['id']);

    // Check if the ID is valid
    if ($id <= 0) {
        echo 'Invalid ID value';
    } else {
        // Prepare the UPDATE statement
        $consulta = "UPDATE dato SET nombre = '$nombre', id_estado = '$id_estado' WHERE id = '$id' ";
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            echo 'Los Datos Se Guardaron Correctamente';
        } else {
            echo 'Ocurrió un error al guardar los datos: ' . mysqli_error($conexion);
        }
    }
} else {
    echo 'Incomplete or invalid data';
}

$conexion->close();
?>
