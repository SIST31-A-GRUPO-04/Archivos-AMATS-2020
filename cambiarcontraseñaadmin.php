<?php 

require_once("cn.php");
require_once("classEncript.php"); // nuevo

	$objEncriptar= new classEncriptar(); // nuevo

?>




<section class="container mt-5" style="background-color: white">
	<h3 style="color: black; text-align: center">Sus Datos</h3>
	<form method="post">
		<table class="table table-bordered">
			<thead class="thead-dark">
				<tr>

					
					<th>Loginusuario</th>
					<th>Clave</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Correo electronico</th>
					<th>Telefono</th>
					<th>Direccion</th>
					<th>Acciones</th>





				</tr>

				<?php
				$sql="select * from cliente where loginusuario='$_SESSION[adminpelis]'";
				$rs=$conn->query($sql);
				while($fila=$rs->fetch_assoc()){
					?>
					<tr>				
						
							<td><?php echo $fila["loginusuario"] ?>
							<?php $textoDesencriptado=$objEncriptar->encriptar_desincriptar("desencriptar",$fila["clave"]);?>  <!--Nuevo-->
							<td><?php echo $textoDesencriptado ?>  <!--Nuevo-->
							<td><?php echo $fila["nombre"] ?>
							<td><?php echo $fila["apellido"] ?>
							<td><?php echo $fila["correo_electronico"] ?>
							<td><?php echo $fila["telefono"] ?>
							<td><?php echo $fila["direccion"] ?>
								<td><a class='btn btn-warning' href="index.php?op=modificarcliente.php&idcliente=<?php echo $fila["id_cliente"]?>">Modificar</a> 
									

									<?php 
								}
								?>

							</table>
						</form>
						
					</div>
