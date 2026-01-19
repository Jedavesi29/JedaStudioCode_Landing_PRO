<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $to = "contacto@tudominio.com";
  $subject = "Contacto Web JedaStudioCode";
  $message = "Nombre: ".$_POST['nombre']."\nCorreo: ".$_POST['email']."\nMensaje: ".$_POST['mensaje'];
  $headers = "From: noreply@tudominio.com";
  mail($to,$subject,$message,$headers);
  header("Location: index.html");
}
?>
