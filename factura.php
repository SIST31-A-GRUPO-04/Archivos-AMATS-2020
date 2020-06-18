<?php
require('fpdf/fpdf.php');

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

$pdf = new PDF();
$pdf->aliasNbpages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,10,utf8_decode('FACTURAR A:'),0,0,'c',0);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->cell(30,10,'Nombre:',0,0,'c',0);
$pdf->Ln(5);
$pdf->cell(30,10,'Apellido',0,0,'c',0);
$pdf->Ln(5);
$pdf->cell(30,10,utf8_decode('Teléfono:'),0,0,'c',0);
$pdf->Ln(5);
$pdf->cell(30,10,utf8_decode('Dirección:'),0,0,'c',0);
$pdf->Ln(5);
$pdf->cell(30,10,'Producto:',0,1,'c',0);



$pdf->SetFont('Arial','B',8);
$pdf->cell(60,8,'VENDEDOR',1,0,'c',0);
$pdf->cell(60,8,'FECHA',1,0,'c',0);
$pdf->cell(60,8,'FORMA DE PAGO',1,0,'c',0);
$pdf->Ln(10);


$pdf->SetFont('Arial','B',8);
$pdf->cell(60,8,'CANT.',1,0,'c',0);
$pdf->cell(60,8,utf8_decode('DESCRIPCIÓN'),1,0,'c',0);

$pdf->cell(60,8,'PRECIO UNIT.',1,0,'c',0);#$this->SetFillColor(200,220,255);

$pdf->cell(60,8,'PRECIO TOTAL.',1,0,'c',0);
$pdf->Ln(15);




$pdf->SetFont('Times','BI',10);
$pdf->cell(100,8,'Gracias por su Compra',0,0,'c',0);











$pdf->Output();
?>

