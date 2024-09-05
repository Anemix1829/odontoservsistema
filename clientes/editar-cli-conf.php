<?php

session_start();

include '../tools/c0nnBD-0d0nt0S3rv.php';
$conexionBD = new ConexionBD();
$conexionBD->conectar();    

if(isset($_POST["id"])){
    $id=$_POST["id"];
    $n=$_POST["n"];
    $a=$_POST["a"];
    $t=$_POST["t"];
    $d=$_POST["d"];
    $e=$_POST["e"];

    $sql0 = "SELECT count(*) t FROM clientes WHERE idcliente NOT IN ($id) AND (email='$e' OR telefono='$t');";
    $datos0=$conexionBD->conexion->query($sql0);
    $fila = mysqli_fetch_assoc($datos0);
    $cant=$fila['t'];

    if($cant==0){
        $sql = "UPDATE clientes SET nombres='$n',apellidos='$a',email='$e',telefono='$t', direccion='$d' WHERE idcliente=$id;";
        $datos=$conexionBD->conexion->query($sql);
        echo "<p class='text-center'>LA INFORMACIÓN FUE ACTUALIZADA CORRECTAMENTE.</p>";
    }else{
        echo "<p class='text-center text-danger'><b>LOS DATOS NO PUEDEN SER ACTUALIZADOS: </b> el Correo Electronico o Teléfono ya están resgistrados.</p>";
    }
} 

?>
<div class="col-12 d-flex justify-content-center p-2">
    <button type="submit" class="btn btn-light" onclick="CerrarModal()">Cerrar</button>
</div>