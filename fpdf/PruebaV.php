<?php
require('fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
 
        $this->SetFont('Arial', 'B', 12);
        $this->SetFillColor(128, 0, 0); // Guinda
        $this->SetTextColor(255);
        $this->Cell(0, 10, 'Premio al Merito Politecnico - Boleto', 0, 1, 'C', true);
        $this->Ln(10);
    }

    function Footer()
    {
        // Pie de página (opcional)
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }

    function UserData($userData)
    {
        // Contenido del PDF
        $this->SetFont('Arial', '', 12);

        // Desplazar hacia abajo para la información
        $this->SetY(30);

        // Centrar a la izquierda la imagen
        $imagePath = '../images/ipn.jpg';
        $imageWidth = 30;
        $this->Image($imagePath, 10, $this->GetY(), $imageWidth);

        // Desplazar hacia la derecha para empezar la información
        $this->SetX(70);
        $this->SetY(80);

        $this->Cell(0, 10, 'Nombre: ' . utf8_decode(urldecode($userData['nombre'])), 0, 1);
        $this->MultiCell(0, 10, 'Dependencia: ' . utf8_decode(urldecode($userData['dependencia'])), 0, 'L');

        $this->Cell(0, 10, 'Distincion: ' . utf8_decode(urldecode($userData['distincion'])), 0, 1);
        $this->Cell(0, 10, 'Categoria: ' . utf8_decode(urldecode($userData['categoria'])), 0, 1);
        $this->Cell(0, 10, 'CURP: ' . utf8_decode(urldecode($userData['curp'])), 0, 1);
        $this->Cell(0, 10, 'Asistencia confirmada: ' . (urldecode($userData['asistire']) ? 'Si' : 'No'), 0, 1);
        $this->Cell(0, 10, utf8_decode('¿Requiere apoyo? :') . utf8_decode(urldecode($userData['discapacidad'])), 0, 1);

        $this->Cell(0, 10, utf8_decode('Código de acceso: ') . utf8_decode(urldecode($userData['codigo_acceso'])), 0, 1);

        // Imprimir información del acompañante si existe
        if ($userData['acompanante']) {
            $this->AddPage(); // Agregar una nueva página para el acompañante
            $this->Cell(0, 10, utf8_decode('Información del Acompañante'), 0, 1, 'C');
            $this->Cell(0, 10, utf8_decode('Acompañante de : ') . utf8_decode(urldecode($userData['nombre'])), 0, 1);
            $this->Cell(0, 10, utf8_decode('Acompañante discapacitado: ') . utf8_decode(urldecode($userData['acompanante_discapacitado'])), 0, 1);
            $this->Cell(0, 10, utf8_decode('Código de acceso: ') . utf8_decode(urldecode($userData['codigo_acceso'])), 0, 1);
        }
    }

    function decodeUTF8($string)
    {
        // Decodificar caracteres especiales a ISO-8859-1
        return iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $string);
    }
}

 
$pdf = new PDF();
$pdf->AddPage();

 
$userData = array(
    'nombre' => $_GET['nombre'],
    'dependencia' => $_GET['dependencia'],
    'distincion' => $_GET['distincion'],
    'categoria' => $_GET['categoria'],
    'curp' => $_GET['curp'],
    'asistire' => $_GET['asistire'],
    'discapacidad' => $_GET['discapacidad'],
    'acompanante' => $_GET['acompanante'],
    'acompanante_discapacitado' => $_GET['acompanante_discapacitado'],
    'codigo_acceso' => $_GET['codigo_acceso'],
);

$pdf->UserData($userData);

// Salida del PDF (puedes elegir guardar el PDF o mostrarlo en el navegador)
$pdf->Output();
?>
