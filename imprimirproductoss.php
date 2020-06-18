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
    $this->Cell(110);
    // Título
    $this->Cell(90,10,'Productos disponibles',1,1,'C');
    // Salto de línea
    $this->Ln(20);

    $this->cell(10,5,' ID',1,0,'C',0);    
    $this->cell(50,5,' Nombre de producto',1,0,'C',0);
    $this->cell(50,5,' Imagen',1,0,'C',0);
    $this->cell(50,5,' Descripcion',1,0,'C',0);
    $this->cell(30,5,' Precio',1,0,'C',0);    
    $this->cell(40,5,' Sistema de medida',1,0,'C',0);
    $this->cell(40,5,'Fecha de ingreso',1,1,'C',0);
    
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



$sql="SELECT * FROM productos INNER JOIN Categoria ON Productos.`id_categoria` = Categoria.`id_categoria` INNER JOIN Proveedor ON Productos.`id_proveedor` = Proveedor.`id_proveedor` ORDER BY productos.id_producto asc ";
$rs=$conn->query($sql);
            

$pdf=new PDF();

$pdf->AliasNbPages();
$pdf->AddPage(array(170,250));//cambiar ancho de pagina
$pdf->SetFont('Arial','',8);

while($fila=$rs->fetch_assoc()){

$pdf->cell(10,5,$fila['id_producto'],1,0,'C',0);
$pdf->cell(50,5,$fila['nom_producto'],1,0,'C',0);






}
$pdf->Output();

?>