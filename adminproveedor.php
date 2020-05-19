<?php
require_once("cn.php");
//require_once("menu.php");
if(isset($_POST["ok"])){
	$proveedor=$_POST["proveedor"];
	$sql="insert into proveedor(nom_proveedor) values('$proveedor')";
	$conn->query($sql);
}elseif(isset($_POST["del"])){
	$proveedor=$_POST["eliminar"];
	foreach($proveedor as $idproveedor){
		$sql="delete from Proveedor where idproveedor='$idproveedor'";
		$conn->query($sql);
	}
}
?>

<section class="container mt-5 col-md-6" style="background-color: white">
	<div><p style="color: white">Administrar Proveedores</p></div>
	<form method="post">
		<table class="table table-bordered">
			<tr>
				<td>Proveedor</td>
				<td><input name="proveedor" type="text"></td>
			</tr>


			<tr>
				<td colspan="4" align='center'>
					<input type="submit" name="ok" value='Agregar Proveedor' class="btn btn-primary">
				</td> 

			</tr>
		</table>
	</form>
</section>

<section class="container mt-5 col-md-5" style="background-color: white">
	<h3 style="color: black; text-align: center">Consulta de Proveedor</h3>
	<form method="post">
		<table class="table table-bordered">
			<thead class="thead-dark">
				<tr>

					<th>ID</th>
					<th>Nombre de Proveedor</th>
					<th>Acciones</th>


				</tr>

				<?php
				$sql="select * from Proveedor";
				$rs=$conn->query($sql);
				while($fila=$rs->fetch_assoc()){
					?>
					<tr>				
						<td width='1%'><?php echo $fila["id_proveedor"] ?>
							<td><?php echo $fila["nom_proveedor"] ?>
								<td><a class='btn btn-warning' href="index.php?op=modificarproveedor.php&idprove=<?php echo $fila["id_proveedor"]?>">Modificar</a> 
									<a class='btn btn-danger' href="index.php?op=eliminarproveedor.php&idprove=<?php echo $fila["id_proveedor"]?>">Eliminar</a>

									<?php 
								}
								?>

							</table>
						</form>
					</div>





