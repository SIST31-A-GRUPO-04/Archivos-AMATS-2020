<?php
require_once("cn.php");
if(isset($_POST["ok"])){
	$id_categoria= $_POST["id_categoria"];
	$nom_categoria=$_POST["nom_categoria"];
	$sql="update categoria set nom_categoria='$nom_categoria' where	id_categoria='$id_categoria'";
	$rs=$conn->query($sql);
	echo "
	<script>
	location.href='index.php?op=admincategorias.php'; 
	</script>
	"; //cambie enlace
}
$idcategoria=$_GET["idcat"];
$sql="select * from categoria where id_categoria='$idcategoria'";
$rs=$conn->query($sql);
$fila=$rs->fetch_assoc();
?>


<section class="container mt-5 col-md-6" style="background-color: white">
	<h3 style="color: black; text-align: center">Modificar Categoria</h3>
<form method="post">
	<table class="table table-bordered table-dark">
		<tr>
			<td>Categoria</td>
			<td>
				<input name="id_categoria" type="hidden" value="<?php echo $fila["id_categoria"]?>">
				<input name="nom_categoria" type="text" value="<?php echo $fila["nom_categoria"]?>" required oninvalid="this.setCustomValidity('no ha agregado ninguna categoria')" oninput="this.setCustomValidity('')"  />
			</td>
		</tr>
		<tr>
			<td colspan="4" align='center'>
				<input type="submit" name="ok" value='Agregar categoria' class="btn btn-primary">
			</td>
		</tr>
	</table>
</form>
</section>
