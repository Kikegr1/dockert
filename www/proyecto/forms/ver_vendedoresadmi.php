<?php 
session_start();

unset($_SESSION['consulta']);
require_once ('../conexion/conexion.php');

$bd = new conexion();

$conn = $bd->conectar();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Clientes</title>
  <link rel="stylesheet" href="../librerias/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" href="../librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" href="../librerias/fontawesome/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="../librerias/select2/css/select2.css">

  <link rel="stylesheet" href="../librerias/datatable/dataTables.bootstrap.min.css">
  <script src="../librerias/jquery-3.4.1.min.js"></script>
  <script src="../librerias/bootstrap/js/bootstrap.js"></script>
  <script src="../librerias/alertifyjs/alertify.js"></script>
  <script src="../librerias/select2/js/select2.js"></script>
  <script src="../librerias/datatable/dataTables.bootstrap.min.js"></script>
  <script src="../librerias/datatable/jquery.dataTables.min.js"></script>
  <script src="../librerias/buttons/dataTables.buttons.min.js"></script>
  <script src="../librerias/buttons/jszip.min.js"></script>
  <script src="../librerias/buttons/pdfmake.min.js"></script>
  <script src="../librerias/buttons/vfs_fonts.js"></script>
  <script src="../librerias/buttons/buttons.html5.min.js"></script>

</head>
<body>
  <div class="container">
    <div id="buscador"></div>
    <div id="tabla">
    
  </div>
  </div>
</body>
</html>
<!-- Modal para el registro-->

<!-- Modal -->
<div class="modal fade" id="modalnuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Nueva Persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>Nombre</label>
        <input type="text" name="" id="nombre" class="form-control input-sm">
        <label>Apellido Paterno</label>
        <input type="text" name="" id="apellidop" class="form-control input-sm">
        <label>Apellido Materno</label>
        <input type="text" name="" id="apellidom" class="form-control input-sm">
        <label>Tipo de usuario</label><br>
        <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="tipo" id="TIPOA" value="vendedor">Vendedor
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="tipo" id="TIPOB" value="administrador">Admi
  
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="tipo" id="TIPOC" value="cliente">Cliente
  
</div><br>
        <label>Usuario</label>
        <input type="text" name="" id="usuario" class="form-control input-sm">
        <label>Contrase??a</label>
        <input type="text" name="" id="password" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="guardarnuevo()">Agregar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para edicion de datos-->


<!-- Modal -->
<div class="modal fade" id="modaledicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" hidden="" id="idpersona" name="">
        <label>Nombre</label>
        <input type="text" name="" id="nombreu" class="form-control input-sm">
        <label>Apellido Pat</label>
        <input type="text" name="" id="apellidopu" class="form-control input-sm">
        <label>Apellido Mat</label>
        <input type="text" name="" id="apellidomu" class="form-control input-sm">
        <label>Telefono</label>
        <input type="text" name="" id="telefonou" class="form-control input-sm">
        <label for="">Direcci??n</label>
        <input type="text" name="" id="direccionu" class="form-control input-sm">
        <label for="">N??mero de cuenta</label>
        <input type="text" name="" id="cuentau" class="form-control input-sm">
        <label for="">Usuario</label>
        <input type="text" name="" id="usuariou" class="form-control input-sm">
        <label for="">Contrase??a</label>
        <input type="text" name="" id="contrase??au" class="form-control input-sm">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning"  onclick="actualizard()">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
$('#tabla').load('tablav.php')
$('#buscador').load('buscador.php')
  })
</script>
<script>
  function guardarnuevo(){
  nombre =   $("#nombre").val()
  apellidop = $("#apellidop").val()
  apellidom = $("#apellidom").val()
  usuario = $("#usuario").val()
  password = $("#password").val()
  tipo =   $("input:radio[name=tipo]:checked").val()

  if (nombre == "" || apellidop == "" || apellidom == "" || usuario == "" || password == "" || tipo == ""  ) {

   alertify.error("Debes llenar todos los datos");
 } else {


  datos = "nombre=" + nombre +
  "&apellidop=" + apellidop +
  "&apellidom=" + apellidom +
  "&usuario=" + usuario +
  "&password=" + password +
  "&tipo=" + tipo;
  console.log(datos)



  $.ajax({
    method:"POST",
    data:datos,
    url:"../production/insertar_persona.php",
    success:function(respueta){
      console.log("Esto lleg?? del php = "+respueta)
      if (respueta==1) {
      // el registro ya existe
      alertify.error("Este Correo se encuentra en uso actualmente!")
    }else if(respueta==2){
      // el registro si s epuede registrar
     $('#tabla').load('ver_vendedoresadmi.php')

      alertify.success("A??adido exitosamente");
    }else if(respueta==3){
      alertify.error("Debe contener al menos 8 Caract??res!");
    } else if (respueta==4) {
      alertify.error("El usuario debe ser de tipo mail");
    }
  }
})


}
  }
</script>
<script>
function actualizard(){
  id= $('#idpersona').val()
  nombrex= $('#nombreu').val()
  apellidopx=$('#apellidopu').val()
    apellidomx= $('#apellidomu').val()
    telefonox= $('#telefonou').val()
    direccionx= $('#direccionu').val()
    cuentax= $('#cuentau').val()
    usuariox= $('#usuariou').val()
    contrase??ax= $('#contrase??au').val()

    datos= "idpersona=" + id +
    "&nombreu=" + nombrex + 
    "&apellidopu=" + apellidopx +
    "&apellidomu=" + apellidomx + 
    "&telefonou=" + telefonox +
    "&direccionu=" + direccionx +
    "&cuentau=" + cuentax +
    "&usuariou=" + usuariox + 
    "&contrase??au=" + contrase??ax;
   console.log(datos)
    $.ajax({
      method:"POST",
      data: datos,
      url:"../production/actualizar_vendedor.php",

      success:function(r){
           console.log("Esto lleg?? del php = "+r)
        if (r==1) {
          alertify.error("Este correo ya se encuentra en uso");
        }else if (r==2) {
          $('#tabla').load('ver_vendedoresadmi.php')
          alertify.success("Datos actualizados correctamente");
        }else if (r==3) {
          alertify.error("La contrase??a debe tener al menos 8 caracteres");
        }else if (r==4) {
          alertify.error("Error del servidor");
        }
      }
    })

}
</script>
<script>
  function Sino(){
    alertify.confirm('Eliminar Datos', '??Est??s seguro de que deseas eliminar el registro?', function(){ alertify.success('Ok') }
                , function(){ alertify.error('Cancelar')});
  }
</script>