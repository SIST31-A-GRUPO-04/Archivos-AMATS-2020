<?php
require_once("cn.php");
//require_once("menu.php");
if(isset($_POST["ok"])){
	$categoria=$_POST["categoria"];
	$sql="insert into categoria(nom_categoria) values('$categoria')";
	$conn->query($sql);
}elseif(isset($_POST["del"])){
	$categoria=$_POST["eliminar"];
	foreach($categoria as $idcategoria){
		$sql="delete from categoria where idcategoria='$idcategoria'";
		$conn->query($sql);
	}
}
?>

<section class="container mt-5 col-md-6" style="background-color: white">
	<div><p style="color: white">Administrar categorias</p></div>
	<form method="post">
		<table class="table table-bordered">
			<tr>
				<td>Categoria</td>
				<td><input name="categoria" type="text" class="form-control"></td>
			</tr>


			<tr>
				<td colspan="4" align='center'>
					<input type="submit" name="ok" value='Agregar categoria' class="btn btn-primary">
				</td> 

			</tr>
		</table>
	</form>
</section>

<section class="container mt-5 col-md-5" style="background-color: white">
	<h3 style="color: black; text-align: center">Consulta de Categoria</h3>
	<form method="post">
		<table class="table table-bordered">
			<thead class="thead-dark">
				<tr>

					<th>ID</th>
					<th>Nombre de Categoria</th>
					<th>Acciones</th>


				</tr>

				<?php
				$sql="select * from Categoria";
				$rs=$conn->query($sql);
				while($fila=$rs->fetch_assoc()){
					?>
					<tr>				
						<td width='1%'><?php echo $fila["id_categoria"] ?>
							<td><?php echo $fila["nom_categoria"] ?>
								<td><a class='btn btn-warning' href="index.php?op=modificarcategoria.php&idcat=<?php echo $fila["id_categoria"]?>">Modificar</a> 
									<a class='btn btn-danger' href="index.php?op=eliminarcategoria.php&idcat=<?php echo $fila["id_categoria"]?>">Eliminar</a>

									<?php 
								}
								?>

							</table>
						</form>
					</div>




