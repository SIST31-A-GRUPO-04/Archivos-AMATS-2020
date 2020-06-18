<?php

require_once("cn.php");


?>

<script type="text/javascript">
    

    $(function () {
        $('[data-toggle="popover"]').popover()
    })

</script>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/carrs.css">
    <title>Carrito</title>
</head>
<body>

<div class="container">
    <h2 align="center">Productos</h2>
    <div class="row mt-5">
    <?php
$sql="SELECT * FROM productos INNER JOIN Categoria ON Productos.`id_categoria` = Categoria.`id_categoria` INNER JOIN Proveedor ON Productos.`id_proveedor` = Proveedor.`id_proveedor` ORDER BY productos.id_producto asc ";
$rs= mysqli_query($conn,$sql);
if(mysqli_num_rows($rs) > 0){
    while ($row=mysqli_fetch_array($rs)){
?>
    <div class="col-md-4">
        <div class="card">
        <form method="post" action="index.php?op=detalledeorden.php&action=add&id=<?php echo $row['id_producto']; ?>">
                       
                <center><img src="<?php echo $row['imagen']?>" class="card-img-fluid" width="100" height="100" 
                 data-toggle="popover" data-trigger="hover" title="Descripcion" data-content="<?php echo $row['descripcion']?>"></center>

                <div class="card-body">
                <h5 class="card-title" align="center"><?php echo $row['nom_producto']?></h5>
                <p class="card-text-danger" align="center"><b>Precio: $<?php echo $row['precio']?></b></p>
                <p class="card-text" align="center"><b>Cantidad:</b> <input type="number" name="cantidad" class="form-control" min="1" value="1">
                
                <input type="hidden" name="hidden_nombre" value="<?php echo $row['nom_producto'];?>" />
                <input type="hidden" name="hidden_precio" value="<?php echo $row['precio'];?>" />
                <center><input type="submit" name="agregar" style="margin-top:5px;" class="btn btn-success" value="Agregar" /></center>
            </div>
        </form>
         </div><!-- cieere de card-->
    </div>
        <?php
    }
}
    ?>

</div>
</div>


    
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>