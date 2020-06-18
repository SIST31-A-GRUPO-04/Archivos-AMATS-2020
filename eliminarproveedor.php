<?php 
require_once("cn.php");

$id_proveedor = $_GET["idprove"];

$sql="delete from Proveedor where id_proveedor='$id_proveedor'";
$rs=$conn->query($sql);

header('location:index.php?op=adminproveedor.php');


?>