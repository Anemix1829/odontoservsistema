<?php

session_start();

require '../tools/c0nnBD-0d0nt0S3rv.php';
$conexionBD = new ConexionBD();
$conexionBD->conectar();    

if(isset($_POST["n"])){
    $n=$_POST["n"];
    $a=$_POST["a"];
    $e=$_POST["e"];
    $r=$_POST["r"];

    /* SMTP */
    function generarTexto() {
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $longitud_caracteres = strlen($caracteres);
    
        $texto = '';
        for ($i = 0; $i < 10; $i++) {
            $texto .= $caracteres[rand(0, $longitud_caracteres - 1)];
        }
        return $texto;
    }

    $contra=generarTexto();
    $hash = password_hash($contra, PASSWORD_DEFAULT, ['cost'=>5]);

    /*----------------- */





    $sql = "INSERT INTO usuarios VALUES(null,'$n','$a','$e','$hash',$r,'A');";
    $datos=$conexionBD->conexion->query($sql);
    echo "<p class='text-center'>el usuario fue <b>AGREGADO</b> correctamente.</p>";
} 

?>
<div class="col-12 d-flex justify-content-center p-2">
    <button type="submit" class="btn btn-dark" onclick="EnviarCorreo('<?= $e; ?>','<?= $contra; ?>')"><i class="fas fa-envelope-open-text"></i> ENVIAR CORREO ELECTRONICO</button>
</div>