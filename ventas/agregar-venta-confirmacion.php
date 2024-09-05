<?php

session_start();

 if(isset( $_SESSION['odo_usu_id'])){
 
require '../header.php';
require '../sidebarmenu.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
 
  

  <?php
$idusuario = $_SESSION["odo_usu_id"];

date_default_timezone_set('America/Caracas');
$datoactual = date("Y-m-d H:i:s");
$fecha = date("Y-m-d");
$hora = date("H:i:s");
if(isset($_POST["factura"])&&isset($_POST["razonsocial"])&&isset($_POST["nit"])&&isset($_POST["p"])&&isset($_POST["c"])&&isset($_POST["pre"])){
//if(isset($_POST["factura"])){

$f = $_POST["factura"];
$rs = $_POST["razonsocial"];
$n = $_POST["nit"];

$p = $_POST["p"];
$c = $_POST["c"];
$pre = $_POST["pre"];

$productos = array();
$cantidad = array();
$precio = array();


foreach ($p as $e => $v) {
  array_push($productos,$v);
}
foreach ($c as $e => $v) {
  array_push($cantidad,$v);
}
foreach ($pre as $e => $v) {
  array_push($precio,$v);
}

$total=0;
for($i =0 ; $i< count($productos); $i++){
  $total = $total + ($cantidad[$i] * $precio[$i]);
}

$sql = "INSERT INTO ventas VALUES(null,'$idusuario','$f','$rs','$n','$fecha','$hora','$total',0,'A')";
$conexionBD->conexion->query($sql);

$idventa=0;

$sql2 = "SELECT idventa FROM ventas ORDER BY idventa DESC LIMIT 1;";
if ($result = $conexionBD->conexion->query($sql2)) {
  while ($row = $result->fetch_assoc()) {
    $idventa = $row["idventa"];
  }
}

for($i =0 ; $i< count($productos); $i++){
  $prod=$productos[$i];
  $cant=$cantidad[$i];
  $prec=$precio[$i];
  $sql = "INSERT INTO productosvendidos VALUES(null,'$idventa','$prod','$cant','$prec','A')";
  $conexionBD->conexion->query($sql);
}
for($i =0 ; $i< count($productos); $i++){
  $sql = "UPDATE productos SET stock=stock-$cantidad[$i] WHERE idproducto='$productos[$i]'";
  $conexionBD->conexion->query($sql);
}

//-------

$listaproductos = array();
foreach ($productos as $e => $pp) {
  $sqlinsert = "SELECT nombre FROM productos WHERE idproducto='$pp';";
  if ($result = $conexionBD->conexion->query($sqlinsert)) {
    while ($row = $result->fetch_assoc()) {
      array_push($listaproductos,$row['nombre']);
    }
    $result->free();
  }
}

  ?>
<section class="content">
      <div class="container-fluid">
        <div>
            <p class="text-center text-secondary h4 p-2">SU VENTA HA SIDO REGISTRADA !</p>
        </div>
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
            $total = 0;
            $t =0;
            for($i =0 ; $i< count($productos); $i++){
              echo "<tr>";
              echo "<td>".$listaproductos[$i]."</td>";
              echo "<td style='text-align: center'>".$precio[$i]."</td>";
              echo "<td style='text-align: center'>".$cantidad[$i]."</td>";
              $t = $precio[$i] * $cantidad[$i];
              $total = $total + $t;
              echo "<td style='text-align: center'>".$t."</td>";
              echo "</tr>";
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
    <?php
      for($i =0 ; $i< count($productos); $i++){
        echo "<p>";
        echo $cantidad[$i]." ".$precio[$i];
        echo "</p>";
      }
      ?>

  </div>
  <?php


}else{
  echo "no recibe datos";
}
  ?>






    
</div>
  <!-- /.content-wrapper -->
  <?php
  require '../footer.php';
 }

  ?>