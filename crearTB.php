<?php
    //estos codigos son para crear las tablas de la base de datos
    include 'conexionBD.php';
    $sql = "CREATE TABLE personanatural (
        rut_pnatural INT(8) PRIMARY KEY,
        contraseña_n VARCHAR (100),
        correo_pnatural VARCHAR(100),
        numero_serie INT(9),
        telefono INT(10),
        domicilio VARCHAR(100)
    )";

    $sql1 = " CREATE TABLE consultor (
        rut_consultor INT(8) PRIMARY KEY,
        contraseña_c VARCHAR (100),
        ubicacion VARCHAR(100),
        correo_c VARCHAR(100)
    )";

    $sql2 = "CREATE TABLE personaextraviada (
        rut_pextraviada INT(10) PRIMARY KEY,
        rut_pn INT (10),
        direccion VARCHAR(100),
        nombre VARCHAR(100),
        ropa VARCHAR(100),
        hora DATETIME,
        rasgos VARCHAR(100),
        edad INT(10)
    )";

    if($conexion -> query($sql) === TRUE){
        if($conexion -> query($sql1) === TRUE){
            if($conexion -> query($sql2) === TRUE){
                echo "Tablas creadas correctamente.";
            }
        }
    }
    else{
        die("Error al crear tablas:" .$conexion -> error);
    }                    
?>