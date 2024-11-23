<?php
    //esto lo usamos para crear la baes de datos
    $conexion = mysqli_connect('localhost','root','');
    if($conexion -> connect_error){
        die("Conexion fallo: ". $conexion -> connect_error);

    }

    $sql = "CREATE DATABASE ProyectoBaseDeDatos";
    if($conexion -> query($sql) === true){
        echo "Base de datos creada exitosamente";
    }
    else{
        die("Error en la creacion: " .$conexion -> error);
    }
     
?>