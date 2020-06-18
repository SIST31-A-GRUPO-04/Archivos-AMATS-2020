<?php 
session_start();
require_once("cn.php");
require_once("classEncript.php"); // nuevo


if(isset($_POST["ok2"])){
  $loginusuario= $_POST["loginusuario"];
  $clave= $_POST["clave"];
  $nom_usuario= $_POST["nombre"];
  $ape_usuario= $_POST["apellido"];
  $correo= $_POST["correo"];
  $telefono = $_POST["telefono"];
  $direccion = $_POST["direccion"];

  $objEncriptar= new classEncriptar(); // nuevo
  $textoEncriptado=$objEncriptar->encriptar_desincriptar("encriptar",$_POST["clave"]); // nuevo
  
  $sql="select * from Cliente where loginusuario= '$loginusuario'";
  $rs=$conn->query($sql);
  if($rs->num_rows>0){
    echo "<script>alert('el nombre de usuario ya esta ocupado');</script>";

  }else{
    $sql="INSERT INTO Cliente (loginusuario,clave,tipo,nombre,apellido,correo_electronico,telefono,direccion)
      VALUES ('$loginusuario', '$textoEncriptado','cliente' , '$nom_usuario', '$ape_usuario', '$correo', '$telefono', '$direccion');";
    $rs=$conn->query($sql);
    echo "<script>alert('usuario agregado');
    location.href='login.php';
    </script>";
  }
}


?>


<!DOCTYPE html>
<html>
<head>
  <title>Registrarse</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
  
  
<section class="container mt-5 col-md-4" style="background-color: white">
  <h3 style="color: black; text-align: center">Registro de Usuario</h3>
  <form method="post"> <!-- domingo -->
    <input title="se nesecita un nombre" type="text" name="loginusuario" placeholder="Nombre de Usuario" class="form-control" minlength="3" required oninvalid="this.setCustomValidity('el nombre debe contener por lo menos 3 letras')" oninput="this.setCustomValidity('')"  /><br>  
    <input type="password" name="clave" placeholder="Contrase&ntilde;a" class="form-control" required oninvalid="this.setCustomValidity('debe agregar una contraseña')" oninput="this.setCustomValidity('')"  /><br>
    <input type="text" name="nombre" placeholder="Nombre" pattern="[A-Za-z]+" class="form-control" required ><br>
    <input type="text" name="apellido" placeholder="Apellido" pattern="[A-Za-z]+" class="form-control" required><br>
    <input type="email" name="correo" placeholder="correo electronico" class="form-control" required><br>    
    <input type="text" name="telefono" placeholder="Numero de telefono" pattern="[0-9]+" class="form-control" maxlength="8" required><br>
    <input type="text" name="direccion" placeholder="Direccion" class="form-control" required><br>
    <a href="login.php">Iniciar Sesion</a>
    <center><input type="submit" name="ok2" value="Registrar" class="btn btn-primary"></center>

  </form>
</section>
</body>
</html>


