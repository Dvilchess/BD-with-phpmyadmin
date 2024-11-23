<?php
    session_start();
    include 'conexionBD.php';
// No explicare que hace el codigo porque no funciona.
    if(isset($_GET['id'])){
        $rut = ($_GET['id']);
        $sql = "SELECT * FROM personaextraviada WHERE rut_pextraviada = $rut";
        $resultado = mysqli_query($conexion,$sql);
                if(mysqli_num_rows($resultado)){
                    $fila =mysqli_fetch_array($resultado);
                    $rut_pextraviada = $fila['rut_pextraviada'];
                    $direccion = $fila['direccion'];
                    $nombre = $fila['nombre'];
                    $ropa = $fila['ropa'];
                    $hora = $fila['hora'];
                    $rasgos = $fila['rasgos'];
                    $edad = $fila['edad'];
                    $rut_pn = ($_SESSION['rut_pnatural']);

                 
                }
            }

            if(isset($_POST['Actualizar'])){
                $rut = $_GET ['id'];
                $rut_pextraviada = ($_POST['rut_pextraviada']);
                $direccion = ($_POST['direccion']);
                $nombre = ($_POST['nombre']);
                $ropa = ($_POST['ropa']);
                $hora = ($_POST['hora']);
                $rasgos = ($_POST['rasgos']);
                $edad = ($_POST['edad']);
                $rut_pn = ($_SESSION['rut_pnatural']);

                $sql = "UPDATE personaextraviada SET rut_pextraviada='$rut_pextraviada',rut_pn='$rut_pn',direccion='$direccion',nombre='$nombre',ropa='$ropa',hora='$hora',rasgos=' $rasgos',edad='$edad' WHERE rut_pextraviada = $rut";
                mysqli_query ($conexion, $sql);
                header ("location: formulariopext.php");
            }
?>

<!DOCTYPE html>
<html>
<head>
    <title> Formulario Modificar Personas Extaviadas </title>
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
<form action="editarpext.php?id= <?php echo $GET["id"]?>" method= "POST">
<?//<form method="POST"action="editarpext.php"> cuando lo uso con esto el boton enviar funciona pero me tira error de array en la linea 6 y otra cosa en la 9//?>

<h1>Formulario Modificar Persona extraviada </h1>
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
<input type="submit" name="Actualizar" placeholder="Actualizar">
<br>
<br>

</form>


</body>

</html>
