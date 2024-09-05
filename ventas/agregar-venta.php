<?php

session_start();
include '../header.php';
include '../sidebarmenu.php';

date_default_timezone_set('America/Caracas');
$hoy = date("Y-m-d");
$fefa = date("dmy");

$sql = "SELECT count(*) t FROM ventas WHERE fecha='$hoy;'";
$result = $conexionBD->conexion->query($sql);
$fila = mysqli_fetch_assoc($result);
$factura=$fila['t'];
$factura = $factura+1; 
?>

  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div>
          <div class="col-sm-6">
            <h1 class="m-0">AGREGAR VENTAS</h1>
            <div>
              <button class="btn btn-dark" onclick="location.href='./'">VOLVER</button>
            </div>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div>
    </div>
  
    <section class="content">
    <form id="form-venta" method="POST" action="agregar-venta-confirmacion.php">

      <div class="container-fluid">
        <div class="row">
            <div class="form-group col-12">
              <label>NRO FACTURA</label>
              <input type="text" name="factura" class="form-control" value="<?php echo "REC-".$fefa."-".$factura;?>" required>
            </div>
            <div class="form-group col-12 col-sm-6">
              <label>RAZON SOCIAL</label>
              <input type="text" name="razonsocial" class="form-control">
            </div>
            <div class="form-group col-12 col-sm-6">
              <label>NIT</label>
              <input type="text" name="nit" class="form-control">
            </div>
        </div>
        <div class="row">
          <div style="width: auto; max-width: 400px;" class="pb-2">
            <button type="button" class="btn btn-success" data-toggle='modal' data-target='#update'" onclick="AgregarProductoVenta()">AGREGAR PRODUCTO</button>
          </div>
        </div>
      </div>




      <div style="overflow-x: scroll;">
          <table class="table table-striped" id="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">PRODUCTO</th>
                <th scope="col">CANTIDAD</th>
                <th scope="col">PRECIO</th>
                <th scope="col">opciones</th>
              </tr>
            </thead>
            <tbody id="list-productos">
            </tbody>
          </table>
        </div>

    <div class="d-flex justify-content-between flex-wrap p-2">
      <p><b>TOTAL: </b><span id="pagoproductos">0.00</span></p>
      <p><b>DESCUENTOS: </b><span id="pagodescuentos">0.00</span></p>
      <p><b>TOTAL A PAGAR: </b><span  id="pagototal">0.00</span></p>
    </div>


    <button type="submit" id="btn-conf-venta" class="btn btn-success" style="display: none;"><i class="fas fa-check"></i> CONFIRMAR VENTA</button>
    </form>


    </section>
  </div>

  <div id="res2">

  </div>


  <div id="contenedorModal">
          <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="modal-title">AGREGAR PRODUCTO</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  
                </div>
                <div id="modalproducto">
                  <div class="modal-body">
                  
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

  <?php
  include '../footer.php';
  ?>