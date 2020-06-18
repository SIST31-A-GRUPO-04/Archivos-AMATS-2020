<!DOCTYPE html>
<html>
<head>
	<title>AdminProductos</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
</head>
<nav class="navbar sticky-top" style="text-align: center; background-color: #6B8E23">
  <h3 style="color: white" align="center">Agroservicio El Milagro</h3>
  <a href="login.php" class="btn btn-warning">Iniciar Sesión</a>
</nav>
<script type="text/javascript">
	

	$(function () {
		$('[data-toggle="popover"]').popover()
	})

</script>
<body>	


	<?php

	require_once("cn.php");

	
	?>  <!--Cierre de php -->

	<form method="post" action="login2.php">
	<div class="container">

		<h2 align="center">Productos</h2>
		<div class="row">

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
							
							
							<!-- Button trigger modal -->
							<center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Comprar</button></center>

							<!-- Modal -->
							<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLongTitle">AVISO</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											Para Realizar Pedidos es necesario Iniciar Sesión
										</div>
										<div class="modal-footer">
											<input type="submit" name="iniciar" class="btn btn-secondary" value="Iniciar Sesion">
											<!--<a href="login.php" class="btn btn-secondary">Iniciar Sesión</a>-->
											
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>




				<?php 
			}
			?>

		</div> <!--Cierre de row-->

	
		</div>  <!--Cierre de container  -->
	</div>

	<div style="background-color:#444D59">

        <div class="container">

          <div class="row">
            <div class="col"><br><br><br>
              <center><h3 style="color: white">AGROSERVICIO EL MILAGRO</h3></center>
            </div>
            <div class="col">
              <center><h4 style="color: white">Siguenos en Facebook</h4>
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs&width=340&height=130&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=false&appId" width="340" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe></center>
              </div>

            </div>
          </div>



        </div>
</body>
</html>