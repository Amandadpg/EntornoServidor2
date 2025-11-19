<?php
session_start();
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Writer\PngWriter;

// Datos del GET
$nombre_usuario = $_GET['usuario'] ?? $_SESSION['usuario'] ?? null;
$email_usuario  = $_GET['email'] ?? $_SESSION['email'] ?? null;
$cine           = $_GET['cine'] ?? $_SESSION['cine'] ?? null;
$asiento        = $_GET['asiento'] ?? null;

if (!$nombre_usuario || !$email_usuario || !$cine || !$asiento) {
    die("Faltan datos para enviar correo. Asegúrate de tener nombre, correo, cine y asiento.");
}

// Generar QR en memoria
$entrada_url = "http://localhost/proyecto/entrada.php?usuario="
    . urlencode($nombre_usuario) . "&asiento=" . urlencode($asiento) . "&cine=" . urlencode($cine);

$result = Builder::create()
    ->writer(new PngWriter())
    ->data($entrada_url)
    ->encoding(new Encoding('UTF-8'))
    ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
    ->size(200)
    ->margin(10)
    ->build();

$qrData = $result->getString();

// Enviar correo
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'tucorreo@gmail.com';
    $mail->Password   = 'tucontraseña'; // App password si usas Gmail
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('tucorreo@gmail.com', 'Cine');
    $mail->addAddress($email_usuario, $nombre_usuario);

    // Adjuntar QR en memoria
    $mail->addStringAttachment($qrData, 'entrada_qr.png');

    // Contenido
    $mail->isHTML(true);
    $mail->Subject = 'Tu Entrada de Cine';
    $mail->Body    = "
        <h2>Entrada de Cine</h2>
        <p><strong>Usuario:</strong> $nombre_usuario</p>
        <p><strong>Cine:</strong> $cine</p>
        <p><strong>Asiento:</strong> $asiento</p>
        <p>Adjunto encontrarás tu código QR para ingresar al cine.</p>
    ";
    $mail->AltBody = "Usuario: $nombre_usuario\nCine: $cine\nAsiento: $asiento\nAdjunto encontrarás tu código QR.";

    $mail->send();
    echo "Correo enviado correctamente a $email_usuario";

} catch (Exception $e) {
    echo "Error al enviar correo: {$mail->ErrorInfo}";
}
