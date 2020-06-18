<?php
require_once 'cn.php';

session_start();
require('fpdf/fpdf.php');

 
class PDF extends FPDF
{

function Header()
{

     // Logo
    $this->Image('logo\logoagro.png',10,8,50);
    // Arial bold 15
    $this->SetFont('Arial','B',8);
    // Movernos a la derecha
    $this->Cell(95);
    // Título
    $this->Cell(90,10,'Ventas Realizadas',1,1,'C');
    // Salto de línea
    $this->Ln(20);

    $this->cell(30,5,' Num Factura',1,0,'C',0);
    $this->cell(30,5,' Nombre de cliente',1,0,'C',0);
    $this->cell(35,5,' Nombre de producto',1,0,'C',0);     
    $this->cell(50,5,' Descripcion',1,0,'C',0);
    $this->cell(22,5,' Precio',1,0,'C',0);
    $this->cell(30,5,' Cantidad',1,0,'C',0);
    $this->cell(36,5,' Total',1,0,'C',0);
    $this->cell(36,5,'Fecha de compra',1,1,'C',0);
    
}


// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');

}
}



$sql="SELECT * FROM pedido INNER JOIN cliente on pedido.id_cliente = cliente.id_cliente INNER JOIN pedido_producto on pedido.num_pedido = pedido_producto.num_pedido INNER JOIN productos on pedido_producto.id_producto = productos.id_producto  ORDER BY productos.id_producto asc ";
$rs=$conn->query($sql);
            

$pdf=new PDF();

$pdf->AliasNbPages();
$pdf->AddPage(array(170,250));//cambiar ancho de pagina
$pdf->SetFont('Arial','',8);

while($fila=$rs->fetch_assoc()){


$pdf->cell(30,5,$fila['num_pedido'],1,0,'C',0);
$pdf->cell(30,5,$fila['nombre'],1,0,'C',0);
$pdf->cell(35,5,$fila['nom_producto'],1,0,'C',0);
$pdf->cell(50,5,$fila['descripcion'],1,0,'C',0);
$pdf->cell(22,5,$fila['precio'],1,0,'C',0);
$pdf->cell(30,5,$fila['cantidad_producto'],1,0,'C',0);
$pdf->cell(36,5,$fila['total'],1,0,'C',0);
$pdf->cell(36,5,$fila['fecha_pedido'],1,1,'C',0);


}
$pdf->Output();

?>