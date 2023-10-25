<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Include your CSS and JavaScript libraries here -->
    <!-- ... (Your library links) ... -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>

    <title>modal</title>
</head>

<body id="page-top">
    <?php
    include("bd.php");
    $sql = "SELECT * FROM dato";
    $result = mysqli_query($conexion, $sql);

    while ($fila = $result->fetch_assoc()) {
        $field0name = $fila['id'];
        $field1name = $fila['nombre'];
        $field2name = $fila['id_estado'];
    ?>

        <div class="modal fade" id="editar<?php echo $fila['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editar">Actualizar Datos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="updateForm<?php echo $fila['id']; ?>" action="xd.php?id=<?= $field0name ?>" method="post">
                            <div class="mb-3" style="text-align: left;">
                                <label>Nombre:</label>
                                <input value="<?= $field1name ?>" name="nombre" class="form-control" id="nombre<?php echo $fila['id']; ?>">
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="id_estado<?php echo $fila['id']; ?>" class="form-label">Actividad</label><br>
                                    <select name="id_estado" id="id_estado<?php echo $fila['id']; ?>" class="form-control">
                                        <?php
                                        include("bd.php");

                                        $sql = "SELECT * FROM actividad ";
                                        $resultado = mysqli_query($conexion, $sql);

                                        while ($consulta = mysqli_fetch_array($resultado)) {
                                            $selected = ($field2name == $consulta['id_actividad']) ? 'selected' : '';
                                            echo '<option value="' . $consulta['id_actividad'] . '" ' . $selected . '>' . $consulta['estado'] . ' ' . $consulta['nombre'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="confirmUpdate('<?php echo $fila['id']; ?>')">Guardar Cambios</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <script>
        function confirmUpdate(rowId) {
            const name = document.querySelector(`#nombre${rowId}`).value;
            Swal.fire({
                title: 'Confirmar Actualización',
                text: `¿Está seguro de actualizar los datos de ${name}?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.querySelector(`#updateForm${rowId}`).submit();
                }
            });
        }
    </script>

    <!-- Your page content here -->
</body>

</html>
















