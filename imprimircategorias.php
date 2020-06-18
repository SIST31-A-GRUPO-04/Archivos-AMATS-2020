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
    $this->Cell(60);
    // Título
    $this->Cell(90,10,'Categorias disponibles',1,1,'C');
    // Salto de línea
    $this->Ln(20);

    $this->cell(47,5,' ID',1,0,'C',0);
    $this->cell(143,5,'Nombre de Categoria',1,1,'C',0);
    
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



$sql="select * from Categoria";
$rs=$conn->query($sql);
            

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

while($fila=$rs->fetch_assoc()){

$pdf->cell(47,10,$fila['id_categoria'],1,0,'C',0);
$pdf->cell(143,10,$fila['nom_categoria'],1,1,'C',0);

}
$pdf->Output();

?>