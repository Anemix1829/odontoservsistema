<?php
session_start();

if(isset( $_SESSION['odo_usu_id'])){


require '../header.php';
require '../sidebarmenu.php';
date_default_timezone_set('America/Caracas');
$fecha = date("Y-m-d");
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

    <div class="d-flex justify-content-between p-3">
      <div>
        <button onclick="location.href='agregar-venta.php';" class="btn btn-success"><i class="fas fa-plus"></i> AGREGAR VENTA</button>
      </div>
      <div class="d-flex">
        <input type="date" id="fecha" class="form-control" value="<?php echo $fecha;?>">
        <button class="btn btn-dark" onclick="MostrarListaFactura()">buscar</button>
      </div>
    </div>



    <section class="content">
      <div class="container-fluid">
        <div>
        <div class="p-2">
          <h4 class="h4" id="m-especialidad">LISTA DE VENTAS REALIZADAS</h4>
        <div>
          <div style="width: 100%; max-width: 300px;" class="p-3">
            <input type="text" class="form-control" placeholder="Buscar..." id="in-busc" onkeyup="BuscadorTabla('list-productos')">
          </div>
        </div>
        <div style="overflow-x: scroll;">
          <table class="table table-striped" id="table">
            <thead>
              <tr>
                <th scope="col">Nro</th>
                <th scope="col">FACTURA</th>
                <th scope="col">RAZON SOCIAL</th>
                <th scope="col">NIT</th>
                <th scope="col">TOTAL</th>
                <th scope="col">DESCUENTO</th>
                <th scope="col">ESTADO</th>
                <th scope="col">opciones</th>
              </tr>
            </thead>
            <tbody id="list-productos">
              <?php
              $sqlinsert = "SELECT * FROM ventas WHERE fecha=CURDATE() AND estado='A' ORDER BY fecha,hora DESC;";

              if ($result = $conexionBD->conexion->query($sqlinsert)) {
                $n=1;
                while ($row = $result->fetch_assoc()) {
      
                  ?>
                      <tr>
                      <td><?php echo $n;?></td>
                      <td><?php echo $row['factura'];?></td>
                      <td><?php echo $row['razonsocial'];?></td>
                      <td><?php echo $row['nit'];?></td>
                      <td><?php echo $row['total'];?></td>
                      <td><?php echo $row['descuento'];?></td>
                      <td><?php 
                        if($row['estado']=="A"){
                          echo "<p class='text-success'>VERIFICADO</p>";
                        }elseif($row['estado']=="I"){
                          echo "<p class='text-danger'>ANULADO</p>";
                        }
                      ?>
                      </td>
                      <td class="d-flex">
                          <div>
                              <button class="btn btn-primary btn-sm rounded-0" data-placement="top" title="lista de productos" style="margin-right: 10px;" data-toggle='modal' data-target='#update' onclick="MostrarListaProdVentas(<?php echo $row['idventa'];?>);"><i class="fas fa-list"></i></button>
                          </div>
                          <?php 
                            if($row['estado']=="A"){
                              ?>
                              <form action="ver-factura.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idventa'];?>">
                                <button class="btn btn-light btn-sm rounded-0" data-placement="top" title="ver factura" style="margin-right: 10px;"><i class="far fa-file-pdf"></i></button>
                              </form>
                              <?php
                            }
                          ?>
                          <?php 
                            if($row['estado']=="A"){
                              ?>
                              <div>
                                <button class="btn btn-danger btn-sm rounded-0" data-placement="top" title="anular factura" data-toggle='modal' style="margin-right: 10px;" data-target='#update' onclick="EliminarFactura(<?php echo $row['idventa'];?>);"><i class="fa fa-trash"></i></button>
                              </div>
                              <?php
                            }
                          ?>
                      </td>
                    </tr>
                    <?php
                    $n++;
                }
                $result->free();

              }
              ?>
            </tbody>
          </table>
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
                </div>
              </div>
            </div>
          </div>
        </div>
      
      </div>
    </section>
  </div>
  


  <?php
  include '../footer.php';
      }
  ?>