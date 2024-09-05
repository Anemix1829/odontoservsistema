<?php

session_start();

require '../tools/c0nnBD-0d0nt0S3rv.php';
$conexionBD = new ConexionBD();
$conexionBD->conectar();    

if(isset($_POST["n"])){
    $n=$_POST["n"];
    $c=$_POST["c"];
    $d=$_POST["d"];
    $p=$_POST["p"];
    $s=$_POST["s"];

    $sql = "INSERT INTO productos VALUES(null,'$n','$d','$p','$s',0,$c,'A');";
    $datos=$conexionBD->conexion->query($sql);
    echo "<p class='text-center'>el producto fue <b>AGREGADO</b> correctamente.</p>";
    

} 

?>
