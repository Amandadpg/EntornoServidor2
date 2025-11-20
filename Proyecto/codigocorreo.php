<?php
session_start();
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Writer\PngWriter;

// ======= 1. Obtener datos =======
$nombre_usuario = $_GET['usuario'] ?? $_SESSION['usuario'] ?? null;
$email_usuario  = $_SESSION['email'] ?? null;
$cine           = $_GET['cine']    ?? $_SESSION['cine']    ?? null;
$asiento        = $_GET['asiento'] ?? null;


if (!$nombre_usuario || !$email_usuario || !$cine || !$asiento) {
    exit("Faltan datos: usuario, email, cine o asiento.");
}

// Sanitizar
$nombre_usuario = htmlspecialchars($nombre_usuario, ENT_QUOTES);
$cine           = htmlspecialchars($cine, ENT_QUOTES);
$asiento        = htmlspecialchars($asiento, ENT_QUOTES);

// ======= 2. Generar URL para el QR =======
$entrada_url = "http://localhost/proyecto/entrada.php?" .
    http_build_query([
        'usuario' => $nombre_usuario,
        'asiento' => $asiento,
        'cine'    => $cine
    ]);

// ======= 3. Generar QR =======
try {
    $result = Builder::create()
        ->writer(new PngWriter())
        ->data($entrada_url)
        ->encoding(new Encoding('UTF-8'))
        ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
        ->size(200)
        ->margin(10)
        ->build();

    $qrData = $result->getString();
} catch (Exception $e) {
    exit("Error al generar QR: " . $e->getMessage());
}

// ======= 4. Enviar correo =======
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'tucorreo@gmail.com';
    $mail->Password   = 'TU_APP_PASSWORD'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('tucorreo@gmail.com', 'Cine');
    $mail->addAddress($email_usuario, $nombre_usuario);

    // Adjuntar QR
    $mail->addStringAttachment($qrData, 'entrada_qr.png', 'base64', 'image/png');

    // Contenido del email
    $mail->isHTML(true);
    $mail->Subject = '🎟 Tu Entrada de Cine';
    $mail->Body = "
        <h2>Entrada Confirmada</h2>
        <p><strong>Usuario:</strong> $nombre_usuario</p>
        <p><strong>Cine:</strong> $cine</p>
        <p><strong>Asiento:</strong> $asiento</p>
        <p>Adjunto tu código QR para ingresar al cine.</p>
    ";

    $mail->AltBody = "Usuario: $nombre_usuario\nCine: $cine\nAsiento: $asiento";

    $mail->send();
    echo "Correo enviado correctamente a $email_usuario";

} catch (Exception $e) {
    echo "Error al enviar correo: " . $mail->ErrorInfo;
}
