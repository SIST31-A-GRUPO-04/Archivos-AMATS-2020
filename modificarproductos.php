<?php

require_once("cn.php");
if(isset($_POST["ok"])){
	$idproducto = $_POST["id_producto"];
	$id_categoria = $_POST["categoria"];
	$id_proveedor = $_POST["proveedor"];
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
	
	$sql= "update productos set id_categoria='$id_categoria', id_proveedor='$id_proveedor', nom_producto='$nom_producto',imagen='$destino', descripcion='$descripcion', precio='$precio', disponible='$disponible', sistema_de_medida='$s_medida', fecha_ingreso='$fecha_ingreso' where id_producto='$idproducto'";
	$rs=$conn->query($sql);
	echo "
	<script>
	location.href='index.php?op=consultaproducto.php'; 
	</script>
	"; //cambie enlace
}
$idproducto=$_GET["idpro"];
$sql="SELECT * FROM productos INNER JOIN Categoria ON Productos.`id_categoria` = Categoria.`id_categoria` INNER JOIN Proveedor ON Productos.`id_proveedor` = Proveedor.`id_proveedor` where id_producto='$idproducto' ORDER BY productos.id_producto asc ";


$rs=$conn->query($sql);
$fila=$rs->fetch_assoc();
?>

<link rel="stylesheet" type="text/css" href="menu.css">
<br><br>
<section class="container col-md-7" style="background-color: white">
	<h3 style="color: black; text-align: center">Modificar Producto</h3>
	<form method="post" enctype="multipart/form-data">
		<table class="table table-bordered table-dark">

			
			<tr>						
				<td>Categoria</td>

				<td>
					<input name="id_producto" type="hidden" value="<?php echo $fila["id_producto"]?>">	
					<input type="text" name="" value="<?php echo $fila["nom_categoria"]?>" disabled>
					<select name="categoria" class="custom-select">
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
				<td>
					<input type="text" name="" value="<?php echo $fila["nom_proveedor"]?>" disabled>
					<select name="proveedor" class="custom-select">

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
				<td><input type="text" name="nom_producto" class="form-control" value="<?php echo $fila['nom_producto'] ?>" required oninvalid="this.setCustomValidity('este campo es necesario')" oninput="this.setCustomValidity('')"  /></td>				

			</tr>

			<tr>

				<td>Imagen</td>
				<td><img width="100" height="100" src="<?php echo $fila['imagen'] ?>">
					<input type="file" name="imagen" class="form-control-file"></td>


				</tr>

				<tr>						
					<td>Descripcion</td>	
					<td><input type="text" name="descripcion" class="form-control" value="<?php echo $fila['descripcion'] ?>" required oninvalid="this.setCustomValidity('este campo es necesario')" oninput="this.setCustomValidity('')"  /></td>					

				</tr>

				<tr>						
					<td>Precio</td>	
					<td><input type="number" step="0.01" name="precio" class="form-control" value="<?php echo $fila['precio'] ?>" min="0.01" required oninvalid="this.setCustomValidity('este campo es necesario')" oninput="this.setCustomValidity('')"  /></td>					

				</tr>

				<tr>						
					<td>Disponible</td>
					<td><input type="text" value="<?php echo $fila['disponible'] ?>" disabled>
						<select name="disponible" class="custom-select">
					<option VALUE="disponible">Disponible
						<option VALUE="no disponible">No disponible							
							</select>
					</td>					

				</tr>

				<tr>						
					<td>Sistema de medida</td>	
					<td><input type="text" name="medida" class="form-control" value="<?php echo $fila['sistema_de_medida'] ?>" required oninvalid="this.setCustomValidity('este campo es necesario')" oninput="this.setCustomValidity('')"  /></td>					

				</tr>

				<tr>						
					<td>Fecha de ingreso</td>	
					<td><input type="date" name="fecha" class="form-control" value="<?php echo $fila['fecha_ingreso'] ?>" required oninvalid="this.setCustomValidity('este campo es necesario')" oninput="this.setCustomValidity('')"  /></td>					

				</tr>
				<td colspan="4" align='center'>
					<input type="submit" name="ok" value='Agregar' class="btn btn-success">
				</td>
			</tr>
		</table>
	</form>
</div>