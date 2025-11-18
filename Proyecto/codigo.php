<?php
session_start();

require_once 'vendor/autoload.php'; 
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Writer\PngWriter;

if (isset($_SESSION['usuario']) && isset($_SESSION['cine']) &&
    isset($_SESSION['asiento'])) {
    $usuario = $_SESSION['usuario'];
    $cine = $_SESSION['cine'];
    $asiento = $_SESSION['asiento'];
       
}

if(!$usuario || !$cine || !$asiento){
    $_SESSION['mensaje']="Faltan datos para generar QR ";
    header("Location: inicio.php");
    exit();
}

// Generar URL para QR
$entrada_url="http://localhost/proyecto/entrada.php?usuario=".urlencode($usuario)."&asiento=".urlencode($asiento)."&cine=".urlencode($cine);

// Generar QR
$result=Builder::create()
    ->writer(new PngWriter())
    ->data($entrada_url)
    ->encoding(new Encoding('UTF-8'))
    ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
    ->size(200)
    ->margin(10)
    ->build();

$qr_file='qr_temp.png';
$result->saveToFile($qr_file);
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Entrada QR</title></head>
<body>
<h1>Entrada de Cine</h1>
<img src="<?php echo $qr_file;?>" alt="Código QR">

<p><a href="codigopdf.php?usuario=<?php echo urlencode($usuario);?>&asiento=<?php echo urlencode($asiento);?>&cine=<?php echo urlencode($cine);?>" target="_blank">Descargar PDF</a></p>
<p><a href="codigocorreo.php?usuario=<?php echo urlencode($usuario);?>&asiento=<?php echo urlencode($asiento);?>&cine=<?php echo urlencode($cine);?>">Enviar entrada por correo electrónico</a></p>
</body>
</html>