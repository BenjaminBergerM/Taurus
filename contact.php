<?php
require 'plugins/PHPMailer/src/PHPMailer.php';
require 'plugins/PHPMailer/src/Exception.php';
require 'plugins/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

$mail = new PHPMailer();                              // Passing `true` enables exceptions
try {
    //Server settings
    // $mail->SMTPDebyyug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'plesk.ar.conectemos.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'taurus@makeitsmart.com.ar';                 // SMTP username
    $mail->Password = 'J3ox4u%4';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('taurus@makeitsmart.com.ar', 'Make It Smart');
    $mail->addAddress('ventas@taurusagricola.com.ar', 'Angle Rivero');     // Add a recipient
    $mail->addReplyTo('contacto@makeitsmart.com.ar', 'Make It Smart | Contacto');
    $mail->addBCC('taurus@makeitsmart.com.ar');

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Nuevo Contacto';
    $mail->Body    = "Hola Angel,<br><br>Has recibido un nuevo contacto de tu landing page.<br><br>Nombre: $name<br>Email: $email<br>Telefono: $phone<br>Mensaje: $message<br><br>Saludos!";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
