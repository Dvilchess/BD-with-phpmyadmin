<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title> Buscador de Personas Extraviadas </title>
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
<body>

<form method="POST"action="regdisplay.php">
<h1>Lista de Personas Extraviadas </h1>
<label>Buscar por direccion:</label>
<input type=text name= "direccion" placeholder=" Ingrese Direccion">

<input type="submit" name="Buscar" placeholder="Buscar">


</form>


</body>

</html>
<?php

    if(isset($_POST['Buscar'])){
        
                $direccion = ($_POST['direccion']);

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "ProyectoBaseDeDatos";
                
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                
                $sql = "SELECT rut_pextraviada, direccion, nombre, ropa, hora, rasgos, edad FROM personaextraviada WHERE direccion LIKE '%$direccion%'";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo " - Rut: " . $row["rut_pextraviada"]. " - Nombre: " . $row["nombre"]." - Direccion: " . $row["direccion"]. " - Aspecto: " . $row["ropa"]. " - Hora: " . $row["hora"]. " - Rasgos: " . $row["rasgos"].  " - Edad: " . $row["edad"]."<br>";
                  }
                } else {
                  echo "0 results";
                }
                $conn->close();
                
                }
            
    
?>


