<?php

session_start();

include '../tools/c0nnBD-0d0nt0S3rv.php';
$conexionBD = new ConexionBD();
$conexionBD->conectar();    

if(isset($_POST["id"])){
    $id=$_POST["id"];
    $n=$_POST["n"];
    $a=$_POST["a"];
    $e=$_POST["e"];
    $r=$_POST["r"];

    $sql = "UPDATE usuarios SET nombres='$n',apellidos='$a',email='$e',rol=$r WHERE idusuario=$id;";
    $datos=$conexionBD->conexion->query($sql);
    echo "<p class='text-center'>LA INFORMACIÓN FUE ACTUALIZADA CORRECTAMENTE.</p>";
} 

?>
<div class="col-12 d-flex justify-content-center p-2">
    <button type="submit" class="btn btn-light" onclick="CerrarModal()">Cerrar</button>
</div>