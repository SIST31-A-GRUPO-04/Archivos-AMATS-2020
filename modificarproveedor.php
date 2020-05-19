sa<?php
require_once("cn.php");
if(isset($_POST["ok"])){
	$id_proveedor= $_POST["id_proveedor"];
	$nom_proveedor=$_POST["nom_proveedor"];
	$sql="update Proveedor set nom_proveedor='$nom_proveedor' where	id_proveedor='$id_proveedor'";
	$rs=$conn->query($sql);
	echo "
	<script>
	location.href='index.php?op=adminproveedor.php'; 
	</script>
	"; //cambie enlace
}
$idproveedor=$_GET["idprove"];
$sql="select * from Proveedor where id_proveedor='$idproveedor'";
$rs=$conn->query($sql);
$fila=$rs->fetch_assoc();
?>


<section class="container mt-5 col-md-6" style="background-color: white">
	<h3 style="color: black; text-align: center">Modificar Proveedor</h3>
<form method="post">
	<table class="table table-bordered table-dark">
		<tr>
			<td>Proveedor</td>
			<td>
				<input name="id_proveedor" type="hidden" value="<?php echo $fila["id_proveedor"]?>">
				<input name="nom_proveedor" type="text" value="<?php echo $fila["nom_proveedor"]?>">
			</td>
		</tr>
		<tr>
			<td colspan="4" align='center'>
				<input type="submit" name="ok" value='Agregar Proveedor' class="btn btn-warning">
			</td>
		</tr>
	</table>
</form>
</section>