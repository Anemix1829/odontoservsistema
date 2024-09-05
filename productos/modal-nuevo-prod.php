<?php

session_start();

include '../tools/c0nnBD-0d0nt0S3rv.php';
$conexionBD = new ConexionBD();
$conexionBD->conectar();    

?>

<form class="row" method="post" onsubmit="return AddProdConf();">
    <div class="col-12 col-md-6 p-2">
        <label for="">NOMBRE</label>
        <input type="text" name="n" id="n" class="form-control" required>
    </div>
    <div class="col-12 col-md-6 p-2">
        <label for="">CATEGORIA</label>
        <select name="c" id="c" class="form-control">
            <option value="">[SELECCIONE UNA CATEGORIA]</option>
            <?php
                $listaprod = "SELECT idcategoria, nombre FROM categorias ORDER BY nombre DESC;";
                $datos=$conexionBD->conexion->query($listaprod);
                while($fila = mysqli_fetch_assoc($datos)){
                    ?>
                <option value="<?=$fila['idcategoria'];?>"><?=$fila['nombre'];?></option>
                    <?php
                }
                ?>
        </select>
    </div>
    <div class="col-12 col-md-6 p-2">
        <label for="">DESCRIPCION</label>
        <textarea name="d" id="d" class="form-control"></textarea>
    </div>
    <div class="col-12 col-md-6 p-2">
        <label for="">PRECIO</label>
        <input type="number" name="p" id="p" class="form-control" required>
    </div>
    
    <div class="col-12 col-md-6 p-2">
        <label for="">STOCK</label>
        <input type="number" name="s" id="s" class="form-control" required>
    </div>
    <div class="col-12 d-flex justify-content-center p-2">
        <button type="submit" class="btn btn-primary">AGREGAR PRODUCTO</button>
    </div>
</form>