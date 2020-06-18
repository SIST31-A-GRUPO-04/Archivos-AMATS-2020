<?php 

echo $_SESSION["adminpelis"];

?>



<!DOCTYPE html>
<html lang="es">
<head>
  <title>Agroservicio El Milagro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>

  <div id="fb-root"></div> <!-- para facebook-->
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v7.0"></script>


  <nav class="navbar sticky-top" style="text-align: center; background-color: #6B8E23">
  <h3 style="color: white" align="center">Agroservicio El Milagro</h3>
  
  <a href="cerrar.php" class="btn btn-warning">Cerrar Sesión</a>
</nav>

  	   



<div class=" jumbotron colorfondo1">
  <div class="container">
  <h1 class="display-4">Agroservicio El Milagro</h1>
  <p class="lead">Nuestra misión es proveer productos agrícolas con altos estándares de calidad y el mejor servicio para satisfacer a nuestros clientes.</p>
  <hr class="my-4">
  <p>Bienvenido a nuestro sitio web de Agroservicio.</p>
  <br>
  <br>
  <br>     

</div>
</div>


        
            <div class="container">
                <h2 class="text-center">Servicios</h2>
                
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">                        
                          <img src="imgagro\pedidos.png">                            
                            <h3 class="h4 mb-2">Pedidos</h3>
                            <p class="text-muted mb-0">Hecha un vistazo a nuestros productos y arma tu lista de compras.</p>
                        
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        
                          <img src="imgagro\seguro.png">
                            
                            <h3 class="h4 mb-2">Seguro</h3>
                            <p class="text-muted mb-0">Navega sin miedo tu información personal está segura con nosotros
                                .</p>
                        
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        
                          <img src="imgagro\producto.png">
                            
                            <h3 class="h4 mb-2">Productos</h3>
                            <p class="text-muted mb-0">Explora la variedad de productos que ofrece la Tienda.</p>
                            <a href=".." class="btn btn-primary">Ver Productos</a>
                        
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                            <img src="imgagro\envio.png">
                                                   
                            <h3 class="h4 mb-2">Envios</h3>
                            <p class="text-muted mb-0">Los envios puede tardar según su ubicacion</p>
                        
                    </div>
                </div>
            </div>




    



      <div style="background-color:#D5D9D8">
        <div class="container mt-5"><br><br>

          <div class="row">
            <div class="col">
              <br><br><br><br>
              <center><h1 class="display-4">Envia un comentario</h1>
                <p class="lead">Envianos un comentario para conocer que te parece nuestra pagina web.</p>    

              </div>
              <div class="col">
                <div style="background-color:#D5D9D8">
                  <div class="container">          
                    <form >

                     <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input name="nombre" required type="text"
                      class="form-control" placeholder="Tu nombre">
                    </div>
                    <div class="form-group">
                      <label for="correo">Correo electrónico</label>
                      <input name="correo" required type="email"
                      class="form-control" placeholder="Tu correo electrónico">
                    </div>
                    <div class="form-group">
                      <label for="mensaje">Mensaje</label>
                      <textarea required placeholder="Escribe tu mensaje"
                      class="form-control" name="mensaje" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                      <center><button class="btn-success btn" type="submit">
                        Enviar
                      </button></center>


                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </section>

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



      <style type="text/css">



        .colorfondo1 {
          background-image: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)), url("imgagro/agro.jpg");   
          background-size: cover;         
          
          color: white;

        }


        .colorfondo {
          background: url('productos.jpg') no-repeat center center fixed;
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
          color: #000;

        }

      </style>
