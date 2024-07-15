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