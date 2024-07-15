<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include ("conectarData.php");
    $nombre=(isset($_POST['nombre'])) ? $_POST[ 'nombre'] : '';
    $apellido=(isset($_POST['apellido'])) ? $_POST[ 'apellido'] : '';
    $edad=(isset($_POST['edad'])) ? $_POST[ 'edad'] : '';
    $id=(isset($_POST['id']))? $_POST['id'] : '';

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
        $sql=$conexion->query("update persona set nombre='$nombre' ,apellido= '$apellido'
        ,edad='$edad' where id=$id");
        if($sql==1){
           header("location:index.php");
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