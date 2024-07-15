<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/25921e2f9d.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    if (!empty($_GET['id'])) {
        include("conectarData.php");
        $id = $_GET['id'];
        $sql = $conexion->query("delete from persona where id=$id");
        if ($sql == 1) {
            echo "<p class='alert alert-primary'>Registro eliminado con exito</p>";
        } else {
            echo "<p class='alert alert-primary'>Error al eliminar</p>";
        }
    }
    ?>
    <div class="container">
        <p class="text-center p-4">Registro de usuarios</p>
        <div class="row">
            <div class="col-4">
                <form action="registrarUsuario.php" method="post">
                    <div>
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre">
                    </div>
                    <div>
                        <label class="form-label">Apellido:</label>
                        <input type="text" class="form-control" name="apellido">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Edad:</label>
                        <input type="text" class="form-control" name="edad">
                    </div>

                    <div>
                        <button class="btn btn-primary">Registrar</button>
                    </div>

                </form>

            </div>
            <div class="col-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Edad</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("conectarData.php");
                        $sql = $conexion->query("select * from persona");
                        while ($fila = $sql->fetch_object()) { ?>
                            <tr>
                                <td><?= $fila->id ?></td>
                                <td><?= $fila->nombre ?></td>
                                <td><?= $fila->apellido ?></td>
                                <td><?= $fila->edad ?></td>
                                <td>
                                    <a class="btn btn-danger" href="index.php?id=<?= $fila->id ?>"><i class="fa-solid fa-trash"></i></a>
                                    <a class="btn btn-info" href="modificarUsuario.php?id=<?= $fila->id ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                            </tr>
                        <?php }

                        ?>


                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>