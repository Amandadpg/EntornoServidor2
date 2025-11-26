<?php
session_start();

require_once 'vendor/autoload.php';

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Writer\PngWriter;


if (!isset($_GET['asiento'])) {
    die("No se ha seleccionado asiento.");
}


$_SESSION['asiento'] = $_GET['asiento'];


$usuario = $_SESSION['usuario'] ?? null;
$cine    = $_SESSION['cine'] ?? null;
$asiento = $_SESSION['asiento'] ?? null;


if (!$usuario || !$cine || !$asiento) {
    die("Faltan datos para generar QR");
}

$entrada_url = "http://localhost/proyecto/entrada.php?usuario=" 
    . urlencode($usuario) 
    . "&asiento=" . urlencode($asiento) 
    . "&cine=" . urlencode($cine);

$result = Builder::create()
    ->writer(new PngWriter())
    ->data($entrada_url)
    ->encoding(new Encoding('UTF-8'))
    ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
    ->size(250)
    ->margin(10)
    ->build();

$qr_file = 'qr_temp.png';
$result->saveToFile($qr_file);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Entrada QR</title>
</head>
<body>

<h1>Entrada de Cine</h1>

<!-- Mostrar el QR -->
<img src="<?= $qr_file ?>" alt="Código QR">

<!-- Enlace para descargar PDF -->
<p>
    <a href="codigopdf.php?usuario=<?= urlencode($usuario) ?>&asiento=<?= urlencode($asiento) ?>&cine=<?= urlencode($cine) ?>" target="_blank">
        Descargar PDF
    </a>
</p>

<!-- Enviar por correo -->
<p>
    <a href="codigocorreo.php?usuario=<?= urlencode($usuario) ?>&asiento=<?= urlencode($asiento) ?>&cine=<?= urlencode($cine) ?>">
        Enviar entrada por correo electrónico
    </a>
</p>

</body>
</html>
