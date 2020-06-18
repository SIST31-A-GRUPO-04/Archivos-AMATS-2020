<?php

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////

include("cn.php");
////////////////// VARIABLES DE CONSULTA////////////////////////////////////

$where="";
$nombre="";
$carrera="";
$limit="";



////////////////////// BOTON BUSCAR //////////////////////////////////////

if (isset($_POST['buscar']))
{

	$nombre=$_POST['nombre'];
	$categoria=$_POST['categoria'];
	$limit=$_POST['xregistros'];

	if (empty($_POST['categoria']))
	{
		$where="where nom_producto like '".$nombre."%'";
	}

	else if (empty($_POST['xnombre']))
	{
		$where="where categoria.id_categoria='".$categoria."'";
	}

	else
	{
		$where="where nom_producto like '".$nombre."%' and categoria.id_categoria = '".$categoria."'";
	}
}
/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////


$sql="SELECT * FROM productos INNER JOIN Categoria ON Productos.`id_categoria` = Categoria.`id_categoria` INNER JOIN Proveedor ON Productos.`id_proveedor` = Proveedor.`id_proveedor` $where $limit ";


$res=$conn->query($sql); //para hacer consulta de productos


if(mysqli_num_rows($res)==0)
{
	$mensaje="<h1>No hay registros que coincidan con su criterio de búsqueda.</h1>";
}
?>
<html lang="es">

<head>
	<title>Busqueda de productos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>




</head>
<body>	

	<h3 style="color: black; text-align: center">Consulta de Productos</h3>

	<form method="post">	
		
		<div class="container">
			<div class="row">
				<div class="col-sm">
					<input type="text" placeholder="Nombre..." name="nombre"/ class="form-control">
				</div>
				<div class="col-sm">
					<select name="categoria" class="custom-select">
						<option value="">Categoria </option>
						<?php 
						$sql="select * from Categoria";
						$rs=$conn->query($sql);
						?>

						<?php while($filac=$rs->fetch_assoc()){ ?>

							<option value="<?php echo $filac['id_categoria'] ?>"><?php echo $filac['nom_categoria'] ?></option>
						<?php 	} ?>

					</select>
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
			</div> <!-- cierre de row-->		
		</div>	<!-- Cierre de container-->			
		<br>
		<center><button name="buscar" type="submit" class="btn btn-primary">Buscar</button>
			<a href="index.php?op=adminproductos.php" class="btn btn-primary">Agregar Productos</a></center>
	</form> <!-- Cierre de form para buscar-->

</div>



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
			</tr>

			<?php 
			while($fila=$res->fetch_assoc())
			{
				?>
				<tr>


					<td width='1%'><?php echo $fila['id_producto'] ?>				    
					<td><?php echo $fila['nom_categoria'] ?>
					<td><?php echo $fila['nom_proveedor'] ?>
					<td><?php echo $fila['nom_producto'] ?>
					<td><img width="100" height="100" src="<?php echo $fila['imagen'] ?>">
						<td><?php echo $fila['descripcion'] ?>	

						<td><?php echo $fila['precio'] ?>
						<td><?php echo $fila['disponible'] ?>
						<td><?php echo $fila['sistema_de_medida'] ?>
						<td><?php echo $fila['fecha_ingreso'] ?>
						<td><a class="btn btn-secondary" href="index.php?op=modificarproductos.php&idpro=<?php echo $fila['id_producto'] ?>">Modificar</a>
							<a class="btn btn-danger" href="index.php?op=eliminarproductos.php&idpro=<?php echo $fila['id_producto'] ?>">Eliminar</a>		    



							<?php 
						}
						?>

		</table>

		<?
		echo $mensaje;
		?>
	</section>
</body>
</html>


