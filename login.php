<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title> Formulario login </title>
<meta charset="utf-8">

<!---bootstrap css--->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container">
<header class="d-flex justify-content-center py-3">
  <ul class="nav nav-pills">
    <li class="nav-item"><a href="http://localhost/BDPE/principal.php" class="nav-link" >Inicio</a></li>
    <li class="nav-item"><a href="http://localhost/BDPE/display.php" class="nav-link">Personas Extraviadas</a></li>
    <li class="nav-item"><a href="http://localhost/BDPE/formulariopext.php" class="nav-link">Subir o modificar informacion</a></li>
    <?php if(isset($_SESSION['rut_pnatural'])): ?>
      <li class="nav-item"><a href="http://localhost/BDPE/logout.php" class="nav-link active" aria-current="page">Cerrar Sesion</a></li>
    <?php else: ?>
       <li class="nav-item"><a href="http://localhost/BDPE/formulariolog.php" class="nav-link active" aria-current="page">login</a></li>
       &nbsp;
       <li class="nav-item"><a href="http://localhost/BDPE/formulariopna.php" class="nav-link active" aria-current="page">Registrarse</a></li>
    <?php endif; ?>
  </ul>
</header>
</div>
</head>

<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ProyectoBaseDeDatos";
 
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  if (!$conn) {
    die("Connection failed: " .mysqli_connect_error());
  }  
 
  if(isset($_SESSION['rut_pnatural'])){
  }else{

  


  $rut = $_POST["rut_login"];
  $contraseña = $_POST["contraseña_login"];

  $query = mysqli_query($conn, "SELECT * FROM personanatural WHERE rut_pnatural = '".$rut."' and contraseña_n = '".$contraseña."'");
  $nr = mysqli_num_rows($query);
  if ($nr == 1)
{
  $_SESSION['rut_pnatural'] = $rut; //guardar el rut de la persona logueada para hacer uso de el mas adelante//
header("Location: login.php");
}
else{ 
  echo "<script>
                    alert('El usuario o contraseña que usted ingreso se encuentra errone');
                    window.location= 'principal.php'
                    </script>";
}
  }
?>


