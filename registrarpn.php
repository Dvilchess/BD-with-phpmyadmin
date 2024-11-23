<?php
    include 'conexionBD.php';
    if(isset($_POST['Enviar'])){
        if(strlen($_POST['rut_pnatural']) >= 1 &&
            strlen($_POST['contraseña_n']) >= 1 &&
            strlen($_POST['correo_pnatural']) >= 1 &&
            strlen($_POST['numero_serie']) >= 1 &&
            strlen($_POST['telefono']) >= 1 &&
            strlen($_POST['domicilio']) >= 1) {
                $rut_pnatural = ($_POST['rut_pnatural']);
                $contraseña_n = ($_POST['contraseña_n']);
                $correo_pnatural = ($_POST['correo_pnatural']);
                $numero_serie = ($_POST['numero_serie']);
                $telefono = ($_POST['telefono']);
                $domicilio = ($_POST['domicilio']);
                $sql = "INSERT INTO personanatural VALUES ('$rut_pnatural','$contraseña_n','$correo_pnatural','$numero_serie','$telefono','$domicilio')";
                $resultado = mysqli_query($conexion,$sql);
                if($resultado){
                   
                    header("Location: principal.php");
                }
                else{
                    
                    echo "<script>
                    alert('Fallo al registrar');
                    window.location= 'formulariopna.php'
                    </script>";
                    
                }
            }
}
?>