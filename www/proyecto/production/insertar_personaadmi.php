<?php 
require('../conexion/conexion.php');
$bd = new conexion();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\src\SMTP;


require '../vendor/autoload.php';


$conn = $bd-> conectar();
$nombre = $_POST['nombre'];
$apaterno = $_POST['apellidop'];
$amaterno = $_POST['apellidom'];
$tipo=$_POST['tipo'];
$usuario=$_POST['usuario'];
$password= $_POST['contraseña'];




$minimocarater=8;
$consulta = $conn->prepare("SELECT * FROM persona WHERE usuario = ?");
$consulta->bindParam(1,$usuario);

$consulta->execute();


if ($consulta->rowCount()>0) {
  echo 1;
}else if ( strlen($password)<$minimocarater){
$errores[]=true;
    $_SESSION['error1']=" Minimo ocho caracteres";
    echo 3;

}else{

$insertar = $conn ->prepare("INSERT INTO persona VALUES (NULL, ?,?,?,?,?,NULL,?,?,?,?)"); 

$insertar ->bindParam(1, $nombre);
$insertar ->bindParam(2, $apaterno);
$insertar ->bindParam(3, $amaterno);
$insertar ->bindParam(7, $tipo);
$insertar ->bindParam(8, $usuario);
$insertar ->bindParam(9, $password);


$insertar->execute();
if ($tipo=="cliente") {
$insertar_cl = $conn->prepare("INSERT INTO  cliente VALUES (NULL , (SELECT MAX(pk_persona) FROM persona))");

  $insertar_cl->execute();

$email = $usuario;
$usuario="genacio333@gmail.com";
$encriptar= password_hash($usuario, PASSWORD_DEFAULT);
$clave= "genaro695";
$encriptar2= password_hash($clave, PASSWORD_DEFAULT);

$mail = new PHPMailer(true);

try {
  $mail->SMTPDebug = 0;

  $mail->isSMTP();

  $mail->Host = '
       smtp.gmail.com';
       $mail->SMTPAuth = true;

       $mail->Username = $usuario;

       $mail->Password = $clave;

       $mail->SMTPSecure = 'tls';

       $mail->Port = 587;

       $mail->setFrom($usuario,$clave);
       $mail->addAddress($email);

       $mail->isHTML(true);
       $a = 'Saludos';

       $mail->Subject = $a;
       $cuerpo =
       '<html>
           
            <body> 
            <h1>¡Hola!</h1> 
            <p> 
            <b>
            Hola ¿Cómo estás? Felicidades por registrarte 
            Bienvenido a tiendas online , donde podra encontrar ofertas a tu comodidad.
            </p> 
            </body> 
            </html>';
     $mail->Body = $cuerpo;

     $mail->SMTPOptions = array(
      'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
      )
     );

    $mail->send();
           

} catch(Exception $e) {
   $mail->ErrorInfo;
}

  echo 2;
  }else{
    $insertar_al = $conn->prepare("INSERT INTO vendedor VALUES (NULL , (SELECT MAX(pk_persona) FROM persona))");

  $insertar_al->execute();

  echo 2;
  }

   
}




 ?>