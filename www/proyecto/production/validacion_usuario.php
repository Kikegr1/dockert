<?php
session_start();
$usuario = $_POST['user'];
$contraseña = $_POST['past'];
$minimocarater=8;

require_once ('../conexion/conexion.php');
$bd = new conexion();

$conn = $bd->conectar();

$consulta =$conn->prepare("SELECT * FROM persona WHERE usuario=? AND contraseña=? LIMIT 1");  
$consulta->bindParam(1,$usuario);
$consulta->bindParam(2,$contraseña);


$consulta->execute();

$datos = $consulta->fetchAll();

if(!empty($datos)) {

  $_SESSION['pk_persona'] = $datos[0]['pk_persona'];
  $_SESSION['nombre'] = $datos[0]['nombre'];
  $_SESSION['apellidop'] = $datos[0]['apellidop'];
  $_SESSION['apellidom'] = $datos[0]['apellidom'];
  $_SESSION['telefono'] = $datos[0]['telefono'];
  $_SESSION['direccion'] = $datos[0]['direccion'];
  $_SESSION['cuenta_num'] = $datos[0]['cuenta_num'];
  $_SESSION['usuario'] = $datos[0]['usuario'];
  $_SESSION['contraseña'] = $datos[0]['contraseña'];

  if ($_SESSION['usuario']=="alvkike") {
    echo 5;
  }else{
    echo 3;
  }

 }else if (strlen($contraseña)<$minimocarater){
  $errores[]=true;
  $_SESSION['error1']=" Minimo ocho caracteres";
  echo 2;

}else{
  echo 1;
}
?>