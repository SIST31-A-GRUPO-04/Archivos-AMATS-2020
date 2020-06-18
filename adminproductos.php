<?php

require_once("cn.php");
//require_once("menu.php");
if(isset($_POST["ok"])){
	$id_categoria = $_REQUEST["categoria"];
	$id_proveedor = $_REQUEST["proveedor"];
	$nom_producto=$_POST["nom_producto"];

	
	$foto=$_FILES["imagen"]["name"];
	$ruta=$_FILES["imagen"]["tmp_name"];
	$destino="fotos/".$foto;
	copy($ruta,$destino);

	
	$descripcion = $_POST["descripcion"];		
	$precio = $_POST["precio"];
	$disponible = $_POST["disponible"];
	$s_medida = $_POST["medida"];
	$fecha_ingreso = $_POST["fecha"];

	$sql="insert into Productos(id_categoria,id_proveedor,nom_producto,imagen,descripcion,precio,disponible,sistema_de_medida,fecha_ingreso) values('$id_categoria','$id_proveedor','$nom_producto','$destino','$descripcion','$precio','$disponible','$s_medida','$fecha_ingreso')";
	$conn->query($sql);
}elseif(isset($_POST["del"])){
	$pelicula=$_POST["eliminar"];
	foreach($pelicula as $idpelicula){
		$sql="delete from peliculas where idpelicula='$idpelicula'";
		$conn->query($sql);
	}
}
?>

<body>



<section class="container mt-5" style="background-color: white">
	<h3 style="color: black; text-align: center">Agregar Productos</h3>
	<form method="post" enctype="multipart/form-data">
		<table class="table table-bordered table-dark">

			<tr>						
				<td>Categoria</td>	
				<td><select name="categoria" class="custom-select col-md-4">
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
				<td><select name="proveedor" class="custom-select col-md-4">

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
				<td><input type="text" name="nom_producto" class="form-control" required oninvalid="this.setCustomValidity('este campo es necesario')" oninput="this.setCustomValidity('')"  /></td>				

			</tr>

			<tr>

				<td>Imagen</td>
				<td><input type="file" name="imagen" class="form-control-file" required oninvalid="this.setCustomValidity('este campo es necesario')" oninput="this.setCustomValidity('')"  /></td>


			</tr>

			<tr>						
				<td>Descripcion</td>	
				<td><input type="text" name="descripcion" class="form-control" required oninvalid="this.setCustomValidity('este campo es necesario')" oninput="this.setCustomValidity('')"  /></td>					

			</tr>

			<tr>						
				<td>Precio</td>	
				<td><input type="number" name="precio" step="0.01" class="form-control" min="0.01" required oninvalid="this.setCustomValidity('este campo es necesario')" oninput="this.setCustomValidity('')"  /></td>					

			</tr>

			<tr>						
				<td>Disponible</td>	
				<td><select name="disponible" class="custom-select col-md-2">
					<option VALUE="disponible" SELECTED>Disponible
						<option VALUE="no disponible">No disponible							
							</select></td>
												

						</tr>

						<tr>						
							<td>Sistema de medida</td>	
							<td><input type="text" name="medida" class="form-control" required oninvalid="this.setCustomValidity('este campo es necesario')" oninput="this.setCustomValidity('')"  /></td>					

						</tr>

						<tr>						
							<td>Fecha de ingreso</td>	
							<td><input type="date" name="fecha" class="form-control" required oninvalid="this.setCustomValidity('este campo es necesario')" oninput="this.setCustomValidity('')"  /></td>					

						</tr>

						<tr>						
							<td colspan="2" align="center"><input type="submit" name="ok" class="btn btn-primary"></td>

						</tr>

					</table>		
				</form>  <!--Cierre de formulario ok -->
			</section>

				</form>
				<form method="post" action="imprimirproductos.php">							
				<center><input type="submit" name="imprimirproductos" value="Generar Reporte" class="btn btn-success">
				<a href="index.php?op=consultaproducto.php" class="btn btn-primary">Ir a Consulta de productos</a></center>
				</form>
			</div>