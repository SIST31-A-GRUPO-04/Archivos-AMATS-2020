<?php
include "cn.php";
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$sql="SELECT * FROM productos INNER JOIN Categoria ON Productos.`id_categoria` = Categoria.`id_categoria` INNER JOIN Proveedor ON Productos.`id_proveedor` = Proveedor.`id_proveedor` where nom_producto like '%$search%'";
}
else
{
	$sql="SELECT * FROM productos INNER JOIN Categoria ON Productos.`id_categoria` = Categoria.`id_categoria` INNER JOIN Proveedor ON Productos.`id_proveedor` = Proveedor.`id_proveedor` ORDER BY productos.id_producto asc ";
}
$rs=$conn->query($sql);
if(mysqli_num_rows($rs) > 0)
{
	
	while($fila=$rs->fetch_assoc())
	{
		$output .= '
			<div class="col-md-4">
						<div class="card">
							<center><img src='.$fila['imagen'].' class="card-img-fluid" width="100" height="100" 
								data-toggle="popover" data-trigger="hover" title="Descripcion" data-content="'.$fila['descripcion'].'"></center>
							<div class="card-body">
								<h5 class="card-title" align="center">'.$fila['nom_producto'].'></h5>
								<p class="card-text" align="center"><b>Precio: $ '.$fila['precio'].'</b></p>
								<p class="card-text" align="center"><b>Cantidad:</b> <input type="number" name="cantidad" class="form-control">
								
								<a href="index.php?op=carrito.php&producto='.$fila["id_producto"].' class="btn btn-primary">Agregar</a>
								
								
							</div>
						</div>
					</div>
		';
	}
	echo $output;
}
else
{
	echo 'No hay Datos';
}
?>