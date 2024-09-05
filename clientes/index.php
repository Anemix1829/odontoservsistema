<?php

session_start();

 if(isset( $_SESSION['odo_usu_id'])){
 

require '../header.php';
require '../sidebarmenu.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div id="rescorreo" class="d-flex justify-content-end">
    </div>
    
  <h1 class="h3 text-center">LISTA DE CLIENTES</h1>
  <div class="p-3">
    <button class="btn btn-success btn-sm" onclick="ModalagregarCliente();"><i class="fas fa-user-plus"></i> AGREGAR CLIENTE</button>
  </div>

<div class="p-3" style="overflow-x: auto; min-height: 200px;">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">NOMBRES</th>
        <th scope="col">APELLIDOS</th>
        <th scope="col">TELÉFONO</th>
        <th scope="col">DIRECCIÓN</th>
        <th scope="col">CORREO ELECTRÓNICO</th>
        <th scope="col">OPCIONES</th>
      </tr>
    </thead>
    <tbody id="list">
    <?php

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
    </tbody>
  </table>
</div>
    
</div>


<div class="modal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" onclick="CerrarModal();" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
    </div>
  </div>
</div>


<script>
  
    //MostrarLista();
</script>
  <!-- /.content-wrapper -->
  <?php
  require '../footer.php';
 }

  ?>