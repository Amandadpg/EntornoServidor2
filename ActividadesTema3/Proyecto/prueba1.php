<?php
session_start();

$pista = "";
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $respuesta = trim($_POST["respuesta"]);
    
    if ($respuesta == "1441") {
        $_SESSION["prueba1_superada"] = true;
        header("Location: prueba2.php");
        exit();
    } else {
        $mensaje = "❌ Esa no es la fecha correcta. Inténtalo de nuevo.";
        if (isset($_POST["pista"])) {
            $pista = "💡 Pista: La feria de Mairena nació hace muchos siglos, como un mercado de ganado.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prueba 1 - El Alumbrao Interrumpido</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<div class="contenedor">
    <h1>🕯️ El Alumbrao Interrumpido</h1>
    <p>Las luces del Real se apagaron justo antes del crimen. En el cuadro eléctrico, alguien escribió una cifra: <em>1441</em>… y la tachó.</p>
    <p>¿Recuerdas en qué año se celebró por primera vez la Feria de Mairena del Alcor?</p>

    <form method="post">
        <input type="text" name="respuesta" placeholder="Escribe el año" required>
        <button type="submit">Enviar</button>
        <button type="submit" name="pista">Pedir pista</button>
    </form>

    <p class="mensaje"><?= $mensaje ?></p>
    <p class="pista"><?= $pista ?></p>
</div>
</body>
</html>
