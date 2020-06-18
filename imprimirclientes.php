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
    $this->Cell(94);
    // Título
    $this->Cell(90,10,'Clientes Registrados',1,1,'C');
    // Salto de línea
    $this->Ln(20);

    $this->cell(47,5,'Login Usuario',1,0,'C',0);
    $this->cell(47,5,'Nombre',1,0,'C',0);
    $this->cell(47,5,'Apellido',1,0,'C',0);
    $this->cell(47,5,'Correo electronico',1,0,'C',0);
    $this->cell(47,5,'Telefono',1,0,'C',0);
    $this->cell(47,5,'Direccion',1,1,'C',0);
   
    
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



$sql="select * from cliente where tipo= 'cliente'";
$rs=$conn->query($sql);
            

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage(array(170,250));//cambiar ancho de pagina
$pdf->SetFont('Arial','',8);

while($fila=$rs->fetch_assoc()){

$pdf->cell(47,5,$fila['loginusuario'],1,0,'C',0);
$pdf->cell(47,5,$fila['nombre'],1,0,'C',0);
$pdf->cell(47,5,$fila['apellido'],1,0,'C',0);
$pdf->cell(47,5,$fila['correo_electronico'],1,0,'C',0);
$pdf->cell(47,5,$fila['telefono'],1,0,'C',0);
$pdf->cell(47,5,$fila['direccion'],1,1,'C',0);

}
$pdf->Output();

?>