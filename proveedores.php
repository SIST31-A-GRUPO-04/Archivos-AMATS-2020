<style>
  .*{
  margin: 0;
  padding: 0;
}
header{
  font-family: Helvetica;
  width: 1400px;
  margin: auto;
  float:center;
}
ul{
  list-style: none;
}
.nav li>a{
  background-color: cyan;
  color: cyan;
  padding: 10px;
  display: block;
  text-decoration: none;
  min-width: 100px;
}
.nav  li>a:hover{
  color: #ffff;
  background-color: #cyan;
}
.nav >li{
  float: left;
  text-align:center
}
.nav >li>ul{
  display: none;
}
.nav >li:hover>ul {
  display:block;
}
</style>

<!DOCTYPE html>
<html>
<head>
	<title>SERVI AGROSERVICIO</title>





  </div>
	</header>


<body style="background-size: 100vw 100vh; background-attachment: fixed; font-family: sans-serif; color: white;">
<form method=POST style="background-color: #F7155D; width: 550px; margin: auto; padding: 10px 18px; box-sizing: border-box; margin-top: 40px; border-radius: 7px; color: white">
<table border="0" align=center>
<tr style="background-color: black">
<th colspan="2">Registro de Proveedor</th>
</tr>
<tr>
<td>Nombre legal de su compañía</td>
<td><input type=text name=n style="border: none;"required="text"></td>
</tr>
<tr>
<td>Dirección de la compañía</td>
<td><input type=text name=d style="border: none;"></td>
</tr>
<td>Email</td>
<td><input type=text name=e style="border: none;"></td>
</tr>
<tr>
<td>Telefono</td>
<td><input type=number name=t style="border: none;"  required="number"></td>
</tr>
<tr>
<td>Qué clase de productos ofrece su empresa</td>
<td><input type=text name=p style="border: none;"required="text"></td>
</tr>
<tr>
<td colspan="2" style="text-align:center; padding: 1px;"><input type=submit name=enviar value="Enviar datos" style="padding: 4px;background-color: #808080; border: #808080 1px solid; color: white; border-radius: 8px;"></td>
</tr>
</table><br>

</form>
</body>

<?php

require_once('conex.php');
if(isset($_POST["enviar"])){
  $n=$_POST["n"];
	$d=$_POST["d"];
	$e=$_POST["e"];
  $p=$_POST["p"];
  $t=$_POST["t"];

  $sql="INSERT INTO proveedores(nombre,direccion,email,telefono,producto) VALUES('$n', '$d', '$e', $t, '$p')";
  $resultagre=$cn->query($sql);

}
?>
<form method=POST style="background-color: #de6808; width: 550px; margin: auto; padding: 10px 18px; box-sizing: border-box; margin-top: 40px; border-radius: 7px; color: white">

<?php

$resultver=$cn->query("SELECT * FROM proveedores");
echo "
<center>
<table>
<tr>
<td>Nombre</td>
<td>Dirreccion</td>
<td>Email</td>
<td>Telefono</td>
<td>Producto</td>
<td></td>
</tr>
";
while($prove=$resultver->fetch_assoc()){
echo("

      <tr>
        <td>
          ".$prove["nombre"]."
        </td>
        <td>
          ".$prove["direccion"]."
        </td>
        <td>
          ".$prove["email"]."
        </td>
        <td>
          ".$prove["telefono"]."
        </td>
        <td>
          ".$prove["producto"]."
        </td>
        <td>
          <a href='editarprovee.php?id=".$prove["id_proveedor"]."'>Editar</a>
          <a>Borrar</a>
        </td>
      </tr>


");
}
echo("
</table>
</center>

        ");

?>
</form>
