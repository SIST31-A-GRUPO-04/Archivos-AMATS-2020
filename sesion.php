<?php
@session_start();
if(!(isset($_SESSION["adminpelis"]))){
	header("Location: login.php");
}elseif(!($usaindex)){
	header("Location: cerrar.php");
}
?>


