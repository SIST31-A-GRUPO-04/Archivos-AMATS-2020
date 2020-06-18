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
    <form method="post" action="pedido.php"> <!-- Para guardar en la base de datos-->

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
<tbody>
    <tr>
        <td class="cart_description">
            <h4><?php echo $values["item_nombre"]; ?></h4>
            <p>Producto ID: <?php echo $values["item_id"]; ?></p>
        </td>
        <td class="cart_price">
            <p>Q. <?php echo $values["item_precio"]; ?></p>
        </td>
        <td class="cart_quantity">
            <div class="cart_quantity_button">
                <input class="cart_quantity_input" value="<?php echo $values["item_cantidad"]; ?>" autocomplete="off" size="2" disabled>
            </div>
        </td>
        <td class="cart_total">
            <p class="cart_total_price">Q. <?php echo number_format($values["item_cantidad"] * $values["item_precio"], 2); ?></p>
        </td>
        <td class="cart_delete">
           <br>
            <a class="cart_quantity_delete" href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><i class="fa fa-times"></i></a>
        </td>
    </tr>
</tbody>
<?php
$total = $total + ($values["item_cantidad"] * $values["item_precio"]);
}
?>
</table>
<hr>
    <div class="col-sm-6">
        <div class="total_area">
            <ul>
                <li>Total <span>Q. <?php echo number_format($total, 2); ?></span></li>
            </ul>
            <a href="index.php?op=probandoorden.php" class="btn btn-default check_out">Comprar</a>
        </div>
    </div>
<?php
}
?>