<?php 
$nombre="alan";
$apellido="juarez";

$nombrecompleto=$nombre.$apellido;


$cadena= md5($nombrecompleto);


$password = substr( $cadena, 4, 8 );


echo $password;
 ?>