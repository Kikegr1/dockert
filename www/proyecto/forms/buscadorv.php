<?php
session_start();
require('../conexion/conexion.php');
$bd = new conexion();

$conn = $bd-> conectar();

$consultatadick=$conn->prepare("SELECT * FROM persona p, vendedor v WHERE p.pk_persona=v.pk_persona");
     $consultatadick->execute();

     $aqui=$consultatadick->fetchAll();

 ?>
 <br><br>
<div class="row">
	<div class="col-md-8"></div>
	<div class="col-sm-4">
		<label for="">Buscador</label>
		<select  id="buscadorvivo">
			<option value="0">Selecciona uno</option>

			<?php
			foreach ($aqui as $key => $valor):  
			 ?>
			 <option value="<?php echo $valor['pk_persona'] ?>"><?php echo $valor['nombre'] ."". $valor['apellidop'] ?></option>

			 <?php 
               endforeach
			  ?>
		</select>

	</div>
</div>
<script type="text/javascript">
	 
	 $(document).ready(function(){
     $('#buscadorvivo').select2();

     $('#buscadorvivo').change(function(){
     	$.ajax({
     		type:"POST",
     		data:'valor=' + $('#buscadorvivo').val(),
     		url:"../production/buscadorv.php",

     		success:function(r){
     			$('#tabla').load('tabla.php');
     		}

     	})
     })
	 });
</script>