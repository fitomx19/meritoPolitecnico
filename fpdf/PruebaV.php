<?php
// Incluye la clase FPDF
require('fpdf.php');

// Crea una nueva instancia de FPDF
$pdf = new FPDF();

// Agrega una página
$pdf->AddPage();

// Establece la fuente y tamaño
$pdf->SetFont('Arial', 'B', 16);

// Agrega un título al PDF
$pdf->Cell(40, 10, '¡Hola, este es tu primer PDF con FPDF!');

// Salida del PDF (puedes elegir guardar el PDF o mostrarlo en el navegador)
$pdf->Output();
?>
