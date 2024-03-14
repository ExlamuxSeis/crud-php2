<?php
require 'modelo/conexion.php';
require 'modelo/modelo.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Bienvenido a los registros</title>
</head>

<body>
    <main class="container">
        <h1 class="text-center">Lista de registros</h1>
        <!-- <a class="btn btn-success m-1 m-sm-1" href="vista/formulario.php">Crear nuevo registro</a> -->

        <!-- Modal -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success mb-3 m-md-1 m-sm-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Crear nuevo registro
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Crear nuevo Registro</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="controlador/agregar.php" method="post">
                            <input type="hidden" name="id">
                            <div class="col-auto">
                                <label for="paterno" class="form-label">Apellido paterno</label>
                                <input type="text" id="paterno" class="form-control" name="paterno" required>
                            </div>
                            <div class="col-auto">
                                <label for="materno" class="form-label">Apellido materno</label>
                                <input type="text" id="materno" class="form-control" name="materno" required>
                            </div>
                            <div class="col-auto">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" class="form-control" name="nombre" required>
                            </div>
                            <div class="col-auto">
                                <label for="sexo" class="form-label">Sexo</label>
                                <select class="form-select" id="sexo" name="sexo" aria-label="Default select example">
                                    <option selected>Seleccionar Sexo</option>
                                    <option value="H">Hombre</option>
                                    <option value="M">Mujer</option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="number" id="telefono" class="form-control" name="telefono" required>
                            </div>
                            <div class="col-auto">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-auto">
                                <label for="municipio" class="form-label">Municipio</label>
                                <input type="text" id="municipio" class="form-control" name="municipio" required>
                            </div>
                            <div class="col-auto">
                                <label for="estado" class="form-label">Estado</label>
                                <input type="text" id="estado" class="form-control" name="estado" required>
                            </div>
                            <button type="submit" class="btn btn-primary m-1 col-5 col-sm-5 col-md-5">Agregar registro</button>
                            <a class="btn btn-success m-1 col-5 col-sm-5 col-md-5" href="index.php">Regresar</a>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin del modal -->


        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-warning">
                    <tr>
                        <th scope="col">Paterno</th>
                        <th scope="col">Materno</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Municipio</th>
                        <th scope="col">Estado</th>
                        <th scope="col" colspan="2" class="text-center">Actividades</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tabla = "registro";
                    $conn = conexion::dbconexion();
                    $registro = getAll($conn, $tabla);
                    foreach ($registro as $persona) :
                    ?>
                        <tr>
                            <th><?php echo $persona['paterno']; ?></th>
                            <td><?php echo $persona['materno']; ?></td>
                            <td><?php echo $persona['nombre']; ?></td>
                            <td><?php echo $persona['sexo']; ?></td>
                            <td><?php echo $persona['telefono']; ?></td>
                            <td><?php echo $persona['email']; ?></td>
                            <td><?php echo $persona['municipio']; ?></td>
                            <td><?php echo $persona['estado']; ?></td>
                            <td><?php echo "<a href='vista/actualizar.php?id={$persona['id']}'><button type='button' class='btn btn-primary'>Actualizar</button></a>" ?></td>
                            <td><?php echo "<a onclick='eliminar()' href='controlador/eliminar.php?id={$persona['id']}'><button type='button' class='btn btn-danger'>Eliminar</button></a>" ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </main>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/app.js"></script>
</body>

</html>