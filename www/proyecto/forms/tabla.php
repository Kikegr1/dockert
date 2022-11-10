<?php 
session_start();
require_once('../conexion/conexion.php');
$bd = new conexion();

$conn = $bd->conectar();


?>
<div class="row">
	<div class="col-sm-12">
		<h2>Tabla dinamica</h2>

		<table  class="table table-sm" id="tabladinamica"  >
			<caption>
				<button class="btn btn-primary " data-toggle="modal" data-target="#modalnuevo">Agregar Nuevo 
					<span><i class="fas fa-plus-square"></i></span>
				</button>
			</caption>
			<thead>
				<tr>
					<td>Nombre</td>
					<td>Apellido Pat</td>
					<td>Apellido Mat</td>
					<td>Telefono</td>
					<td>Dirección</td>
					<td>Num_cuenta</td>
					<td>Usuario</td>
					<td>Contraseña</td>
					<td class="col-sm-3">Editar</td>
					<td class="col-sm-3">Eliminar</td>
				</tr>
			</thead>
			<tbody>
			<?php 

			if (isset($_SESSION['consulta'])) {
				if ($_SESSION['consulta']>0) {
					$idp=$_SESSION['consulta'];
					$consultatadick=$conn->prepare("SELECT * FROM  WHERE p.pk_persona=?");
					$consultatadick->bindParam(1,$idp);

				}else{
					$consultatadick=$conn->prepare("SELECT * FROM persona ");

				}
			}else{
				$consultatadick=$conn->prepare("SELECT * FROM persona ");

			}


			?>

			<?php  
			$consultatadick=$conn->prepare("SELECT * FROM persona ");
			$consultatadick->execute();
			$aqui=$consultatadick->fetchAll();
			?> 
			<?php foreach ($aqui as $key => $valor): 
				$datos= $valor['pk_persona']."||".$valor['nombre']."||".$valor['apellidop']."||".
				$valor['apellidom']."||".$valor['telefono']."||".$valor['direccion']."||".
				$valor['cuenta_num']."||".$valor['usuario']."||".$valor['contraseña'];
				$pk=$valor['pk_persona'];


				?>
				<tr>
					<td><?php echo $valor['nombre'] ?></td>
					<td><?php echo $valor['apellidop'] ?></td>
					<td><?php echo $valor['apellidom'] ?></td>
					<td><?php echo $valor['telefono'] ?></td>
					<td><?php echo $valor['direccion']; ?></td>
					<td><?php echo $valor['cuenta_num'] ?></td>
					<td><?php echo $valor['usuario'] ?></td>
					<td><?php echo $valor['contraseña'] ?></td>
					<td>
						<button class="btn btn-warning" data-toggle="modal" data-target="#modaledicion" onclick="cambiardatos('<?php echo $datos ?>')"><i class="fas fa-edit"></i></button>
					</td>
					<td>
						<button class="btn btn-danger" onclick="Sino(<?php echo $valor['pk_persona'] ?>)"><i class="fas fa-user-times"></i></button>
					</td>
				</tr>
			<?php endforeach ?>
			<script > 
				function cambiardatos(datos){
					d=datos.split('||');

					$('#idpersona').val(d[0])
					$('#nombreu').val(d[1])
					$('#apellidopu').val(d[2])
					$('#apellidomu').val(d[3])
					$('#telefonou').val(d[4])
					$('#direccionu').val(d[5])
					$('#cuentau').val(d[6])
					$('#usuariou').val(d[7])
					$('#contraseñau').val(d[8])
				

				}
			</script>
			<script>
				function Sino(pk){
					alertify.confirm('Eliminar Datos', '¿Estás seguro de que deseas eliminar el registro?', function(){  borrardatos(pk) }
						, function(){ alertify.error('Cancelar')});
				}
			</script>
			<script>
				function borrardatos(pk){
					datos ="pk_persona=" + pk;
					$.ajax({
						method:"POST",
						data: datos,
						url:"../production/eliminarcliente.php",
						success:function(r){
							if (r==1) {
								$('#tabla').load('ver_clientesadmi.php')
						
								alertify.success("Borrado con exito");

							}else if(r==2){
								alertify.error("Falló el servidor");
							}
						}
					})
				}
			</script>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	 $(document).ready(function(){
	 	$('#tabladinamica').DataTable({
	 		 dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
	 		language:{
    "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
}
	 	});
	 })
</script>
