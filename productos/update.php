<?php

session_start();

include '../tools/c0nnBD-0d0nt0S3rv.php';
$conexionBD = new ConexionBD();
$conexionBD->conectar();    

if(isset($_POST["in"])){
    $in=$_POST["in"];
    $sql = "UPDATE usuarios SET estado='I' WHERE id=$in;";
    $datos=$conexionBD->conexion->query($sql);
    echo "<p class='text-center'>el usuario fue <b>INHABILITADO</b></p>";
} 
if(isset($_POST["hab"])){
    $hab=$_POST["hab"];
    $sql = "UPDATE usuarios SET estado='A' WHERE id=$hab;";
    $datos=$conexionBD->conexion->query($sql);
    echo "<p class='text-center'>el usuario fue <b>HABILITADO</b></p>";
}
?>
<div class="col-12 d-flex justify-content-center p-2">
    <button type="submit" class="btn btn-light" onclick="CerrarModal()">Cerrar</button>
</div>