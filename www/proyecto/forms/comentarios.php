<?php 
include('../conexion/conexion.php');

$bd= new conexion();
$conn= $bd->conectar();


$correo= $_POST['correo'];
$comentarios= $_POST['comentarios'];

$candado= "@";
$arroba=strpos($correo,$candado);



if (!is_int($arroba)) {
	echo 2;
	exit();
}else{
	$consultai= $conn->prepare("INSERT INTO comentarios VALUES ('null', ?,?)");
$consultai->bindParam(1,$correo);
$consultai->bindParam(2,$comentarios);
$consultai->execute();
if ($consultai->rowCount()>0) {
	echo 1;
  }
}




 ?>