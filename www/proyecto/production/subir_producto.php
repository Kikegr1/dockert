<?php 
session_start();
require('../conexion/conexion.php');
$bd = new conexion();

$conn = $bd-> conectar();

$archivo=$_FILES['file']['tmp_name'];
$nombrearchivo=$_FILES['file']['name'];
$carrito= $_POST['carrito'];
$categoria=$_POST['tipo'];
$compra=$_POST['compra'];
$precio=$_POST['precio'];
$descripcion=$_POST['descripcion'];
$marca=$_POST['marca'];



	$imagen= rand().$nombrearchivo;
move_uploaded_file($archivo, '../imagenes/'.$imagen);


$insertar=$conn->prepare("INSERT INTO paypal VALUES (NULL, ?,?,?,?,?,?,?)");
$insertar->bindParam(1,$imagen);
$insertar->bindParam(2,$carrito);
$insertar->bindParam(3,$compra);
$insertar->bindParam(4,$categoria);
$insertar->bindParam(5,$precio);
$insertar->bindParam(6,$descripcion);
$insertar->bindParam(7,$marca);





$insertar->execute();

if ($insertar->rowCount()>0) {
	echo 1;
}else{
	echo 2;
}




  
 ?>