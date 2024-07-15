<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form class="col-4 m-auto" action="updateUser.php" method="post">
            <input type="text" name="id" value="<?= $_GET['id'] ?>" hidden>
            <?php
            include("conectarData.php");
            $id = $_GET['id'];
            $sql = $conexion->query("select * from persona where id =$id");
            while ($fila = $sql->fetch_object()) { ?>

                <div>
                    <label class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" value="<?= $fila->nombre ?>">

                </div>
                <div>
                    <label class="form-label">Apellido:</label>
                    <input type="text" class="form-control" name="apellido" value="<?= $fila->apellido ?>">
                </div>

                <div class="mb-4">
                    <label class="form-label">Edad:</label>
                    <input type="text" class="form-control" name="edad" value="<?= $fila->edad ?>">
                </div>

            <?php }
            ?>


            <div>
                <button class="btn btn-primary">Registrar</button>
            </div>

        </form>
    </div>
</body>

</html>