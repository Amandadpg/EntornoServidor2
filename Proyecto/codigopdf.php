<?php
session_start();
require_once 'vendor/autoload.php';

//Declaraciones use al inicio
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Writer\PngWriter;

// Verificar los datos
$usuario = $_GET['usuario'] ?? $_SESSION['usuario'] ?? null;
$cine    = $_GET['cine'] ?? $_SESSION['cine'] ?? null;
$asiento = $_GET['asiento'] ?? $_SESSION['asiento'] ?? null;

if (!$usuario || !$cine || !$asiento) {
    die("Faltan datos para generar PDF.");
}

// Generar URL del QR igual que antes
$entrada_url = "http://localhost/proyecto/entrada.php?usuario="
    . urlencode($usuario) . "&asiento=" . urlencode($asiento) . "&cine=" . urlencode($cine);

// Generar QR por si acaso
$qr_file = 'qr_temp_pdf.png';
if (!file_exists($qr_file)) {
    $result = Builder::create()
        ->writer(new PngWriter())
        ->data($entrada_url)
        ->encoding(new Encoding('UTF-8'))
        ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
        ->size(200)
        ->margin(10)
        ->build();
    $result->saveToFile($qr_file);
}

// Generar PDF 
require_once('vendor/setasign/fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

// Título
$pdf->Cell(0,10,'Entrada de Cine',0,1,'C');

// Para mostrar QR
$pdf->Image($qr_file, 80, 30, 50, 50); 

// Datos de la entrada
$pdf->Ln(60); 
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,'Usuario: ' . $usuario,0,1);
$pdf->Cell(0,10,'Cine: ' . $cine,0,1);
$pdf->Cell(0,10,'Asiento: ' . $asiento,0,1);

// Salida al navegador
$pdf->Output('I','Entrada_Cine.pdf');
exit;

?>