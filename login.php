<?php
session_start();
require_once("cn.php");
require_once("classEncript.php"); // nuevo


if(isset($_POST["ok2"])){
	$usuario= $_POST["usuario"];
	$objEncriptar= new classEncriptar(); // nuevo
	$textoEncriptado=$objEncriptar->encriptar_desincriptar("encriptar",$_POST["clave"]); // nuevo
	
	$clave= $textoEncriptado;
	//$clave=SQLsegura($_POST["Clave"]);
	//$clave=($_POST["Clave"]);
	$sql="select * from Cliente 
	      where 
			loginusuario='$usuario' and 
			clave='$clave'";
	$rs=$conn->query($sql);	


	
	if($rs->num_rows>0){
		$fila=$rs->fetch_assoc();
		$_SESSION["adminpelis"]= $fila["loginusuario"];
		$_SESSION["tipo"]=$fila["tipo"];
		$_SESSION["idcliente"]=$fila["id_cliente"];
		//$_SESSION["tipo"]=$fila["tipo"];
		header("location: index.php");
	}else{echo "<script>alert('El usuario o la contraseña son incorrectos');</script>";}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Iniciar Sesion</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>

	<section class="container mt-5 col-md-4" style="background-color: white"><br><br><br><br><br>
	<h3 style="color: black; text-align: center">INICIO DE SESION</h3>
	<form  method="post" >
		<input type="text" name=usuario required value="Usuario" class="form-control" onBlur="if(this.value=='')this.value='Usuario'" onFocus="if(this.value=='Usuario')this.value=''"><br> <!-- JS because of IE support; better: placeholder="Email" -->
		<input type="text" name=clave required value="Password" class="form-control" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' "><br> <!-- JS because of IE support; better: placeholder="Password" -->
		<a href="registro.php">Registrarse</a>
		<center><input type="submit" value="Ingresar" class="btn btn-primary" name="ok2" ></center>

	</form>
	</section>
	</body>
	</html>