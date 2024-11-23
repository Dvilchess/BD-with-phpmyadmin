<?php
// registro de personas extraviadas
    session_start();
    include 'conexionBD.php';
    if(isset($_POST['Enviar'])){
        if(strlen($_POST['rut_pextraviada']) >= 1 &&
            strlen($_POST['direccion']) >= 1 &&
            strlen($_POST['nombre']) >= 1 &&
            strlen($_POST['ropa']) >= 1 &&
            strlen($_POST['hora']) >= 1 &&
            strlen($_POST['rasgos']) >= 1 &&
            strlen($_POST['edad']) >= 1) {
                $rut_pextraviada = ($_POST['rut_pextraviada']);
                $direccion = ($_POST['direccion']);
                $nombre = ($_POST['nombre']);
                $ropa = ($_POST['ropa']);
                $hora = ($_POST['hora']);
                $rasgos = ($_POST['rasgos']);
                $edad = ($_POST['edad']);
                $rut_pn = ($_SESSION['rut_pnatural']); //lo usamos para en la parte de modificar y eliminar solo despliegue los datos que el usuario a subido
                $sql = "INSERT INTO personaextraviada VALUES ('$rut_pextraviada','$rut_pn','$direccion','$nombre','$ropa','$hora','$rasgos','$edad')";
                $resultado = mysqli_query($conexion,$sql);
                if($resultado){
                    echo "<script>
                    alert('Persona extraviada registrada correctamente');
                    window.location= 'formulariopext.php'
                    </script>";
                }
                else{
                    
                    echo "<script>
                    alert('Fallo al registrar');
                    window.location= 'formulariopext.php'
                    </script>";
                    
                }
            }
        }

?>