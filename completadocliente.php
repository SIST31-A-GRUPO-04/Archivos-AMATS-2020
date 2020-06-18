<!DOCTYPE html>
<html>
<head>
	<title>Completado</title>
</head>
<body>

<div class="container col-md-10">
	<div>
		<center><div class="alert alert-success">Gracias por su compra <?php echo $_SESSION["adminpelis"] ?> </div></center>
			</div>
		</div>


	<form method="post" action="index.php?op=imprimirfactura.php">
		<center><input type="submit" name="factura" value="Imprimir Factura" class="btn btn-primary">
		<a href="index.php?op=" class="btn btn-info">Regresar</a></center>

</body>
</html>