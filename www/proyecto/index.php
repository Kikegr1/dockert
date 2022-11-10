<?php 
 
require_once ('conexion/conexion.php');
$bd = new conexion();

$conn = $bd->conectar();


$consultav=$conn->prepare("SELECT * FROM paypal");
$consultav->execute();
      $aqui=$consultav->fetchAll();
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Bienvenido</title>
 <meta charset="UTF-8">
 <title>Bienvenido</title>
 <link rel="stylesheet" href="materialize/css/materialize.css">
 <link rel="stylesheet" href="css/footer.css">
 <link rel="stylesheet" href="css/carrusel.css">
 <link rel="stylesheet" href="css/swiper.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
 <script src="librerias/jquery-3.4.1.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <script src='js/sweetalert.min.js'></script>
</head>
<body>
 <nav>
  <div class="nav-wrapper #42a5f5 blue lighten-1">
    
    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
       <li><img src="imagenes/d17989ef-cf31-4538-8de2-3d1e3716af19_200x200.png" style="width: 100px; height: 130px; margin-right: 700px;margin-top: -34px"></li>
      <li><a href="">Carrito<i class="material-icons right ">local_grocery_store</i></a></li>
      <li><a href="badges.html">Ayuda</a></li>
      <li><a  data-target="modal1" class="btn modal-trigger #7986cb indigo lighten-2">Registro<i class="material-icons right ">person_add</i></a></li>
      <li><a data-target="modal" class="btn modal-trigger #7986cb indigo lighten-2">Ingresar<i class="material-icons right ">vpn_key</i></a></li>
    </ul>
  </div>
</nav>
<ul class="sidenav" id="mobile-demo">
  <li><img src="imagenes/d17989ef-cf31-4538-8de2-3d1e3716af19_200x200.png" style="width: 100px; height: 130px; margin-right: 700px;margin-top: -34px"></li>
  <li><a href="sass.html">Carrito<i class="material-icons right ">local_grocery_store</i></a></li>
  <li><a href="badges.html">Ayuda</a></li>
  <li><a  data-target="modal1" class="btn modal-trigger #7986cb indigo lighten-2">Registro<i class="material-icons right ">person_add</i></a></li>
  <li><a data-target="modal" class="btn modal-trigger #7986cb indigo lighten-2">Ingresar<i class="material-icons right ">vpn_key</i></a></li>

</ul>


<!-- este es el modal de registro -->
<div id="modal" class="modal #fff59d yellow lighten-3 " >
  <div class="modal-content #fffde7 yellow lighten-5">
    <h4>INGRESO</h4>
    <div class="row">

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">mail</i>
          <input id="user" type="text"  >
          <label for="icon_prefix">Email</label>
        </div>

      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">vpn_key</i>
          <input id="past"  type="password" >
          <label for="icon_prefix">Contraseña</label>
        </div>
      </div>
      <button class="btn waves-effect waves-light #7986cb indigo lighten-2" type="submit"  style="margin: auto;display: block;" onclick="guardardatos()">INGRESAR</button>


      
    </div>

  </div>

</div>
<div id="modal1" class="modal ">
  <div class="modal-content ">
    <h4>REGISTRO</h4>
    <div class="row">

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix" >person_outline</i>
          <input id="nombre"  type="text"  name="nom" required>
          <label for="Nombres">Nombres</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix" >person_outline</i>
          <input id="apellidop" type="text"  name="ap" required>
          <label for="Apellido Paterno">Apellido Paterno</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix" >person_outline</i>
          <input id="apellidom" type="text"  name="am" required>
          <label for="disabled">Apellido Materno</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix" >mail</i>
          <input id="usuario" type="email"  name="usuario" required>
          <label for="email">Usuario</label>
        </div>
      </div>
      <div class="row">
       <div class="input-field col s12">
        <i class="material-icons prefix" >vpn_key</i>
        <input id="password" type="password"  name="pass" required>
        <label for="password">Password</label>
      </div>

      <button class="btn waves-effect waves-light #7986cb indigo lighten-2" type="submit"  style="margin: auto;display: block;" onclick="guardar()">REGISTRARME
      </button>
    </div>


  </div>
</div>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}
</style>
</head>
<body>


</div>

<!-- Swiper -->

 





<!-- // este escript es para mostrar el moda  registro -->
<script>
 $(document).ready(function(){
  $('.modal').modal();
});
</script>


<!-- este script es para manejar el slider -->
<script>
 $(document).ready(function(){
  $('.slider').slider();
});
</script>

<!-- este script es para el dropbown -->
<script>
 $(".dropdown-trigger").dropdown();
</script>
<script>
 $(document).ready(function(){
  $('.sidenav').sidenav();
});

 function guardar(){
  nombre =   $("#nombre").val()
  apellidop = $("#apellidop").val()
  apellidom = $("#apellidom").val()
  usuario = $("#usuario").val()
  password = $("#password").val()

  if (nombre == "" || apellidop == "" || apellidom == "" || usuario == "" || password == "" ) {

   swal({
    title: 'Algo anda mal',
    text:   'Necesitas llenar todos los campos ',
    icon:   'error',
  });
 } else {


  datos = "nombre=" + nombre +
  "&apellidop=" + apellidop +
  "&apellidom=" + apellidom +
  "&usuario=" + usuario +
  "&password=" + password;
  console.log(datos)



  $.ajax({
    method:"POST",
    data:datos,
    url:"production/insertar_persona.php",
    success:function(respueta){
      console.log("Esto llegó del php = "+respueta)
      if (respueta==1) {
      // el registro ya existe
      swal({
        title: 'Algo anda mal',
        text:   'El registro ya existe',
        icon:   'error',
      });
    }else if(respueta==2){
   location.reload();
      swal({
        title: 'Perfecto',
        text:   'Registro exitoso ',
        icon:   'success',
      });
    }else if(respueta==3){
      swal({
        title: 'Algo anda mal',
        text:   'La contraseña debe contener mas de 8 caracteres',
        icon:   'error',
      });
    }else if(respueta==4){
      swal({
        title: 'Algo anda mal',
        text:   'El Usuario debe ser de tipo mail',
        icon:   'error',
      });
    }
  }
})


}
}

</script>
<script>
  function guardardatos(){
    usuario =   $("#user").val()
    contrasena = $("#past").val()


    if (usuario == "" || contrasena == "" ) {

     swal({
      title: 'Algo anda mal',
      text:   'Necesitas llenar todos los campos ',
      icon:   'error',
    });
   } else {
    datost = "user=" + usuario +
    "&past=" + contrasena;
    console.log(datost)
    $.ajax({
      method:"POST",
      data: datost,
      url:"production/validacion_usuario.php",
      success:function(respuetax){
        console.log("Esto llegó del php = "+respuetax)
        if (respuetax==1) {
          swal({
            title: 'Algo anda mal',
            text:   'Usuario invalido ',
            icon:   'error',
          });
        }else if (respuetax==2) {
         swal({
          title: 'Algo anda mal',
          text:   'La contraseña debe tener al menos 8 caracteres ',
          icon:   'error',
        });
       }else if (respuetax==3) {
        location.href="forms/pantalla_cliente.php";
      }else if (respuetax==4) {
        location.href="forms/pantalla_cliente.php";
      }else if (respuetax==5) {
        location.href="forms/pantalla_administrador.php";
      }

    }
  })
  }
}

</script>
    
  </script>
   <div>
    <?php 
    include('j.php'); ?>

    <div>
      <?php include('enviar_mail.php'); ?>

    </div>
    <div>
      <?php include('fot.php'); ?>
    </div>
   
    

</body>
</html>
