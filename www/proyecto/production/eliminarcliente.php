<?php 
require('../conexion/conexion.php');

$bd = new conexion();

$conn = $bd-> conectar();

$id= $_POST['pk_persona'];

$consulta=$conn->prepare("DELETE persona
  FROM persona
  
  WHERE pk_persona= ?");

$consulta->bindParam(1,$id);

$consulta->execute();


if ($consulta->rowCount()>0) {
echo 1;
}else{
	echo 2;
}



 ?>