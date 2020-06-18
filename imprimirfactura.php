<?php
require('fpdf/fpdf.php');
require_once("cn.php");




class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $title = 'Factura';
    // Logo
    #$this->Image('logoagro.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    
    $this->Cell(60,10,'Reporte de Factura',0,0,'C');
    $this->Ln(5);
    $this->SetFont('Arial','B',9);
    $this->Cell(60);
    $this->Cell(60,10,'Santa Ana El Salvador',0,0,'C');
    $this->Ln(5);
    $this->SetFont('Arial','B',9);
    $this->Cell(60);
    $this->Cell(60,10,utf8_decode('Teléfono: +(503)5555-4433'),0,0,'C');
    $this->Ln(5);
    $this->SetFont('Arial','B',9);
    $this->Cell(60);
    $this->Cell(60,10,'gmail:agroservicioelmilagro@gmail.com',0,0,'C');
    // Salto de línea
    $this->Ln(10);






}
// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');





   
}
}


$sql="SELECT * FROM pedido INNER JOIN cliente on pedido.id_cliente = cliente.id_cliente INNER JOIN pedido_producto on pedido.num_pedido = pedido_producto.num_pedido INNER JOIN productos on pedido_producto.id_producto = productos.id_producto";


$total = " SELECT SUM(total) AS Total FROM pedido_producto";






$rs=$conn->query($sql);
$res = $conn->query($sql);
$mostrartotal = $conn->query($total);




while($fila=$rs->fetch_assoc()){


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();//cambiar ancho de pagina
$pdf->SetFont('Arial','',8);


$pdf->Cell(30,10,utf8_decode('FACTURAR A: '),0,0,'c',0);

$pdf->Ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->cell(30,10,'Nombre: '.$fila['nombre'].' ',0,0,'c',0);

$pdf->Ln(5);
$pdf->cell(30,10,'Apellido: '.$fila['apellido'].' ',0,0,'c',0);
$pdf->Ln(5);
$pdf->cell(30,10,utf8_decode('Teléfono:  '.$fila['telefono'].''),0,0,'c',0);
$pdf->Ln(5);
$pdf->cell(30,10,utf8_decode('Dirección: '.$fila['direccion'].' '),0,0,'c',0);
$pdf->Ln(5);
}




$pdf->cell(30,10,'Producto:',0,1,'c',0);

    
    $pdf->cell(10,5,' ID',1,0,'C',0);

    $pdf->cell(60,5,' Nombre de producto',1,0,'C',0);
    $pdf->cell(60,5,' Precio',1,0,'C',0);
    $pdf->cell(60,5,' Cantidad',1,1,'C',0);
  


while($filas=$res->fetch_assoc()){

$pdf->cell(10,5,$filas['num_pedido'],1,0,'C',0);
$pdf->cell(60,5,$filas['nom_producto'],1,0,'C',0);
$pdf->cell(60,5,$filas['precio'],1,0,'C',0);
$pdf->cell(60,5,$filas['cantidad_producto'],1,1,'C',0);

}
 $pdf->Ln(5);
 $pdf->Cell(77);
 $pdf->SetFont('Arial','B',15);
while($total=$mostrartotal->fetch_assoc()){

$pdf->cell(30,5,'Total: '.$total['Total'].'',0,1,'C',0);

}


$pdf->Ln(10);
$pdf->Cell(45);
$pdf->SetFont('Times','BI',10);
$pdf->cell(100,8,'Gracias por su Compra',0,0,'C',0);


$pdf->Output();




?>

