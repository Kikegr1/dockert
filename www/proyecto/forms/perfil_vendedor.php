
<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script src='../js/sweetalert.min.js'></script>
<link rel="shortcut icon" type="image/x-icon" href="https://static.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />
<link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />
<title>CodePen - Accessible, Friendly Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  html, body {
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
}

html {
  scroll-behavior: smooth;
}


form {
  max-width: 600px;
  margin: 0 auto;
  padding: 32px 0;
}

fieldset {
  padding: 32px;
  border: 1px solid #ccc;
  border-radius: 16px;
  scroll-margin: 32px;
}
fieldset:not(:last-child) {
  margin-bottom: 32px;
}
fieldset fieldset {
  padding: 16px;
  border-radius: 8px;
}
fieldset fieldset legend {
  font-size: 1em;
  padding: 0 8px;
  margin-left: -8px;
}

legend {
  font-size: 1.5em;
  font-weight: 500;
  margin-left: -16px;
  padding: 0 16px;
}

label {
  font-weight: 500;
  color: #555;
  display: grid;
  grid-template-columns: 1fr 2fr;
  align-items: center;
}
label:not(:last-child) {
  margin-bottom: 16px;
}
@media (max-width: 600px) {
  label {
    grid-template-columns: 1fr;
  }
  label input, label select {
    margin-top: 8px;
  }
}

input:not([type=checkbox]) {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  appearance: none;
}

input, select {
  font-family: inherit;
  padding: 8px;
  border-radius: 8px;
  border: 1px solid #ccc;
}
input:focus, select:focus {
  outline: none;
  border-color: #3498db;
}

.next, .next:visited {
  text-decoration: none;
  color: white;
  padding: 8px 16px;
  border-radius: 8px;
  background-color: #3498db;
  border: none;
  font-size: inherit;
  cursor: pointer;
 float:none;
  text-align:center;
  height: 15px;
  width: 70px;
}
.next:hover, .next:visited:hover {
  background-color: #5faee3;
}
.next:focus, .next:visited:focus {
  outline: none;
  box-shadow: 0 0 0 2px white, 0 0 0 4px #3498db;
}

input[type=checkbox]:focus {
  outline: 2px solid #3498db;
}

.checkbox-label {
  display: inline-block;
}

#fieldset-billing-address {
  display: none;
}


</style>
</head>
<body translate="no">
<div class="progress-bar"></div>
<form>
<fieldset id="fieldset-sign-up">
<legend>Información Personal</legend>
<label>
        Nombre 
        <input type="text" id="nombre" autocomplete="email" value="<?=$_SESSION['nombre']; ?>" name="email"  disabled>
      </label>
      <label>
        Apellido Paterno
        <input type="text" id="apellidop" name="username" value="<?=$_SESSION['apellidop']; ?>" autocomplete="username"  disabled>
      </label>
      <label>
        Apellido Materno
        <input type="text" id="apellidom" autocomplete="new-password" value="<?=$_SESSION['apellidom']; ?>"  disabled>
      </label>
      <label>
        Telefono 
        <input type="text" id="telefono" name="password"  value="<?=$_SESSION['telefono']; ?>" autocomplete="new-password"  disabled>
      </label>
      <label>
        Dirección
        <input type="text" id="direccion" name="password"  value="<?=$_SESSION['direccion']; ?>" autocomplete="new-password"  disabled>
      </label>
      <label>
        Correo
        <input type="text" id="correo" name="password"  value="<?=$_SESSION['correo']; ?>" autocomplete="new-password"  disabled>
      </label>
      <label>
        Numero de cuenta
        <input type="text" id="cuenta" name="password"  value="<?=$_SESSION['cuenta_num']; ?>" autocomplete="new-password"  disabled>
      </label>
      <label>
        Usuario
        <input type="text" id="usuario" name="password"  autocomplete="new-password"  value="<?=$_SESSION['usuario']; ?>"  disabled>
      </label>
      <label>
        Contraseña
        <input type="text" id="clave" name="password" autocomplete="new-password"  value="<?=$_SESSION['contraseña']; ?>"  disabled>
      </label>


<a href="#fieldset-personal-info" type="submit" class="next" onclick="actualizarv()">Guardar</a>
<a class="next" type="submit" id="btn" >Actualizar</a>
</fieldset>
</form>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $('#btn').click(function(){
      $('#nombre').prop("disabled",false)
      $('#apellidop').prop("disabled",false)
      $('#apellidom').prop("disabled",false)
      $('#telefono').prop("disabled",false)
      $('#direccion').prop("disabled",false)
      $('#correo').prop("disabled",false)
      $('#cuenta').prop("disabled",false)
      $('#usuario').prop("disabled",false)
      $('#clave').prop("disabled",false)
    })</script>
   <script>
  function actualizarv(){
    nombre= $('#nombre').val()
    ap= $('#apellidop').val()
    am= $('#apellidom').val()
    telefono= $('#telefono').val()
    direccion= $('#direccion').val()
    correo= $('#correo').val()
    cuenta= $('#cuenta').val()
    usuario=$('#usuario').val()
    clave= $('#clave').val()

    datos = "nombre=" + nombre +
    "&apellidop=" + ap +
    "&apellidom=" + am +
    "&telefono=" + telefono +
    "&direccion=" + direccion +
    "&correo=" +correo +
    "&cuenta=" +cuenta+
    "&usuario=" +usuario+
    "&clave=" +clave;
  console.log(datos)

    $.ajax({
    type:"POST",
    data:datos,
    cache:false,
    url:"../production/actualizar_perfilvd.php",
    success:function(respueta){
      console.log("Esto llegó del php = "+respueta)
      if (respueta==1) {
      // el registro ya existe
      swal({
        title: 'Algo anda mal',
        text:   'no se puede ',
        icon:   'error',
      });
    }else if(respueta==2){
      // el registro si s epuede registrar
      swal({
        title: 'perfecto',
        text:   'actualizados ',
        icon:   'success',
      });
    }else if(respueta==3){
      swal({
        title: 'Algo anda mal',
        text:   'La contraseña debe contener mas de 8 caracteres',
        icon:   'error',
      });
    }else if (respueta==4) {
      swal({
        title: 'Algo anda mal',
        text:   'El usuario debe ser de tipo mail',
        icon:   'error',
      });
    }else if (respueta==5) {
      swal({
        title: 'Algo anda mal',
        text:   'El numero de cuenta no puede contener Letras',
        icon:   'error',
      });
    }else if (respueta==6) {
       swal({
        title: 'Algo anda mal',
        text:   'El numero de Telefono solo puede contener numeros',
        icon:   'error',
      });
    }
  }
})

  }
</script>
</body>
</html>