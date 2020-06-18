<?php 

require_once("cnpoo");


$consulta = new clsConexion();


$id_categoria= $_POST["categoria"]
$tabla= "categoria";
$campos=array('id_categoria','nom_categoria');
$condicion=array("id_categoria"=>"$id_categoria");

$resultado=$obj->consulta($tabla,$campos,$condicion);

$instituciones="";
while($fila=$respuestains->fetch_assoc()){
	$instituciones.="<option value='".$fila["idbachillerato"]."'>".$fila["bachillerato"]."</option>";

	$instituciones.=" <table class="table table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>ID</th>
					<th>Nombre de Categoria</th>
					<th>Acciones</th>
				</tr>   
				<tr>				
						<td width='1%'>.$fila["id_categoria"]
							<td>.$fila["nom_categoria"] 
  ";







?>