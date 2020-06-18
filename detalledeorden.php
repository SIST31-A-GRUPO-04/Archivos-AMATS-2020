<?php


require_once 'cn.php';
if(isset($_POST['agregar']))
{
    if(isset($_SESSION['add_carro']))
    {
        $item_array_id_cart = array_column($_SESSION['add_carro'],'item_id');
        if(!in_array($_GET['id'],$item_array_id_cart))
        {

            $count= count($_SESSION['add_carro']);
            $item_array = array(
                'item_id'        => $_GET['id'],
                'item_nombre'    => $_POST['hidden_nombre'],
                'item_precio'    => $_POST['hidden_precio'],
                'item_cantidad'  => $_POST['cantidad'],
            );

            $_SESSION['add_carro'][$count]=$item_array;
        }
        else
            {
              echo '<script>alert("El Producto ya existe!");</script>';
            }
    }
    else
        {
            $item_array = array(
                'item_id'        => $_GET['id'],
                'item_nombre'    => $_POST['hidden_nombre'],
                'item_precio'    => $_POST['hidden_precio'],
                'item_cantidad'  => $_POST['cantidad'],
            );

            $_SESSION['add_carro'][0] = $item_array;
        }
}
if(isset($_GET['action']))
{
    if($_GET['action']=='delete')
    {
        foreach ($_SESSION['add_carro'] AS $key => $value)
        {
            if($value['item_id'] == $_GET['id'])
            {
                unset($_SESSION['add_carro'][$key]);
                echo '<script>alert("El Producto Fue Eliminado!");</script>';
                echo '<script>window.location="index.php?op=detalledeorden.php";</script>';
            }

        }

    }

}
?>



<div class="container">
    <br />
    <form method="post" action="index.php?op=probandoorden.php"> <!-- Para guardar en la base de datos-->

    <h3 align="center">Detalle de la Orden</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th width="40%">Item Nombre</th>
                <th width="10%">Cantidad</th>
                <th width="20%">Precio</th>
                <th width="15%">Total</th>
                <th width="5%">Action</th>
            </tr>
            <?php
            if(!empty($_SESSION["add_carro"]))
            {
                $total = 0;
                foreach($_SESSION["add_carro"] as $keys => $values)
                {
                    ?>
                    <tr>
                        <td><input type="text" class="form-control" name="nombre" value="<?php echo $values["item_nombre"] ?>" disabled>
                        <td> <?php echo $values["item_cantidad"]; ?></td>
                        <td><input type="text" class="form-control" name="precio" value="<?php echo $values["item_precio"] ?>" disabled>                     
                        <td>$ <?php echo number_format($values["item_cantidad"] * $values["item_precio"], 2);?></td>
                        <td><a href="index.php?op=detalledeorden.php&action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                    </tr>
                    <?php
                    $total = $total + ($values["item_cantidad"] * $values["item_precio"]);
                }
                ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right">$ <?php echo number_format($total, 2); ?></td>
                    <td></td>
                </tr>
                <?php
            }else{
                ?>
                <tr>
                    <td colspan="4" style="color: red" align="center"><strong>No hay Producto Agregado!</strong></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <a href="index.php?op=Producto.php" class="btn btn-info">Seguir Comprando</a>
        <input type="submit" name="pedido" class="btn btn-success" value="COMPRAR AHORA">
    </form>
    </div>
</div>

