<?php

session_start();

require '../tools/c0nnBD-0d0nt0S3rv.php';
$conexionBD = new ConexionBD();
$conexionBD->conectar();    

if(isset($_POST["n"])){
    $n=$_POST["n"];
    $a=$_POST["a"];
    $t=$_POST["t"];
    $d=$_POST["d"];
    $e=$_POST["e"];

    $sql0 = "SELECT count(*) t FROM clientes WHERE email='$e' OR telefono='$t';";
    $datos0=$conexionBD->conexion->query($sql0);
    $fila = mysqli_fetch_assoc($datos0);
    $cant=$fila['t'];

    if($cant==0){
        $sql = "INSERT INTO clientes VALUES(null,'$n','$a',null,'$t','$d','$e');";
        $datos=$conexionBD->conexion->query($sql);
        echo "<p class='text-center'>el usuario fue <b>AGREGADO</b> correctamente.</p>";
    }else{
        echo "<p class='text-center text-danger'><b>NO PUEDE SER AGREGADO: </b> el cliente ya existe.</p>";
    }

} 

?>
