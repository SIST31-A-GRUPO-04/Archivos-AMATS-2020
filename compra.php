<?php 
require_once("poo/cnpoo.php");

$obj = new clsConexion();


if(isset($_POST["pedido"]))
{
	$nombre = $_POST["nombre"];


	$campos = array('id_pedido', 'num_pedido');

	$tabla = "pedido";

	$datos[] = "2";
	$datos[] = $_POST["nombre"];

	echo $obj->insertarSqle($tabla,$campos,$datos);






}







?>