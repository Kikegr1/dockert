<?php 
$correo= $_POST['correo'];
$mensaje = $_POST['mensaje'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\src\SMTP;


require '../vendor/autoload.php';

$mail = new PHPMailer(true);


$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com'; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
$mail->Username = $correo; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 
$mail->Password = "123"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
$mail->Port = 465; // Puerto de conexión al servidor de envio. 
$mail->From = "alanaicrag12@gmail.com"; // A RELLENARDesde donde enviamos (Para mostrar). Puede ser el mismo que el email creado previamente.
$mail->FromName = ""; //A RELLENAR Nombre a mostrar del remitente. 
$mail->AddAddress("alanaicrag12@gmail.com"); // Esta es la dirección a donde enviamos 
$mail->IsHTML(true); // El correo se envía como HTML 
$mail->Subject = $mensaje; // Este es el titulo del email. 
$body = $mensaje; 
 $mail->Body = $body;
 $exito = $mail->Send(); // Envía el correo.
if($exito){
 echo 1; 
}else{
 echo "problema"; 

} 