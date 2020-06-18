<?php
require_once("cn.php");
require_once("classEncript.php"); // nuevo
	$objEncriptar= new classEncriptar(); // nuevo

if(isset($_POST["okcliente"])){
	$id_cliente= $_POST["id_cliente"];
	$loginusuario=$_POST["loginusuario"];
	$clave=$_POST["clave"];
	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$correo=$_POST["correo"];
	$telefono=$_POST["telefono"];
	$direccion=$_POST["direccion"];


 $textoEncriptado=$objEncriptar->encriptar_desincriptar("encriptar",$_POST["clave"]); // nuevo


	$sql="update Cliente set loginusuario='$loginusuario', clave='$textoEncriptado', nombre='$nombre', apellido='$apellido',correo_electronico='$correo', telefono='$telefono', direccion='$direccion' where id_cliente='$id_cliente'";
	$rs=$conn->query($sql);
	echo "
	<script>
	location.href='index.php?op=ajustescliente.php'; 
	</script>
	"; //cambie enlace

	$textoNoEncriptado=$objEncriptar->encriptar_desincriptar("desencriptar",$textoEncriptado); // nuevo

}
$idcliente=$_GET["idcliente"];
$sql="select * from Cliente where id_cliente='$idcliente'";
$rs=$conn->query($sql);
$fila=$rs->fetch_assoc();
?>


<section class="container mt-5 col-md-6" style="background-color: white">
	<h3 style="color: black; text-align: center">Modifica tus datos</h3>
<form method="post">
	<table class="table table-bordered table-dark">
		<tr>
			<td>loginusuario</td>
			<td>
				<input name="id_cliente" type="hidden" value="<?php echo $fila["id_cliente"]?>">
				<input type="text" value="<?php echo $fila["loginusuario"]?>" disabled>
			</td>
			<td>
				<input name="loginusuario" type="text" value="<?php echo $fila["loginusuario"]?>" minlength="3" required oninvalid="this.setCustomValidity('el nombre debe contener por lo menos 3 letras')" oninput="this.setCustomValidity('')" />
			</td>
		</tr>
		<tr>
			<td>Clave</td>
			<?php $textoDesencriptado=$objEncriptar->encriptar_desincriptar("desencriptar",$fila["clave"]);?> 
			<td>				
				<input type="text" value="<?php echo $textoDesencriptado?>" disabled>
			</td>
			<td>
				<input name="clave" type="text" value="<?php echo $textoDesencriptado?>" required oninvalid="this.setCustomValidity('debe agregar una contraseña')" oninput="this.setCustomValidity('')" />
			</td>
		</tr>
		<td>Nombre</td>
			<td>				
				<input type="text" value="<?php echo $fila["nombre"]?>" disabled>
			</td>
			<td>
				<input name="nombre" type="text" value="<?php echo $fila["nombre"]?>" pattern="[A-Za-z]+" required>
			</td>
		</tr>
		<td>Apellido</td>
			<td>				
				<input type="text" value="<?php echo $fila["apellido"]?>" disabled>
			</td>
			<td>
				<input name="apellido" type="text" value="<?php echo $fila["apellido"]?>" pattern="[A-Za-z]+" required>
			</td>
		</tr>
		<td>Correo electronico</td>
			<td>				
				<input type="text" value="<?php echo $fila["correo_electronico"]?>" disabled>
			</td>
			<td>
				<input name="correo" type="email" value="<?php echo $fila["correo_electronico"]?>" required>
			</td>
		</tr>
		<td>Telefono</td>
			<td>				
				<input type="text" value="<?php echo $fila["telefono"]?>" disabled>
			</td>
			<td>
				<input name="telefono" type="text" value="<?php echo $fila["telefono"]?>" pattern="[0-9]+" maxlength="8" required>
			</td>
		</tr>
		<td>Direccion</td>
			<td>				
				<input type="text" value="<?php echo $fila["direccion"]?>" disabled>
			</td>
			<td>
				<input name="direccion" type="text" value="<?php echo $fila["direccion"]?>" required>
			</td>
		</tr>
		<tr>
			<td colspan="4" align='center'>
				<input type="submit" name="okcliente" value='Modificar' class="btn btn-warning">
			</td>
		</tr>
	</table>
</form>
</section>