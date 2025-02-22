<?php
 if(isset( $_SESSION['odo_usu_id'])){
  include 'tools/c0nnBD-0d0nt0S3rv.php';
$conexionBD = new ConexionBD();
$conexionBD->conectar();





 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ODONTOSERV</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


  <script>
    function insertarSocio(){
     
        const usuario = $("#usuario").val();
        const passw = $('#passw').val();
        const nombre = $('#nombre').val();
        const apellidoPat = $('#apellidoPat').val();
        const apellidoMat = $('#apellidoMat').val();
        const telefono = $('#telefono').val();
        const fechaNac = $('#fechaNac').val();
        const carnet = $('#carnet').val();
        const rol = $('#rol').val();
        const sexo = $('input:radio[name=sexo]:checked').val();
        const datosAdi = $('#datosAd').val();
        const direccion = $('#dirsocio').val();
        const medidor = $('#medidor').val();

        console.log(medidor);
        console.log(usuario);console.log(passw);console.log(nombre);console.log(apellidoPat);
        console.log(apellidoMat);console.log(telefono);console.log(fechaNac);console.log(carnet);
        console.log(rol);console.log(sexo);console.log(datosAdi);console.log(direccion);

        $.post("insertSocio.php",{medidor:medidor, usuario: usuario, passw:passw, nombre:nombre, apellidoPat:apellidoPat,apellidoMat:apellidoMat,telefono:telefono, fechaNac:fechaNac,carnet:carnet,rol:rol,sexo:sexo,datosAdi:datosAdi,direccion:direccion},function(result){
          
          $("#confimacionInsert").html(result);
          $('#confimacionInsert').show();

        });
     
    }

   
    function actualizarReg(idSocio){
     
     
        var idSocio = idSocio;

        $.post("updateSocio.php",{idSocio: idSocio},function(result){
          
          $("#contenidoSocio").html(result);
          $('#contenidoSocio').show();

        });
      
    }

    function ejecutarUpdateSocio(idSocio2){
      const idSocio = idSocio2;

        const usuario = $("#usuario").val();
        const passw = $('#passw').val();
        const nombre = $('#nombre').val();
        const apellidoPat = $('#apellidoPat').val();
        const apellidoMat = $('#apellidoMat').val();
        const telefono = $('#telefono').val();
        const fechaNac = $('#fechaNac').val();
        const carnet = $('#carnet').val();
        const rol = $('#rol').val();
        const sexo = $('input:radio[name=sexo]:checked').val();
        const datosAdi = $('#datosAd').val();
        const direccion = $('#dirsocio').val();
        const medidor = $('#medidor').val();

        $.post("ejecutarUpdateSocio.php",{idSocio:idSocio, medidor:medidor, usuario: usuario, passw:passw, nombre:nombre, apellidoPat:apellidoPat,apellidoMat:apellidoMat,telefono:telefono, fechaNac:fechaNac,carnet:carnet,rol:rol,sexo:sexo,datosAdi:datosAdi,direccion:direccion},function(result){
          
          
          window.location.href = "http://localhost:9098/aguaotb/listarsocios.php"; //redireccion hacia la pagina principal
          
          //alert(""+idSocio+"................"+result);
        });


    }

    function deleteReg(socio3){
      var idSocio = socio3;
      console.log(socio3);
     
    }

    function eliminarRegistro(socio4){
      var idSocio = socio4;
        alert(socio4);
        $.post("deleteSocio.php",{idSocio: idSocio},function(result){
        
          window.location.href = "http://localhost:9098/aguaotb/listarsocios.php";
      });
    }

    function cobrar(){
        
        const tipoPago = $("#tipo").val();
        const socio = $('#socio').val();
        const monto = $('#monto').val();
        const descuento = $('#descuento').val();
        const fecha = $('#fecha').val();
        const descripcion = $('#descripcion').val();

        $.post("insertCobro.php",{tipoPago:tipoPago, socio: socio, monto:monto, descuento:descuento, fecha:fecha,descripcion:descripcion},function(result){
          
          $("#confimacionInsertCobro").html(result);
          $('#confimacionInsertCobro').show();

        });
    }

  </script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!--
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      -->
      <!-- Messages Dropdown Menu -->
      <!--
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      -->
      <!-- Notifications Dropdown Menu -->
       <!--
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <?php
 }
 ?>