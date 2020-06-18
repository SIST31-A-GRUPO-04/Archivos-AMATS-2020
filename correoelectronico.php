<?php
//Llamando de los Campos//
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];

//Destinatario del Correo//
$destinatario = "agroservicioelmilagro@gmail.com";
$asunto = "Consulta Agroservicio el Milagro";

$carta = "De: $nombre \n";
$carta .= "Correo: $correo \n";
$carta .= "Mensaje: $mensaje \n";

//Enviar el correo//
mail($destinatario, $asunto, $carta);
header('Location:gracias.php');
?>