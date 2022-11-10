<?php 
require('../conexion/conexion.php');
$bd = new conexion();

$conn = $bd-> conectar();
$id= $_POST['idpersona'];
$nombre= $_POST['nombreu'];
$apellidop= $_POST['apellidopu'];
$apellidom= $_POST['apellidomu'];
$telefono= $_POST['telefonou'];
$direccion= $_POST['direccionu'];
$cuenta= $_POST['cuentau'];
$usuario= $_POST['usuariou'];
$password= $_POST['contraseñau'];




$minimocarater=8;
$consulta = $conn->prepare("SELECT * FROM persona WHERE usuario = ?");
$consulta->bindParam(1,$usuario);

$consulta->execute();


 if ( strlen($password)<$minimocarater){
$errores[]=true;
    $_SESSION['error1']=" Minimo ocho caracteres";
    echo 3;

}else{
  
  $laconsulta=$conn->prepare("UPDATE persona SET nombre = ?, apellidop= ? ,apellidom= ?,
  	telefono= ?, direccion= ?, cuenta_num= ?, usuario= ? , contraseña= ? WHERE pk_persona= ?");

  $laconsulta->bindParam(1,$nombre);
  $laconsulta->bindParam(2,$apellidop);
  $laconsulta->bindParam(3,$apellidom);
  $laconsulta->bindParam(4,$telefono);
  $laconsulta->bindParam(5,$direccion);
  $laconsulta->bindParam(6,$cuenta);
  $laconsulta->bindParam(7,$usuario);
  $laconsulta->bindParam(8,$password);
  $laconsulta->bindParam(9,$id);

  $laconsulta->execute();


  if ($laconsulta->rowCount()>0) {
  	echo 2;
  }else{

  	echo 4;
  }



   
}


  
 ?>