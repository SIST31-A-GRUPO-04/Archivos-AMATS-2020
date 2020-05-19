<?php 
@session_start();
//require_once("sesion.php");
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
	require_once("menu.php");
	echo "<br>";
	if(isset($_GET["op"])){
		require_once($_GET["op"]);
	}	
	?>

</body>
</html>