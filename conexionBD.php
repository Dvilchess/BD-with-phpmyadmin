<?php
    //esto lo usamos para conectarnos a la base de datos
    $conexion = mysqli_connect('localhost','root','','ProyectoBaseDeDatos');
    if($conexion -> connect_error){
        die("Error al conectar con la base de datos" .$conexion -> connect_error);
    }
?>