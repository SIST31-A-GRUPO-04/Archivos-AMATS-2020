<?php
require_once("cn.php");
//require_once("menu.php");
if(isset($_POST["ok"])){
	$id_categoria = $_REQUEST["categoria"];
	$id_proveedor = $_REQUEST["proveedor"];
	$nom_producto=$_POST["nom_producto"];

	$nom=$_REQUEST["txtnom"];
	$foto=$_FILES["imagen"]["name"];
	$ruta=$_FILES["imagen"]["tmp_name"];
	$destino="fotos/".$foto;
	copy($ruta,$destino);


	
	$descripcion = $_POST["descripcion"];		
	$precio = $_POST["precio"];
	$stock = $_POST["stock"];
	$s_medida = $_POST["medida"];
	$fecha_ingreso = $_POST["fecha"];

	$sql="insert into Productos(id_categoria,id_proveedor,nom_producto,imagen,descripcion,precio,stock,sistema_de_medida,fecha_ingreso) values('$id_categoria','$id_proveedor','$nom_producto','$destino','$descripcion','$precio','$stock','$s_medida','$fecha_ingreso')";
	$conn->query($sql);
}elseif(isset($_POST["del"])){
	$pelicula=$_POST["eliminar"];
	foreach($pelicula as $idpelicula){
		$sql="delete from peliculas where idpelicula='$idpelicula'";
		$conn->query($sql);
	}
}
?>





<section class="container mt-5" style="background-color: white">
		<h3 style="color: black; text-align: center">Administrar Productos</h3>
		<form method="post" enctype="multipart/form-data">
			<table class="table table-bordered table-dark">
				
				<tr>						
					<td>Categoria</td>	
					<td><select name="categoria">
					<?php 
				$sql="select * from Categoria";
				$rs=$conn->query($sql);
				?>

				<?php while($filac=$rs->fetch_assoc()){ ?>

					<option value="<?php echo $filac['id_categoria'] ?>"><?php echo $filac['nom_categoria'] ?></option>
			 <?php 	} ?>
					
				</select></td>				

				</tr>

				<tr>						
					<td>Proveedor</td>	
					<td><select name="proveedor">

					<?php 
				$sql="select * from Proveedor";
				$rs=$conn->query($sql);
				?>

				<?php while($filap=$rs->fetch_assoc()){ ?>

					<option value="<?php echo $filap['id_proveedor'] ?>"><?php echo $filap['nom_proveedor'] ?></option>

				<?php 	} ?>

				</select></td>					

				</tr>

				<tr>						
					<td>Nombre de Producto</td>	
					<td><input type="text" name="nom_producto" class="form-control"></td>				

				</tr>

				<tr>

					<td>Imagen</td>
					<td><input type="file" name="imagen" class="form-control-file"></td>


				</tr>

				<tr>						
					<td>Descripcion</td>	
					<td><input type="text" name="descripcion" class="form-control"></td>					

				</tr>

				<tr>						
					<td>Precio</td>	
					<td><input type="number" name="precio" step="0.01" class="form-control"></td>					

				</tr>

				<tr>						
					<td>Stock</td>	
					<td><input type="number" name="stock" class="form-control"></td>					

				</tr>

				<tr>						
					<td>Sistema de medida</td>	
					<td><input type="text" name="medida" class="form-control"></td>					

				</tr>

				<tr>						
					<td>Fecha de ingreso</td>	
					<td><input type="date" name="fecha" class="form-control"></td>					

				</tr>

				<tr>						
					<td colspan="2" align="center"><input type="submit" name="ok" class="btn btn-primary"></td>

				</tr>
				
			</table>		
		</form>  <!--Cierre de formulario ok -->
	</section>




	<section class="container mt-5 col-md-12" style="background-color: white">
		<h3 style="color: black; text-align: center">Consulta de Productos</h3>
	<form method="post">
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
				<th>Stock</th>
				<th>Sistema de medida</th>
				<th>Fecha de ingreso</th>
				<th>Acciones</th>
				<!--<td>sinopsis</td>
				<td>director</td>
				<td>escritores</td>-->

				
			</tr>

			<?php
			$sql="SELECT * FROM productos INNER JOIN Categoria ON Productos.`id_categoria` = Categoria.`id_categoria` INNER JOIN Proveedor ON Productos.`id_proveedor` = Proveedor.`id_proveedor` ORDER BY productos.id_producto asc ";  //consulta combinada
			$rs=$conn->query($sql);
			while($fila=$rs->fetch_assoc())
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
				    <td><?php echo $fila['stock'] ?>
				    <td><?php echo $fila['sistema_de_medida'] ?>
				    <td><?php echo $fila['fecha_ingreso'] ?>
				    <td><a class="btn btn-secondary" href="index.php?op=modificarproductos.php&idpro=<?php echo $fila['id_producto'] ?>">Modificar</a>
				    	<a class="btn btn-danger" href="index.php?op=eliminarproductos.php&idpro=<?php echo $fila['id_producto'] ?>">Eliminar</a>		    

				    
			
			<?php 
			}
			?>
			
		</table>
	</form>
</div>