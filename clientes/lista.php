<?php

session_start();

include '../tools/c0nnBD-0d0nt0S3rv.php';
$conexionBD = new ConexionBD();
$conexionBD->conectar();    

$listausuarios = "SELECT * FROM clientes;";

$datos=$conexionBD->conexion->query($listausuarios);
$n=1;
while($fila = mysqli_fetch_assoc($datos)){
    ?>
    <tr>
        <td><?= $n;?></td>
        <td><?= $fila['nombres'];?></td>
        <td><?= $fila['apellidos'];?></td>
        <td><?= $fila['telefono'];?></td>
        <td><?= $fila['direccion'];?></td>
        <td><?= $fila['email'];?></td>
        <td class="d-flex justify-content-center">
            <div class="dropdown">
                <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </a>
                <ul class="dropdown-menu">
                <li onclick="ActualizarInfoCli(<?=$fila['idcliente'];?>);"><a class="dropdown-item">editar info.</a></li>
                </ul>
            </div>
        </td>
    </tr>
    <?php
    $n++;
}
?>
                 
                 
       