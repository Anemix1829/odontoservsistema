<?php
session_start();

include '../tools/c0nnBD-0d0nt0S3rv.php';
$conexionBD = new ConexionBD();
$conexionBD->conectar();    

if(isset($_POST["id"])){
    $id=$_POST["id"];

    
    $sql = "SELECT * FROM usuarios WHERE idusuario=$id;";

    $datos=$conexionBD->conexion->query($sql);
    while($fila = mysqli_fetch_assoc($datos)){
        $n=$fila['nombres'];
        $a=$fila['apellidos'];
        if($fila['rol']=='admin'){$r=1;}else{$r=2;}
        $e=$fila['email'];
    }

?>
<form class="row" method="post" onsubmit="return ActualizarInfoConf(<?= $id;?>)">
    <div class="col-12 col-md-6 p-2">
        <label for="">NOMBRES</label>
        <input type="text" name="n" id="n" class="form-control" required>
    </div>
    <div class="col-12 col-md-6 p-2">
        <label for="">APELLIDOS</label>
        <input type="text" name="a" id="a" class="form-control" required>
    </div>
    <div class="col-12 col-md-6 p-2">
        <label for="">CORREO ELECTRÓNICO</label>
        <input type="email" name="e" id="e" class="form-control" required>
    </div>
    <div class="col-12 col-md-6 p-2">
        <label for="">ROL</label>
        <select class="form-control" name="r" id="r" required>
            <option value="">[SELECCIONE UNA OPCION]</option>
            <option value="1">ADMIN</option>
            <option value="2">EMPLEADO</option>
        </select>
    </div>
    <div class="col-12 d-flex justify-content-center p-2">
        <button type="submit" class="btn btn-primary">EDITAR USUARIO</button>
    </div>
    <script>
        $("#n").val("<?= $n;?>");
        $("#a").val("<?= $a;?>");
        $("#e").val("<?= $e;?>");
        $("#r > option[value='<?= $r;?>']").attr("selected",true);
    </script>
</form>

<?php
} 
?>