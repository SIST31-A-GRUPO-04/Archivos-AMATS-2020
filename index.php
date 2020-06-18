<?php 
@session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv = "Content Type" content="text/html; charset=utf-8" />
	<title>Agroservicio El Milagro</title>
	<link rel="stylesheet" type="text/css" href="menu.css">
</head>
<body>




	<?php 
	if(isset($_SESSION["tipo"])){
	if($_SESSION["tipo"]=="cliente"){
		require_once("menucliente.php");
	}else{
		require_once("menu.php");
	}
}else{
	require_once("agroservicio.php");
}






	echo "<br>";
	if(isset($_GET["op"])){
		require_once($_GET["op"]);
	}	
	?>

</body>

</html>