<?php 
require_once("cn.php");

?>

<section class="container mt-5" style="background-color: white">
	<h3 style="color: black; text-align: center">Datos de clientes</h3>
	<form method="post">
		<table class="table table-bordered">
			<thead class="thead-dark">
				<tr>
					
					<th>Loginusuario</th>					
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Correo electronico</th>
					<th>Telefono</th>
					<th>Direccion</th>
					


				</tr>

				<?php
				$sql="select * from cliente where tipo='cliente'";
				$rs=$conn->query($sql);
				while($fila=$rs->fetch_assoc()){
					?>
					<tr>				
						
							<td><?php echo $fila["loginusuario"] ?>
							
							<td><?php echo $fila["nombre"] ?>
							<td><?php echo $fila["apellido"] ?>
							<td><?php echo $fila["correo_electronico"] ?>
							<td><?php echo $fila["telefono"] ?>
							<td><?php echo $fila["direccion"] ?>

									

									<?php 
								}
								?>

							</table>
						</form>
						<form action="imprimirclientes.php">
							<center><input type="submit" name="imprimirclientes" value="Generar Reporte" class="btn btn-success"></center>
						
					</div>
