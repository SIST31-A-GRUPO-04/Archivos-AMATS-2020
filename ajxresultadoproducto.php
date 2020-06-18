<?php
include "cn.php";





$respuesta = '';

if(isset($_GET["producto"]))
{
	$producto=$_GET["producto"];



		
	$sql="SELECT * FROM productos INNER JOIN Categoria ON Productos.`id_categoria` = Categoria.`id_categoria` INNER JOIN Proveedor ON Productos.`id_proveedor` = Proveedor.`id_proveedor` where nom_producto like '%$producto%' and disponible= 'disponible'";

}else{
	
	$sql="SELECT * FROM productos INNER JOIN Categoria ON Productos.`id_categoria` = Categoria.`id_categoria` INNER JOIN Proveedor ON Productos.`id_proveedor` = Proveedor.`id_proveedor` ORDER BY productos.id_producto asc ";
	
}



$rs=$conn->query($sql);
if(mysqli_num_rows($rs) > 0)
{
	
	$respuesta.= '  

	<div class= "container">
			<div class="row mt-5">     ';
	
	while($fila=$rs->fetch_assoc())
	{
	?>
		<form method= "post" action ="index.php?op=carrito.php&id=<?php echo $fila['id_producto']; ?>">

			<?php
		$respuesta.=' 
		
		
				<div class="col-md-4">
					<div class="card">
						<center><img src="'.$fila['imagen'].'" class="card-img-fluid" width="100" height="100" data-toggle="popover" data-trigger="hover" title="Descripcion" data-content="'.$fila['descripcion'].'"></center>	
						<div class="card-body">

							<h5 class="card-title" align="center">'.$fila['nom_producto'].'</h5>
								<p class="card-text" align="center"><b>Precio: $ '.$fila['precio'].'</b></p>
								<p class="card-text" align="center"><b>Cantidad:</b> <input type="number" name="cantidad" class="form-control">

								<input type="hidden" name="hidden_nombre" value="'.$fila['nom_producto'].'" >
               					 <input type="hidden" name="hidden_precio" value="'.$fila['precio'].'" >

               					 <input type="submit" name="agregar" class="btn btn-success" value="Agregar" />
								
								


						</div>
					</div>
				</div>
						';

	}				

      $respuesta.= ' </div>

      </div>';	

		                   
		
	
	echo $respuesta;
}
else
{
	echo 'No hay Datos';
}



?>


