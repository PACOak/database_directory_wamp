<?php
require('../fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Courier','BIU',20);
$pdf->Cell(80,10,'Hello World!',1,1);
$pdf->Cell(80,20,'Powered by FPDF.',0,1,'C');
$pdf->Output();
?>
