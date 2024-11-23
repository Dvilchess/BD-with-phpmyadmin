<?php
    session_start();
    include 'conexionBD.php';
//con esto eliminamos la fila 
    if(isset($_GET['id'])){
        $rut = ($_GET['id']);
        $sql = "DELETE FROM personaextraviada WHERE rut_pextraviada = $rut"; 
        $resultado = mysqli_query($conexion,$sql);
                if(!$resultado){
                    die ("No se pudo eliminar");
                }
                else{
                    
                    echo "<script>
                    alert('se elimino correctamente');
                    window.location= 'formulariopext.php'
                    </script>";
                }
            }
?>