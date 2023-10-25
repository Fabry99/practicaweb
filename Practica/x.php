<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script defer src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script defer src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
  <script defer src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script defer src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
  <script defer src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
  <script defer src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
  <script defer src="datatable.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">

  <title>Document</title>
</head>

<body>
  <!-- Button trigger modal -->


  <form method="post" action="crud.php">
    <label for="nombre">Introduce algo</label>
    <input type="text" id="txtnombre" name="nombre">
    <input type="submit" value="Enviar">
  </form>

  <body id="page-top">

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Lista de Profesores</h6>
          <br>

          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AgregarModal">
            <span class="glyphicon glyphicon-plus"></span> Agregar <i class="fa fa-plus-circle" aria-hidden="true"></i> </a></button>

        </div>
        <?php include "p.php"; ?>
        <?php include "modalAgregar.php"; ?>
       



        <div class="card-body">
          <div class="table-responsive">

            <table id="example" class="table table-striped" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Actividad</th>
                  <th></th>

                </tr>
              </thead>

              <tbody>
                <?php
                require_once("bd.php");
                $result = mysqli_query($conexion, "SELECT * FROM dato as d JOIN actividad as ac on d.id_estado=ac.id_actividad ");
                while ($fila = mysqli_fetch_assoc($result)) :

                ?>
                  <tr>
                    <td><?php echo $fila['id']; ?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['estado']; ?></td>


                    <td>
                      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editar<?php echo $fila['id']; ?>">
                      <i class="fa fa-edit "></i></a></button>
                      <a href="../includes/eliminar_prof.php?id=<?php echo $fila['id'] ?>" class="btn btn-danger btn-del">
                        <i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                  </tr>
                

                <?php endwhile; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Office</th>

                </tr>
              </tfoot>
            </table>
            <!-- End of Main Content -->

          </div>
          <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->
