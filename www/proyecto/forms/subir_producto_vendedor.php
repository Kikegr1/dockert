<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="https://static.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />
  <link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="../js/sweetalert.min.js"></script>
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
    <fieldset id="fieldset-sign-up">
      <legend>Cargar un Producto</legend>
      <label>
        Nombre
        <input type="text" id="nombre" >
      </label>
      <label>
        Imagen
        <input type="file" id="imagen" >
      </label>
      <label>
        Precio
        <input type="text" id="precio" >
      </label>
      <label>
       Stock
        <input type="text" id="stock" >
      </label>
      <label>
       Especificaciones
        <input type="textarea" id="especif" >
      </label>
      



      
      <a href="#fieldset-personal-info" class="next" onclick="subirnuevo()">Guardar</a>
    </fieldset>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

  <script>
    
    function subirnuevo(){

      var formData= new FormData();

      var files= $('#imagen')[0].files[0];

      formData.append('file',files);


      nombre= $('#nombre').val()
      formData.append('nombre',nombre);
      precio= $('#precio').val()
      formData.append('precio',precio);
      stock= $('#stock').val()
      formData.append('stock',stock);
      especificacion= $('#especif').val()
      formData.append('espec',especificacion);
      


      if (nombre == "" || files == "" || precio == "" || stock == "" || especificacion== "" ) {

   swal({
    title: 'Algo anda mal',
    text:   'Necesitas llenar todos los campos ',
    icon:   'error',
  });
 }else{
  $.ajax({
    url:'../production/subir_producto.php',
    type: 'POST',
    data: formData,
    cache:false,
    contentType: false,
    processData: false,
    
    success:function(respuestaprod){
      console.log("Esto llegó del php = "+respuestaprod)
      if (respuestaprod==1) {
        swal({
    title: 'genial',
    text:   'registrada con exito',
    icon:   'success',
            });
      }else if (respuestaprod==2) {
        swal({
    title: 'Algo anda mal',
    text:   'error al cargar el producto ',
    icon:   'error',
            });
      }else if (respuestaprod==3) {
    swal({
    title: 'Algo anda mal',
    text:   'El Precio no puede contener letras, Solo Números ',
    icon:   'error',
            });
      }else if (respuestaprod==4) {
    swal({
    title: 'Algo anda mal',
    text:   'El stock no puede contener letras, Solo Números  ',
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