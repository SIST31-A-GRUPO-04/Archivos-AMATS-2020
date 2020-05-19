<?php 
//archivo de conexion 
$servidor = 'localhost';
$usuario = 'root';
$clave = '';
$DB = 'pruebas';
$conn = new mysqli($servidor,$usuario,$clave,$DB);
if($conn->connect_error)
{
	die('Conexion fallida: '.$conn ->connect_error);
}
?>
