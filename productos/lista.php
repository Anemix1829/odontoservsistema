<?php

session_start();

include '../tools/c0nnBD-0d0nt0S3rv.php';
$conexionBD = new ConexionBD();
$conexionBD->conectar();    

$listausuarios = "SELECT p.*,c.nombre cate FROM productos p INNER JOIN categorias c ON p.idcategoria=c.idcategoria;";

$datos=$conexionBD->conexion->query($listausuarios);
$n=1;
while($fila = mysqli_fetch_assoc($datos)){
    ?>
    <tr>
        <td><?= $n;?></td>
        <td><?= $fila['nombre'];?></td>
        <td><?= $fila['descripcion'];?></td>
        <td><?= $fila['cate'];?></td>
        <td><?= $fila['precio'];?></td>
        <td><?= $fila['stock'];?></td>
        <td class="d-flex justify-content-center">
            <div class="dropdown">
                <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </a>
                <ul class="dropdown-menu">
                <li onclick="ActualizarInfoProd(<?=$fila['idproducto'];?>);"><a class="dropdown-item">editar info.</a></li>
                </ul>
            </div>
        </td>
    </tr>
    <?php
    $n++;
}
?>
                 
                 
       