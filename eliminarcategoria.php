<?php 
require_once("cn.php");

$id_categoria = $_GET["idcat"];

$sql="delete from categoria where id_categoria='$id_categoria'";
$rs=$conn->query($sql);

header('location:index.php?op=admincategorias.php');


?>