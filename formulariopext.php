<?php
  session_start();
  
  // Controlo si el usuario ya está logueado en el sistema.
  if(isset($_SESSION['rut_pnatural'])){
      
  }else{
    // ya que para ingresar a una persona necesitamos que este logueado aqui lo enviaremos a la pagina para loguearse.
    echo "<script>
                    alert('Para agregar o modificar porfavor inicie sesion');
                    window.location= 'formulariolog.php'
                    </script>";
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title> Buscador de Personas Extaviadas </title>
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

<form method="POST"action="registrarpextr.php">

<h1>Formulario Persona extraviada </h1>
<label>Rut:</label>
<input type=number name= "rut_pextraviada" placeholder=" Ingrese rut">
<label>Direccion:</label>
<input type=text name= "direccion" placeholder=" Ingrese direccion ">
<label>Nombre:</label>
<input type=text name= "nombre" placeholder=" Ingrese Nombre">
<label>Ropa:</label>
<input type=text name= "ropa" placeholder=" Ingrese Ropa">
<label for="hora">Fecha y Hora:</label>
<input type="datetime-local" id="hora" name="hora">
<label>Rasgos:</label>
<input type=text name= "rasgos" placeholder=" Ingrese Rasgos">
<label>Edad:</label>
<input type=text name= "edad" placeholder=" Ingrese edad">
<input type="submit" name="Enviar" placeholder="Enviar">
<br>
<br>

<?php
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

$sql = "SELECT rut_pextraviada,rut_pn,direccion, nombre, ropa, hora, rasgos, edad FROM personaextraviada";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($_SESSION['rut_pnatural'] == $row["rut_pn"]) //con este if hace que solo se le muestren las personas subidas desde ese usuario
    {?>
    <a class="btn btn-danger"a href="http://localhost/BDPE/eliminarpext.php?id=  <?php echo $row["rut_pextraviada"]?>" class="far fa-trash.alt" >eliminar</a>
    <a class="btn btn-primary"a href="http://localhost/BDPE/editarpext.php?id= <?php echo $row["rut_pextraviada"]?>" class="far fa-marker" >Modificar</a>
    <?php echo "Rut: " . $row["rut_pextraviada"]. " - Nombre: " . $row["nombre"]."<br> <br>";
     
     }
    
    
  }
} else {
  echo "No tienes personas extraviadas registradas";
}
$conn->close();
?>

</form>


</body>

</html>

