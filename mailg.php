<?php
// Importar clases PHPMailer en el espacio de nombres global
// Deben estar en la parte superior de su script, no dentro de una función
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home/damian/PHPMailer/src/Exception.php';
require '/home/damian/PHPMailer/src/PHPMailer.php';
require '/home/damian/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                              // Pasar `true` habilita excepciones

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'indomusweb@gmail.com';                 // SMTP username
  $mail->Password = '-45l4%COB96NARrNS$Xk3DQ';                           // SMTP password
  $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 465;                                    // TCP port to connect to
  $mail->CharSet = 'UTF-8';
  $mail->setFrom( $email );
  //$mail->setFrom( $email , $name );
  $mail->addAddress('esteban.bernardini@indomus.ar', 'Esteban');     // Add a recipient
  $mail->addAddress('damian.bernardini@indomus.ar', 'Damián');     // Add a recipient
  $mail->isHTML(true);                                   // Set email format to HTML
  $fecha = date("d-m-Y");
  $hora = date("H:i");


  $mail->Subject = 'Contacto completado en la página';

  $mail->Body = '<h5>Mail enviado desde el servidor</h5></br>'
  .'<p style="background-color:#f1cfff; color: #000000; margin:0px;"><b>Fecha: </b>'.$fecha.'</p>'
  .'<p style="background-color:#f1cfff; color: #000000;margin:0px;"><b>Hora: </b>'.$hora.'</p>'
  .'</br>'
  .'<p style="background-color:#cfe0ff; color: #000000; margin:0px;"><b>Nombre: </b>'.$name.'</p>'
  .'<p style="background-color:#cfe0ff; color: #000000; margin:0px; text-decoration: none;"><b>Email: </b>'.$email.'</p>'
  .'</br>'
  .'<p style="background-color:#ffe9cf; color: #000000;"><b>Mensaje: </b>'.$message.'</br>';


  //    $mail->Body    = $message;
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  if(!$mail->Send()) {
    echo "Error" . $mail->ErrorInfo;
  } else {
    echo "Procesado";
  }

}

?>
