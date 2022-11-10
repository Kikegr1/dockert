<?php 
 /**
  * 
  */
 class conexion {
  
  public function conectar () {
    $usuario = "root";
    $password="";
    $host="localhost";
    $bd="sistema_c4";

     try {
     $conexion = new PDO("mysql:127.0.0.1=$host;dbname=$bd",$usuario,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES\'UTF8\''));

      return $conexion;
      
      } catch (PDOException $e) {

      return $e->getMessage();
     }

    }
 }



 ?>