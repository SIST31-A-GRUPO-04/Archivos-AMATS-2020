<?php
	





	if(empty($_SESSION["add_carro"]))
	{
	echo "<script>alert('El carrito esta vacio');</script>";
	header('location: index.php?op=detalledeorden.php');
	}






	require_once("cn.php");


	$sql="select * from cliente where loginusuario='$_SESSION[adminpelis]'";
	$rs = $conn->query($sql);


	while($fila=$rs->fetch_assoc())
	{
		$id_cliente = $fila['id_cliente'];
		$nombre = $fila['nombre'];
		$apellido = $fila['apellido'];
		$correoelectronico = $fila['correo_electronico'];
		$telefono = $fila['telefono'];
		$direccion = $fila['direccion'];

		}


	if(isset($_POST["enviar"]))
	{
		$total = 0;
		$fechaActual = date('Y-m-d');


		$sql = " INSERT INTO pedido (id_cliente,fecha_pedido) VALUES ('$id_cliente','$fechaActual')";//insertar pedido

		$conn->query($sql);		

	
		$latest_id =  mysqli_insert_id($conn);  





		foreach($_SESSION["add_carro"] as $keys => $values)		

	{	

		$id_producto = $values['item_id'];
		$total = ($values["item_cantidad"] * $values["item_precio"]);	

		$totales = number_format($total, 2);

	
		

	$sql = "INSERT INTO pedido_producto (num_pedido,id_producto,cantidad_producto,total) values ('$latest_id','$id_producto', '".$values['item_cantidad']."','$totales')";

		$conn->query($sql);
	
	


		//$sql = " INSERT INTO pedido (id_pedido,num_pedido,id_producto,id_cliente,cantidad_producto,fecha_pedido,total) VALUES (null,'N002','$id_producto','$id_cliente','".$values['item_cantidad']."', '$fechaActual','$totales')  ";



		//$sql = "INSERT INTO pedidos (`id_pedidoo`,`nombre`, `email`, `direccion`, `telefono`, `pago`, `productos`, `total`) VALUES (null,'$nombre', '$correoelectronico', '$direccion', '$telefono', 'efctivo', ' ".$values['item_nombre']."   ' , '$totales')"; 
		
	}



		header('location:index.php?op=completadocliente.php');


	}



	


?>



<!DOCTYPE html>
<html>
<head>
	<title>Finalizar compra </title>
</head>
<body>

<form method="post">

	<div class="container">
		<h3 align="center">INFORMACION OBLIGATORIA</h3>
		<h5 align="center">¿Son correctos estos datos?</h5>

		<input type="text" class="form-control" value="<?php echo $nombre ?>" disabled>
		<input type="text" class="form-control" value="<?php echo $apellido ?>" disabled>
		<input type="text" class="form-control" value="<?php echo $correoelectronico ?>" disabled>
		<input type="text" class="form-control" value="<?php echo $telefono ?>" disabled>
		<input type="text" class="form-control" value="<?php echo $direccion ?>" disabled>

		<a href="index.php?op=Producto.php" class="btn btn-info">Seguir Comprando</a>
		<input type="submit" name="enviar" class="btn btn-success" value="Comprar">





</body>
</html>
