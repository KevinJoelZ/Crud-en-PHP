<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include ("conectarData.php");
    $nombre=(isset($_POST['nombre'])) ? $_POST[ 'nombre'] : '';
    $apellido=(isset($_POST['apellido'])) ? $_POST[ 'apellido'] : '';
    $edad=(isset($_POST['edad'])) ? $_POST[ 'edad'] : '';
    $errores=array();
    if(empty($nombre)){
        $errores['nombre'] = 'El nombre es obligatorio';
    }

    if(empty($apellido)){
        $errores['apellido'] = 'El apellido es obligatorio';
    }
    if(empty($edad)){
        $errores['edad'] = 'La edad es obligatorio';
    }

    if(empty($errores)){
        $sql=$conexion->query("insert into persona (nombre,apellido,edad) values(
        '$nombre','$apellido','$edad')");
        if($sql==1){
            //echo "Se ha insertado correctamente";
            header("Location: index.php");
        }else{
            echo "Error al insertar los datos";
        }
    }else{
        foreach($errores as $error){
            echo $error.'<br>';
        }
    }

}
?>