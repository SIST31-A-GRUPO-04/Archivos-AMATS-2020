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

	$nombre=$_POST['xnombre'];
$carrera=$_POST['xcarrera'];
$limit=$_POST['xregistros'];

	if (empty($_POST['xcarrera']))
	{
		$where="where nom_producto like '".$nombre."%'";
	}

	else if (empty($_POST['xnombre']))
	{
		$where="where categoria.id_categoria='".$carrera."'";
	}

	else
	{
		$where="where nom_producto like '".$nombre."%' and categoria.id_categoria = '".$carrera."'";
	}
}
/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////


$sql="SELECT * FROM productos INNER JOIN Categoria ON Productos.`id_categoria` = Categoria.`id_categoria` INNER JOIN Proveedor ON Productos.`id_proveedor` = Proveedor.`id_proveedor` $where $limit ";

$categoria = "select * from categoria";
$resAlumnos=$conn->query($sql);
$resCarreras=$conn->query($sql);

if(mysqli_num_rows($resAlumnos)==0)
{
	$mensaje="<h1>No hay registros que coincidan con su criterio de búsqueda.</h1>";
}
?>
<html lang="es">

	<head>
		<title>Filtro de Búsqueda PHP</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

		<link href="css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h2>Filtro de Búsqueda PHP</h2>
			</div>
		</header>
		<section>
			<form method="post">
				<input type="text" placeholder="Nombre..." name="xnombre"/>
				<select name="xcarrera">
					<option value="">Categoria </option>
					<?php 
					$sql="select * from Categoria";
					$rs=$conn->query($sql);
					?>

					<?php while($filac=$rs->fetch_assoc()){ ?>

						<option value="<?php echo $filac['id_categoria'] ?>"><?php echo $filac['nom_categoria'] ?></option>
					<?php 	} ?>
					
				</select>

				<select name="xregistros">
					<option value="">No. de Registros</option>
					<option value="limit 1">1</option>
					<option value="limit 3">3</option>
					<option value="limit 6">6</option>
					<option value="limit 9">9</option>
				</select>
				<button name="buscar" type="submit">Buscar</button>
			</form>
			<table class="table">
				<tr>
								<th>ID</th>
								<th>Categoria</th>
								<th>Proveedor</th>
								<th>Nombre de producto</th>	
								
								<th>Descripcion</th>					
								<th>Precio</th>
								<th>Disponibilidad</th>
								<th>Sistema de medida</th>
								<th>Fecha de ingreso</th>
								<th>Acciones</th>
				</tr>

				<?php

				while ($registroAlumnos = $resAlumnos->fetch_assoc())
				{

					echo'<tr>
						 <td>'.$registroAlumnos['id_producto'].'</td>
						 <td>'.$registroAlumnos['nom_categoria'].'</td>
						 <td>'.$registroAlumnos['nom_proveedor'].'</td>
						 <td>'.$registroAlumnos['nom_producto'].'</td>						 
						 <td>'.$registroAlumnos['descripcion'].'</td>
						 <td>'.$registroAlumnos['precio'].'</td>
						 <td>'.$registroAlumnos['disponible'].'</td>
						 <td>'.$registroAlumnos['sistema_de_medida'].'</td>
						 <td>'.$registroAlumnos['fecha_ingreso'].'</td>

						 </tr>';
				}
				?>
			</table>

			<?
				echo $mensaje;
			?>
		</section>
	</body>
</html>


