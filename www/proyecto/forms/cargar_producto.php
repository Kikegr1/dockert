<!DOCTYPE html>
<html>
<head>
 <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script src="../js/sweetalert.min.js"></script>

<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}


.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

</style>
</head>
<body>


<div class="container">
  <div class="row">
    <div class="col-25">
      <label for="fname">Imagen de Producto</label>
    </div>
    <div class="col-75">
      <input type="file" id="imagen" >
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Marca</label>
    </div>
    <div class="col-75">
      <input id="marca"></input>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Descripción</label>
    </div>
    <div class="col-75">
      <input id="descripcion" style="height: 50px; width: 400px"></input>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Precio</label>
    </div>
    <div class="col-75">
      <input id="precio" ></input>
    </div>
  </div>
  
  <div class="row">
    <div class="col-25">
      <label for="subject">Codigo de PayPal Carrito</label>
    </div>
    <div class="col-75">
      <textarea id="carrito"  style="height:200px"></textarea>
    </div>
  </div>
  <div class="col-25">
      <label for="subject">Codio de PayPal Comprar</label>
    </div>
    <div class="col-75">
      <textarea id="compra"  style="height:200px"></textarea>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Categoria</label>
    </div>
    <div class="col-75">
      <fieldset>
        <legend>Elige una Categoria</legend>
        <label>
            <input type="radio" name="tipo" value="teclado">Teclados
        </label>
        <label>
            <input type="radio" name="tipo" value="laptops">Laptops
        </label>
        <label>
            <input type="radio" name="tipo" value="mouse">Mouse
        </label>
        <label>
            <input type="radio" name="tipo" value="tarjeta">Tarjetas Graficas
        </label>
        <label>
            <input type="radio" name="tipo" value="cableado">Cableado
        </label>
        <label>
            <input type="radio" name="tipo" value="impresora">Impresoras
        </label>
    </fieldset>
    </div>
  </div>
   <br><br>
   <button class="btn waves-effect waves-light #7986cb indigo lighten-2" type="submit"  style="margin: auto;display: block;" onclick="guardar()">CARGAR
      </button>
 
</div>

<script>

  function guardar(){

      var formData= new FormData();

      var files= $('#imagen')[0].files[0];

      formData.append('file',files);


     
      carrito= $('#carrito').val()
      formData.append('carrito',carrito);
       compra= $('#compra').val()
      formData.append('compra',compra);
      marca= $('#marca').val()
      formData.append('marca',marca);
      descripcion= $('#descripcion').val()
      formData.append('descripcion',descripcion);
      precio= $('#precio').val()
      formData.append('precio',precio);
      tipo =   $("input:radio[name=tipo]:checked").val()
       formData.append('tipo',tipo);

      


      if ( files == "" ||  descripcion== "" ||  tipo== "" || carrito=="" || compra=="" || precio=="" || marca=="" ) {

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
        location.reload();
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
      }

    }
  })
    }
 }
  </script>

</body>
</html>
