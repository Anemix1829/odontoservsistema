<?php
include '../tools/c0nnBD-0d0nt0S3rv.php';

$conexionBD = new ConexionBD();
$conexionBD->conectar();
$id = $_POST["idcliente"];

?>
<div>
  <div class="modal-body">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>PRODUCTO</th>
          <th>CANTIDAD</th>
          <th>PRECIO UNITARIO</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = "SELECT v.*, p.nombre FROM productosvendidos v INNER JOIN productos p ON v.idproducto=p.idproducto WHERE v.idventa='$id';";
          if ($result = $conexionBD->conexion->query($sql)) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>".$row["nombre"]."</td>";
              echo "<td>".$row["cantidad"]."</td>";
              echo "<td>".$row["precio"]."</td>";
              echo "</tr>";
            }
          }
        ?>
      </tbody>
    </table>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
</div>