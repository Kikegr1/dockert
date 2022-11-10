<?php 
session_start();
require('../conexion/conexion.php');
$bd = new conexion();

$conn = $bd-> conectar();

$nom= $_POST['nombre'];
$ap= $_POST['apellidop'];
$am= $_POST['apellidom'];
$tel= $_POST['telefono'];
$dir= $_POST['direccion'];
$cuentanum= $_POST['cuenta'];
$usuario= $_POST['usuario'];
$contra= $_POST['clave'];
$pk_persona= $_SESSION['pk_persona'];
$candado= "@";
$arroba=strpos($usuario,$candado);

if (!is_int($arroba)) {
    echo 4;
exit();
}else if(!is_numeric($cuentanum)){
echo 5;
}else if(!is_numeric($tel)){
echo 6;
}else{
    $actualizar=$conn->prepare("UPDATE persona SET nombre= ?, apellidop= ?, apellidom= ?
    , telefono= ?, direccion = ? , cuenta_num = ? , usuario= ? , contraseña = ? WHERE pk_persona  =  ? ");
    
    $actualizar->bindParam(1,$nom);
    $actualizar->bindParam(2,$ap);
    $actualizar->bindParam(3,$am);
    $actualizar->bindParam(4,$tel);
    $actualizar->bindParam(5,$dir);
    $actualizar->bindParam(6,$cuentanum);
    $actualizar->bindParam(7,$usuario);
    $actualizar->bindParam(8,$contra);
    $actualizar->bindParam(9,$pk_persona);

    $actualizar->execute();
     $_SESSION['nombre']=$nom;
     $_SESSION['apellidop']=$ap;
     $_SESSION['apellidom']=$am;
     $_SESSION['telefono']=$tel;
     $_SESSION['direccion']=$dir;
     $_SESSION['cuenta_num']=$cuentanum;
     $_SESSION['usuario']=$usuario;
     $_SESSION['contraseña']=$contra;
    

    if ($actualizar->rowCount()>0) {
        echo 2;
    }else{
        echo 1;
    }
}

 ?>