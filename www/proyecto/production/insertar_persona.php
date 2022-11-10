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
$usuario=$_POST['usuario'];
$password= $_POST['password'];

$candado= "@";
$arroba=strpos($usuario,$candado);
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

}else if(!is_int($arroba)){
echo 4;
exit();

   
}else{
  $insertar = $conn ->prepare("INSERT INTO persona VALUES (NULL, ?,?,?,NULL,NULL,NULL,?,?)"); 

$insertar ->bindParam(1, $nombre); //el bindParam hace referencia a la variables que se encuentran en la base de datos
$insertar ->bindParam(2, $apaterno);
$insertar ->bindParam(3, $amaterno);
$insertar ->bindParam(4, $usuario);
$insertar ->bindParam(5, $password);


$insertar->execute();

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


}




 ?>