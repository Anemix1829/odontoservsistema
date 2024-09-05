function MostrarLista(){
    $.post("lista.php",{},function(result){
      $("#list").html(result);
      $('#list').show();
    });
}
function ModalagregarUsuario(){
  $(".modal-title").html("AGREGAR USUARIO");
  $.post("modal-nuevo-usu.php",{},function(result){
      $(".modal-body").html(result);
      $('.modal-body').show();

      $('.modal').show();
    });
}
function CerrarModal(){
  $('.modal').hide();
}

function HabilitarUsu(id){
  $(".modal-title").html("HABILITAR USUARIO");
  $.post("update.php",{hab:id},function(result){
      $(".modal-body").html(result);
      $('.modal-body').show();
      MostrarLista();
      
      $('.modal').show();

    });
}
function InhabilitarUsu(id){
  $(".modal-title").html("INHABILITAR USUARIO");
  $.post("update.php",{in:id},function(result){
      $(".modal-body").html(result);
      $('.modal-body').show();
      MostrarLista();

      $('.modal').show();

    });
}
function ActualizarInfo(id) {
  $(".modal-title").html("EDITAR INFO.");
  $.post("modal-editar-usu.php",{id:id},function(result){
      $(".modal-body").html(result);
      $('.modal-body').show();
      $('.modal').show();

    });
  }

  function ActualizarInfoConf(id) {
    $(".modal-title").html("EDITAR INFO.");
    var n=$("#n").val();
    var a=$("#a").val();
    var e=$("#e").val();
    var r=$("#r").val();
    $.post("editar-usu-conf.php",{id:id,n:n,a:a,e:e,r:r},function(result){
        $(".modal-body").html(result);
        $('.modal-body').show();
        MostrarLista();
        $('.modal').show();

      });
    return false;
  }
  function AddUsuConf(){
    $(".modal-title").html("AGREGAR USUARIO.");
    var n=$("#n").val();
    var a=$("#a").val();
    var e=$("#e").val();
    var r=$("#r").val();
    $.post("add-usu-conf.php",{n:n,a:a,e:e,r:r},function(result){
        $(".modal-body").html(result);
        $('.modal-body').show();
        MostrarLista();
        $('.modal').show();

      });
    return false;
  }





  function ModalagregarCliente(){
    $(".modal-title").html("AGREGAR CLIENTE");
    $.post("modal-nuevo-cli.php",{},function(result){
        $(".modal-body").html(result);
        $('.modal-body').show();
  
        $('.modal').show();
      });
  }
  function AddCliConf(){
    $(".modal-title").html("AGREGAR CLIENTE.");
    var n=$("#n").val();
    var a=$("#a").val();
    var t=$("#t").val();
    var d=$("#d").val();
    var e=$("#e").val();
    $.post("add-cli-conf.php",{n:n,a:a,t:t,d:d,e:e},function(result){
        $(".modal-body").html(result);
        $('.modal-body').show();
        MostrarLista();
        $('.modal').show();

      });
    return false;
  }
function ActualizarInfoCli(id) {
    var id=id;
  $(".modal-title").html("EDITAR INFO.");
  $.post("modal-editar-cli.php",{id:id},function(result){
      $(".modal-body").html(result);
      $('.modal-body').show();
      $('.modal').show();

    });
  }

  function ActualizarInfoCliConf(id) {
    $(".modal-title").html("EDITAR INFO.");
    var id=id;
    var n=$("#n").val();
    var a=$("#a").val();
    var t=$("#t").val();
    var d=$("#d").val();
    var e=$("#e").val();
    $.post("editar-cli-conf.php",{id:id,n:n,a:a,t:t,d:d,e:e},function(result){
        $(".modal-body").html(result);
        $('.modal-body').show();
        MostrarLista();
        $('.modal').show();

      });
    return false;
  }

  function ModalagregarProducto(){
    $(".modal-title").html("AGREGAR PRODUCTO");
    $.post("modal-nuevo-prod.php",{},function(result){
        $(".modal-body").html(result);
        $('.modal-body').show();
  
        $('.modal').show();
      });
  }

  function AddProdConf(){
    $(".modal-title").html("AGREGAR PRODUCTO.");
    var n=$("#n").val();
    var c=$("#c").val();
    var d=$("#d").val();
    var p=$("#p").val();
    var s=$("#s").val();
    $.post("add-prod-conf.php",{n:n,c:c,d:d,p:p,s:s},function(result){
        $(".modal-body").html(result);
        $('.modal-body').show();
        MostrarLista();
        $('.modal').show();

      });
    return false;
  }

  function AgregarProductoVenta(){
    document.getElementById("modal-title").innerHTML = "AGREGAR PRODUCTO";
    $.post("modal-agregar-prod-venta.php",{},function(result){
      
      $(".modal-body").html(result);
      $('.modal-body').show();
      $('.modal').show();

    });
}


function ElProdVen(num){

  const n = num;
  const idprod = document.querySelectorAll(".idPVen");
  const cant = document.querySelectorAll(".selcant");
  const nombre = document.querySelectorAll(".pnombre");
  const precio = document.querySelectorAll(".pprecio");
  

  document.getElementById("list-productos").innerHTML+= '<tr class="fila"><td><input type="hidden" name="p[]" value="'+idprod[n].value +'"><input type="hidden" name="c[]" value="'+cant[n].value+'"><input type="hidden" name="pre[]" value="'+precio[n].innerHTML+'">'+idprod[n].value+'</td><td>'+ nombre[n].innerHTML +'</td><td>'+cant[n].value+'</td><td>'+precio[n].innerHTML +'</td><td><button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="eliminar producto" onclick="deleteRow(this)"><i class="fa fa-trash"></i></button></td></tr>';

  var a1 = parseFloat(cant[n].value);
  var a2 = parseFloat(precio[n].innerHTML);
  var aum = a1*a2;

  var valorprod = parseFloat(document.getElementById("pagoproductos").innerHTML);
  var valortot = parseFloat(document.getElementById("pagototal").innerHTML);
  const resp = valorprod + aum;
  const resp2 = valorprod + aum;
  document.getElementById("pagoproductos").innerHTML = resp;
  document.getElementById("pagototal").innerHTML = resp2;

  var boton = document.getElementById("btn-conf-venta");
  boton.style.display = "block";
}


function MostrarListaProdVentas(id){
  var idcliente = id;
  document.getElementById("modal-title").innerHTML = "LISTA DE PRODUCTOS";
  $.post("modallistaproductoventa.php",{idcliente:idcliente},function(result){
    
      $(".modal-body").html(result);
      $('.modal-body').show();
      $('.modal').show();

  });

}











//-----CORREO ELECTRONICO


  function EnviarCorreo(correo,contra){
    CerrarModal();
    $("#rescorreo").html('<div class="alert alert-secondary" role="alert">ENVIANDO CORREO ELECTRÓNICO. espere un momento porfavor.</div>');

    $.post("../conf-smtp.php",{correo:correo,contra:contra},function(result){
      $("#rescorreo").html(result);
      $('#rescorreo').show();

    });
  }




















  // -------------  BUSCADORES --------------------
function BuscadorTabla(tabla){
  var tabla = tabla;
  var input, filter, table, tr, td, i, j, visible;
  input = document.getElementById("in-busc");
  filter = input.value.toUpperCase();
  table = document.getElementById(tabla);
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    visible = false;
    td = tr[i].getElementsByTagName("td");
    for (j = 0; j < td.length; j++) {
      if (td[j] && td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
        visible = true;
      }
    }
    if (visible === true) {
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }
  var tt = document.getElementById("tt");
  tt.style.display ="";
}



function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  var tabla = document.getElementById("table");
  var fila = tabla.rows[i];
  var celda = fila.cells[2];
  var celda2 = fila.cells[3];
  var valorcant = parseFloat(celda.innerHTML);
  var valorpre = parseFloat(celda2.innerHTML);
  
  var valorprod = parseFloat(document.getElementById("pagoproductos").innerHTML);
  var valortot = parseFloat(document.getElementById("pagototal").innerHTML);

  var sumar = valorcant * valorpre;
  const resp = valorprod - sumar;
  const resp2 = valorprod - sumar;
  document.getElementById("pagoproductos").innerHTML = resp;
  document.getElementById("pagototal").innerHTML = resp2;

//----------------------------------
  
  document.getElementById("table").deleteRow(i);
  var boton = document.getElementById("btn-conf-venta");
  var cont = 0;
      $(".fila").each(function() {
          cont++;
      })
      if(cont===0){
          boton.style.display = 'none';
      }else{
          boton.style.display = 'block';
      }
      
}
// --------------------------------------------------
function imprimir(nombre){
  var ficha = document.getElementById(nombre);
  var ventimp = window.open(' ', 'popimpr');
  ventimp.document.write( ficha.innerHTML );
  ventimp.document.close();
  ventimp.print( );
  ventimp.close();
}