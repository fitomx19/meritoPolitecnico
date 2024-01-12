<?php
require('fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        // Cabecera del PDF (opcional)
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Premio al Merito Politecnico - Boleto', 0, 1, 'C');
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
    
        $this->Cell(0, 10, 'Nombre: ' . iconv('UTF-8', 'windows-1252', urldecode($userData['nombre'])), 0, 1);
        $this->MultiCell(0, 10, 'Dependencia: ' . iconv('UTF-8', 'windows-1252', urldecode($userData['dependencia'])), 0, 'L');
    
        $this->Cell(0, 10, 'Distincion: ' . iconv('UTF-8', 'windows-1252', urldecode($userData['distincion'])), 0, 1);
        $this->Cell(0, 10, 'Categoria: ' . iconv('UTF-8', 'windows-1252', urldecode($userData['categoria'])), 0, 1);
        $this->Cell(0, 10, 'CURP: ' . iconv('UTF-8', 'windows-1252', urldecode($userData['curp'])), 0, 1);
        $this->Cell(0, 10, 'Asistencia confirmada: ' . (urldecode($userData['asistire']) ? 'Si' : 'No'), 0, 1);
        $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', urldecode('¿Requiere apoyo? :')) . iconv('UTF-8', 'windows-1252', urldecode($userData['discapacidad'])), 0, 1);
    
        $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', urldecode('Código de acceso: ')) . iconv('UTF-8', 'windows-1252', urldecode($userData['codigo_acceso'])), 0, 1);
    
        // Imprimir información del acompañante si existe
        if ($userData['acompanante']) {
            $this->AddPage(); // Agregar una nueva página para el acompañante
            $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', urldecode('Información del Acompañante')), 0, 1, 'C');
            $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', urldecode('Acompañante de : ')) . iconv('UTF-8', 'windows-1252', urldecode($userData['nombre'])), 0, 1);
            //  $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', urldecode('Acompañante: ')) . (urldecode($userData['acompanante']) ? iconv('UTF-8', 'windows-1252', urldecode('Si')) : 'No'), 0, 1);
            $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', urldecode('Acompañante discapacitado: ')) . iconv('UTF-8', 'windows-1252', urldecode($userData['acompanante_discapacitado'])), 0, 1);

            $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', urldecode('Código de acceso: ')) . iconv('UTF-8', 'windows-1252', urldecode($userData['codigo_acceso'])), 0, 1);
        }
    }
    
    // Resto del código...
    
    
    
    

    function decodeUTF8($string)
    {
        // Decodificar caracteres especiales a ISO-8859-1
        return iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $string);
    }
}

// Ejemplo de uso
$pdf = new PDF();
$pdf->AddPage();

// Suponiendo que $userData es un array con la información del usuario
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
