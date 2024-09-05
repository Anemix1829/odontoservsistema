<?php

session_start();

include '../tools/c0nnBD-0d0nt0S3rv.php';
$conexionBD = new ConexionBD();
$conexionBD->conectar();    

$listausuarios = "SELECT v.*, c.nombres cn, c.apellidos ca FROM ventas v INNER JOIN clientes c ON v.idcliente=c.idcliente WHERE v.fecha=CURDATE() AND v.estado='V' ORDER BY v.fecha DESC;";

$datos=$conexionBD->conexion->query($listausuarios);
$n=1;
while($fila = mysqli_fetch_assoc($datos)){
    ?>
    <tr>
        <td><?= $n;?></td>
        <td><?= $fila['factura'];?></td>
        <td><?= $fila['cn']." ".$fila['ca'];?></td>
        <td><?= $fila['total'];?></td>
        <td class="d-flex justify-content-center">
            <div class="dropdown">
                <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </a>
                <ul class="dropdown-menu">
                <li onclick="InfoVentaDetalle(<?=$fila['idventa'];?>);"><a class="dropdown-item">VER DETALLE.</a></li>
                </ul>
            </div>
        </td>
    </tr>
    <?php
    $n++;
}
?>
                 
                 
       