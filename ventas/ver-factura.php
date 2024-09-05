<?php

session_start();
include '../header.php';
include '../sidebarmenu.php';

$id = $_POST["id"];
$sqlinsert = "SELECT * FROM ventas WHERE idventa='$id'";
if ($result = $conexionBD->conexion->query($sqlinsert)) {
  while ($row = $result->fetch_assoc()) {
    $f = $row["factura"];
    $rs = $row["razonsocial"];
    $n = $row["nit"];
    $total = $row["total"];
  }
  $result->free();
}

?>

  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">VENTAS</h1>
                <div id="resultado">
                </div>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div>
    </div>

    



    <section class="content">
      <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center p-2">
          <button class="btn btn-outline-dark" onclick="location.href='./'"><i class="fas fa-chevron-left"></i> VOLVER</button>
          <button class="btn btn-light" onclick="imprimir('imp')"><i class="far fa-file-pdf"></i> IMPRIMIR</button>
        </div>

        <div id="imp" style="background-color: white;">
          <table border="0" style="border-collapse: collapse" width="100%">
            <tr>
              <td colspan="3">
                <img src="dist/img/logo.png" width="100" height="auto" alt="img">
              </td>
              <td colspan="2" style="text-align: right;">
                <H4>NOTA DE VENTA</H4>
              </td>
            </tr>
            <tr>
              <td colspan="4">
                <div>
                  <p style="margin: 0; padding:0;"><b>Nro. Factura: </b><?php echo $f;?></p>
                  <p style="margin: 0; padding:0;"><b>Razón Social: </b><?php echo $rs;?></p>
                  <p style="margin: 0; padding:0;"><b>NIT: </b><?php echo $n;?></p>
                </div>
              </td>
            </tr>
            <tr style="text-align: center; border-top: 2px solid black; border-bottom: 2px solid black;">
              <th>PRODUCTO</th>
              <th>PRECIO</th>
              <th>CANTIDAD</th>
              <th>TOTAL</th>
            </tr>
            <?php
            $sqlinsert = "SELECT vp.*, p.nombre FROM productosvendidos vp INNER JOIN productos p ON vp.idproducto=p.idproducto WHERE vp.idventa='$id';";
            if ($result = $conexionBD->conexion->query($sqlinsert)) {
              while ($row = $result->fetch_assoc()) {

                echo "<tr>";
                echo "<td>".$row["nombre"]."</td>";
                echo "<td style='text-align: center'>".$row["precio"]."</td>";
                echo "<td style='text-align: center'>".$row["cantidad"]."</td>";
                $t = $row["precio"] * $row["cantidad"];
                $total = $total + $t;
                echo "<td style='text-align: center'>".$t."</td>";
                echo "</tr>";
                
              }
              $result->free();
            }
            ?>

            <tr style="border-top: 2px solid black">
              <td colspan="3"></td>
              <td>SUBTOTAL:</td>
              <td><?php echo $total;?></td>
            </tr>
            <tr>
              <td colspan="3"></td>
              <td>DESCUENTOS:</td>
              <td>0.00</td>
            </tr>
            <tr>
              <td colspan="3"></td>
              <td style="background-color: gray; font-weight: bold;">TOTAL:</td>
              <td style="background-color: gray; font-weight: bold;"><?php echo $total;?></td>
            </tr>
          </table>
        </div>
          
      </div>
    </section>
  </div>
  


  <?php
  include 'footer.php';
  ?>