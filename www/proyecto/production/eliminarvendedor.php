<?php 
require('../conexion/conexion.php');

$bd = new conexion();

$conn = $bd-> conectar();

$id= $_POST['pk_cliente'];

$consulta=$conn->prepare("DELETE persona,vendedor
  FROM persona
  JOIN vendedor
  ON persona.pk_persona=vendedor.pk_persona
  WHERE vendedor.pk_vendedor= ?");

$consulta->bindParam(1,$id);

$consulta->execute();


if ($consulta->rowCount()>0) {
echo 1;
}else{
	echo 2;
}



 ?>