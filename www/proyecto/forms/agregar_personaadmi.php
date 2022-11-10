<?php 
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src='../js/sweetalert.min.js'></script>
<link rel="shortcut icon" type="image/x-icon" href="https://static.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />
<link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />
<title>CodePen - Formulario</title>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css'>
<style>
</style>


</head>
<body >
<br>
<div class="container" style="max-width: 650px; min-width: 400px;">
<div class="card">
<h2 class="card-header text-center">formulario de Registro</h2>
<div class="card-body">
<div class="form-group">
<legend>Datos de la Cuenta</legend>
<label for="user">Nombre:</label>
<input type="text" class="form-control" id="nombre" placeholder="Nombre">
<label for="email">Apellido Paterno:</label>
<input type="text" class="form-control" id="apellidop" placeholder="Apellido Paterno">
<label for="Pass1">Apellido Materno:</label>
<input type="text" class="form-control" id="apellidom" placeholder="Apellido Materno">
<label for="pass2">Teléfono:</label>
<input type="text" class="form-control" id="telefono" placeholder="Teléfono">
<label for="codipos">Dirección:</label>
<input type="text" class="form-control" id="direccion" placeholder="Dirección">
<label for="codipos">Número de Cuenta:</label>
<input type="text" class="form-control" id="cuenta" placeholder="Numero de Cuenta">
</div>

<legend>Tipo de Usuario</legend>

        <label>
          <input id="tipoC" name="tipo" value="cliente" type="radio" />
          <span> Cliente</span>
        </label>
        <label>
          <input id="tipoV" name="tipo" value="vendedor" type="radio" />
          <span> Vendedor</span>
        </label>
         <label>
          <input id="tipoA" name="tipo" value="administrador" type="radio" />
          <span> Administrador</span>
        </label>
      

<br>
 <label for="codipos">Nombre de Usuario:</label>
<input type="email" class="form-control" id="usuario" placeholder="Nombre de usuario">
<label for="terminos">Contraseña:</label><br>
<input type="password" class="form-control" id="clave" placeholder="Contraseña">
<input type="submit" class="btn btn-success" onclick="guardar()" value="Registrar" style="background: lightblue">
<input type="reset" class="btn btn-danger" id="boton" value="Reiniciar" style="background: lightblue">
</div>
</div>
</div>
<script>
  function guardar(){
  nombre =   $("#nombre").val()
  apellidop = $("#apellidop").val()
  apellidom = $("#apellidom").val()
  telefono= $("#telefono").val()
  direccion= $("#direccion").val()
  cuenta= $("#cuenta").val()
  tipo =   $("input:radio[name=tipo]:checked").val()
  usuario = $("#usuario").val()
  password = $("#clave").val()
  

  if (nombre == "" || apellidop == "" || apellidom == "" || telefono== "" || direccion == "" || cuenta == "" || tipo == "" || clave == ""   ) {

   swal({
    title: 'Algo anda mal',
    text:   'Necesitas llenar todos los campos ',
    icon:   'error',
  });
 } else {


  datos = "nombre=" + nombre +
  "&apellidop=" + apellidop +
  "&apellidom=" + apellidom +
  "&telefono=" + telefono +
  "&direccion=" + direccion +
  "&cuenta=" + cuenta +
  "&tipo=" + tipo +
  "&usuario=" + usuario +
  "&clave=" + password;
  console.log(datos)



  $.ajax({
    method:"POST",
    data:datos,
    url:"../production/insertar_personaadmi.php",
    success:function(respueta){
      console.log("Esto llegó del php = "+respueta)
      if (respueta==1) {
      // el registro ya existe
      swal({
        title: 'Algo anda mal',
        text:   'Este Correo ya se encuentra en uso actualmente',
        icon:   'error',
      });
    }else if(respueta==2){
      // el registro si s epuede registrar
      swal({
        title: 'Perfecto',
        text:   'Registro exitoso ',
        icon:   'success',
      });
    }else if(respueta==3){
      swal({
        title: 'Algo anda mal',
        text:   'La contraseña debe contener al menos 8 caracteres',
        icon:   'error',
      });
    } 
  }
})


}
}

</script>




</body>
</html>