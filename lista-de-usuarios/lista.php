<?php

session_start();

include '../tools/c0nnBD-0d0nt0S3rv.php';
$conexionBD = new ConexionBD();
$conexionBD->conectar();    

$listausuarios = "SELECT * FROM usuarios;";

$datos=$conexionBD->conexion->query($listausuarios);
$n=1;
while($fila = mysqli_fetch_assoc($datos)){
    ?>
    <tr>
        <td><?= $n;?></td>
        <td><?= $fila['nombres'];?></td>
        <td><?= $fila['apellidos'];?></td>
        <td><?= $fila['email'];?></td>
        <td><?= $fila['rol'];?></td>
        <td><?= $fila['estado'];?></td>
        <td class="d-flex justify-content-center">
            <div class="dropdown">
                <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </a>
                <ul class="dropdown-menu">
                <li onclick="ActualizarInfo(<?=$fila['idusuario'];?>);"><a class="dropdown-item">editar info.</a></li>
                <?php if($fila['estado']=='I'){
                        ?><li onclick="HabilitarUsu(<?=$fila['idusuario'];?>);"><a class="dropdown-item" style="color: green;">Habilitar</a></li><?php
                    }elseif($fila['estado']=='A'){
                        ?><li onclick="InhabilitarUsu(<?=$fila['idusuario'];?>);"><a class="dropdown-item" style="color: red;">Inhabilitar</a></li><?php
                    }
                        ?>
                </ul>
            </div>
        </td>
    </tr>
    <?php
    $n++;
}
?>
                 
                 
       