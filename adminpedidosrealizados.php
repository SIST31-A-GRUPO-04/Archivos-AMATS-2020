<?php 

require_once("cn.php");



$where="";
$nombre="";
$fecha="";
$limit="";


if (isset($_POST['buscar']))
{

	$nombre=$_POST['nombre'];
	$fecha=$_POST['fecha'];
	$limit=$_POST['xregistros'];
	$cliente =$_POST["cliente"];

	if (empty($_POST['fecha']))
	{
		$where="where nom_producto like '".$nombre."%'";
	}

	else if (empty($_POST['xnombre']))
	{
		$where="where pedido.fecha_pedido='".$fecha."'";
	}

	elseif(empty($_POST["cliente"]))
	{
		$where="where cliente.nombre like '".$cliente."%'";
	}

	else
	{
		$where="where nom_producto like '".$nombre."%' and pedido.fecha_pedido = '".$fecha."' and cliente.nombre like '".$cliente."%'";
	}
}


$sql="SELECT * FROM pedido INNER JOIN cliente on pedido.id_cliente = cliente.id_cliente INNER JOIN pedido_producto on pedido.num_pedido = pedido_producto.num_pedido INNER JOIN productos on pedido_producto.id_producto = productos.id_producto $where $limit";
$res=$conn->query($sql); //para hacer consulta de productos




$total = " SELECT SUM(total) AS Total FROM pedido_producto WHERE num_pedido = '31'";

$res2 =$conn->query($total);




?>


	<form method="post">	

		
		<div class="container">
			<h3 style="color: black; text-align: center">Ventas Realizadas</h3>
			<div class="row">
				<div class="col-sm">
					<input type="text" placeholder="Nombre..." name="nombre"/ class="form-control">
				</div>
				<div class="col-sm">
					<input type="date" name="fecha" class="form-control">
				</div>
				<div class="col-sm">
					<select name="xregistros" class="custom-select">
						<option value="">No. de Registros</option>
						<option value="limit 1">1</option>
						<option value="limit 3">3</option>
						<option value="limit 6">6</option>
						<option value="limit 9">9</option>
					</select>
				</div>
				<div class="col-sm">
					<input type="text" placeholder="Cliente" name="cliente"/ class="form-control">
				</div>
			</div> <!-- cierre de row-->		
		</div>	<!-- Cierre de container-->			
		<br>
		<center><button name="buscar" type="submit" class="btn btn-primary">Buscar</button>
			<a href="index.php?op=adminproductos.php" class="btn btn-primary">Agregar Productos</a></center>
	</form> <!-- Cierre de form para buscar-->



<section class="container mt-5 col-md-12" style="background-color: white">
	
	<table class="table table-bordered">
		<thead class="thead-dark">

			
			<tr>
				
				<th>Num Factura</th>
				<th>Nombre de cliente</th>
				<th>Nombre de producto</th>			
				<th>Imagen</th>
				<th>Descripcion</th>					
				<th>Precio</th>
				<th>Cantidad</th>
				<th>Total</th>
				<th>Fecha de compra</th>

				
				
			</tr>

			<?php 
			while($fila=$res->fetch_assoc())
			{
				?>
				<tr>

								    
					<td>#<?php echo $fila['num_pedido'] ?>
					<td><?php echo $fila['nombre'] ?>
					<td><?php echo $fila['nom_producto'] ?>
					<td><img width="100" height="100" src="<?php echo $fila['imagen'] ?>">
						<td><?php echo $fila['descripcion'] ?>	

						<td><?php echo $fila['precio'] ?>
						<td><?php echo $fila['cantidad_producto'] ?>
						
						<td><?php echo $fila['total'] ?>
						<td><?php echo $fila['fecha_pedido'] ?>		    



							<?php 
						}
						?>

						<?php 
						while($filas=$res2->fetch_assoc())
						{
						?>
						<td><?php echo $filas['Total'] ?>

							<?php 
						}
						?>

		</table>
		<form method="post" action="imprimirventasrealizadas.php">							
							<center><input type="submit" name="imprimirventa" value="Generar Reporte" class="btn btn-success"></center>
						</form>

