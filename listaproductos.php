<!DOCTYPE html>
<html>
<head>
	<title>AdminProductos</title>
</head>
<script type="text/javascript">
	

	$(function () {
		$('[data-toggle="popover"]').popover()
	})

</script>

<script>
function convertir(){
	var texto=document.getElementById("producto").value;
	 
	if(window.XMLHttpRequest){
		 objetoAjax=new XMLHttpRequest();
	}
	objetoAjax.onreadystatechange=function(){
		 if(objetoAjax.readyState==4 && objetoAjax.status==200){
			 document.getElementById("mostrarProducto").innerHTML=objetoAjax.responseText;
		 }
	}

	objetoAjax.open("GET","ajex.php?producto="+texto);
	objetoAjax.send();

	}



</script>
<body>	


	<?php

	require_once("cn.php");

	
	?>  <!--Cierre de php -->





	
	<div class="container">


		<h2 align="center">Productos</h2>
	
		<form method="post">
			<input type="text" name="search_text" class="form-control" placeholder="Buscar:" id="producto" onkeyup="convertir()">
		</form>

		<div id=mostrarProducto align="center"></div>
	



		<div class="row mt-5">

			<?php
			$sql="select * from Productos";
			$rs=$conn->query($sql);


			while($fila=$rs->fetch_assoc())
			{
				?> 
		

					<div class="col-md-4">
						<div class="card">
							<center><img src="<?php echo $fila['imagen']?>" class="card-img-fluid" width="100" height="100" 
								data-toggle="popover" data-trigger="hover" title="Descripcion" data-content="<?php echo $fila['descripcion']?>"></center>
							<div class="card-body">
								<h5 class="card-title" align="center"><?php echo $fila['nom_producto']?></h5>
								<p class="card-text" align="center"><b>Precio: $<?php echo $fila['precio']?></b></p>
								
								
							</div>
						</div>
					</div>
					








					<?php 
				}
				?>

			</div> <!--Cierre de row-->

	<!--	<h3 style="color: white; text-align: center">Consulta de Productos</h3>
			<div class="card" style="width: 18rem;">
				<img src="data:image/jpg;base64,<?php //echo base64_encode($fila["imagen"]); ?>">
				<div class="card-body">
					<h5 class="card-title"><?php //echo $fila['nombre'] ?></h5>				
					
				</div>
			</div>  -->
		</div>  <!--Cierre de container 2 -->
	</div>
</body>
</html>