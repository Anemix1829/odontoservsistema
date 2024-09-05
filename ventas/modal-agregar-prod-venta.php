<?php
include '../tools/c0nnBD-0d0nt0S3rv.php';

$conexionBD = new ConexionBD();
$conexionBD->conectar();  
?>
<form id="form-add-cat">
      <div class="modal-body">
      <div class="form-group">
          <input type="text" class="form-control" placeholder="Buscar..." id="in-busc" onkeyup="BuscadorTabla('list-vent')">
        </div>
        
        <div class="form-group">
          <table class="table" style="border-collapse: collapse" width="100%">
            <tbody id="list-vent">
          <?php
            $sqlinsert = "SELECT p.*, c.nombre cate FROM productos p INNER JOIN categorias c ON p.idcategoria=c.idcategoria WHERE p.estado='A' AND p.stock>0;";

            if ($result = $conexionBD->conexion->query($sqlinsert)) {
              $a =0;
              while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td width="40%"><img src="<?php echo "../img/box-empty.png";?>" alt="prod" width="auto" height="100"></td>
                  <td width="60%">
                    <input type="hidden" class="idPVen" value="<?php echo $row['idproducto'];?>">
                    <p class="m-0 p-0 pnombre"><b><?php echo $row['nombre'];?></b></p>
                    <p class="m-0 p-0 pcategoria"><?php echo $row['cate'];?></p>
                    <p class="m-0 p-0 pprecio"><?php echo $row['precio'];?></p>

                    <div class="d-flex">
                      <div class="col-6">
                        <select class="form-control selcant">
                          <option value="1">1</option>
                          <?php
                          $n=2;
                          if($row['stock']>1){
                            do{
                              echo '<option value="'.$n.'">'.$n.'</option>';
                              $n++;
                            }while($n<=$row['stock']);
                          }
                          ?>
                        </select>
                      </div>
                      <div class="col-6">
                        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="ElProdVen(<?php echo $a;?>);">AGREGAR</button>
                      </div>
                    </div>

                  </td>
                </tr>
                  <?php
                  $a++;
              }
              $result->free();
      
            }
            ?>
            </tbody>
          </table>
        </div>
</form>