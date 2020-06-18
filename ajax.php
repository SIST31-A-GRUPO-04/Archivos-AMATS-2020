<?php
include "cn.php";
$respuesta = '';

if(isset($_GET["producto"]))
{
	$producto=$_GET["producto"];

	
$sql="SELECT * FROM productos INNER JOIN Categoria ON Productos.`id_categoria` = Categoria.`id_categoria` INNER JOIN Proveedor ON Productos.`id_proveedor` = Proveedor.`id_proveedor` where nom_producto like '%$producto%'";

}else{
	$sql="SELECT * FROM productos INNER JOIN Categoria ON Productos.`id_categoria` = Categoria.`id_categoria` INNER JOIN Proveedor ON Productos.`id_proveedor` = Proveedor.`id_proveedor` ORDER BY productos.id_producto asc ";
}



$rs=$conn->query($sql);
if(mysqli_num_rows($rs) > 0)
{
	$respuesta .= '
	<section class="container mt-5 col-md-12" style="background-color: white">
	<table class="table table-bordered">
	<thead class="thead-dark">
	<tr>
	<th>ID</th>
	<th>Categoria</th>
	<th>Proveedor</th>
	<th>Nombre de producto</th>	
	<th>Imagen</th>
	<th>Descripcion</th>				
	<th>Precio</th>
	<th>Disponibilidad</th>
	<th>Sistema de medida</th>
	<th>Fecha de ingreso</th>
	<th>Acciones</th>
	</tr>';
	while($fila=$rs->fetch_assoc())
	{
		$respuesta .= '
		<tr>
		<td>'.$fila["id_producto"].'</td>
		<td>'.$fila["nom_categoria"].'</td>
		<td>'.$fila["nom_proveedor"].'</td>
		<td>'.$fila["nom_producto"].'</td>
		<td><img width="100" height="100" src="'.$fila['imagen'].'">
		<td>'.$fila["descripcion"].'</td>
		<td>'.$fila["precio"].'</td>
		<td>'.$fila["disponible"].'</td>
		<td>'.$fila["sistema_de_medida"].'</td>
		<td>'.$fila["fecha_ingreso"].'</td>
		<td><a class="btn btn-secondary" href="index.php?op=modificarproductos.php&idpro='.$fila["id_producto"].'	">Modificar</a>
			<a class="btn btn-danger" href="index.php?op=eliminarproductos.php&idpro='.$fila['id_producto'].'">Eliminar</a></td>
		</tr>
		';
	}
	echo $respuesta;
}
else
{
	echo 'No hay Datos';
}



?>


