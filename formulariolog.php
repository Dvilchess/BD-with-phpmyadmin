<?php
session_start();
//formulario para iniciar sesion
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
    <?php if(isset($_SESSION['rut_pnatural'])): // con estos if cambia los botones entre registrarse/iniciar sesion o cerrar sesion dependiendo de el estado del usuario?> 
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
      
<form method="POST"action="login.php">

<h1>Iniciar Sesion</h1>
<label>Rut:</label>
<input type=number name= "rut_login" placeholder=" Ingrese Rut">
<label>contraseña:</label>
<input type=text name= "contraseña_login" placeholder=" Ingrese Contraseña">
<input type="submit" name="Enviar" placeholder="Enviar">


</form>



</body>

</html>
