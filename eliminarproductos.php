<?php 
require_once("cn.php");

$id_producto = $_GET["idpro"];

$sql="delete from productos where id_producto='$id_producto'";
$rs=$conn->query($sql);

header('location:index.php?op=consultaproducto.php');
?>