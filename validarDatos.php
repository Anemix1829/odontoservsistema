<?php  


    session_start();

    

    require 'tools/c0nnBD-0d0nt0S3rv.php';

    $conexionBD = new ConexionBD();
    $conexionBD->conectar();    

    $correo = $_POST['correo'];
    $contra = $_POST['contra'];

    

    $sql = "SELECT * FROM usuarios WHERE email='$correo' AND estado='A';";
    $resultado = $conexionBD->conexion->query($sql);

   if($resultado->num_rows>0){

    $fila = mysqli_fetch_assoc($resultado);
    $idUsuario = $fila['idusuario'];
    $nombre = $fila['nombres'];
    $apellido = $fila['apellidos'];

    $hash = password_hash($contra, PASSWORD_DEFAULT, ['cost'=>5]);
    if(password_verify($contra, $fila['password'])){
            $_SESSION['odo_usu_id'] = $idUsuario;
            $_SESSION['odo_usu_nombre'] = $nombre;
            $_SESSION['odo_usu_apellido'] = $apellido;
            $_SESSION['odo_usu_contra'] = $contra;

            
            ?>
            <script>
            window.location.href = "http://localhost/odontoserv/inicio/";
            </script>
            <?php
            }else{
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="background-color:red; color: white;">
                    CONTRASEÑA INCORRECTA !
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="color: white;"></button>
                    </div>
                    
                    <?php
            }
    }else{
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="background-color:red; color: white;">
    ACCESO DENEGADO !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="color: white;"></button>
    </div>
    
    <?php
    }

?>