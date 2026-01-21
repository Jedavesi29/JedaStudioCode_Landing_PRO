<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Sanitización básica
$nombre  = htmlspecialchars($_POST['nombre']);
$email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$mensaje = htmlspecialchars($_POST['mensaje']);
$celular = htmlspecialchars($_POST['celular']);

$mail = new PHPMailer(true);

try {
    // CONFIG SMTP HOSTINGER
    $mail->isSMTP();
    $mail->Host       = 'smtp.hostinger.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'gerencia.general@jedastudiocode.com.co';
    $mail->Password   = 'Jedavesi29*';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    // CORREO
    $mail->setFrom('gerencia.general@jedastudiocode.com.co', 'JedaStudioCode');
    $mail->addAddress('gerencia.general@jedastudiocode.com.co');
    $mail->addReplyTo($email, $nombre);

    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Nuevo mensaje desde la web - Formulario Web';

    $mail->Body = "
        <h2>Nuevo contacto</h2>
        <p><strong>Nombre:</strong> {$nombre}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Mensaje:</strong><br>{$mensaje}</p>
        <p><strong>Celular:</strong> {$celular}</p>
    ";

    $mail->send();

    header("Location: index.html");
    exit;

} catch (Exception $e) {
    echo "Error al enviar correo: {$mail->ErrorInfo}";
}

?>