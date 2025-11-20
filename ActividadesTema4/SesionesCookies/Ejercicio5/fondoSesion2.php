<?php
session_start();

// Usar color de sesión o blanco por defecto
$color = isset($_SESSION['color']) ? $_SESSION['color'] : "white";

// Restablecer color si se pulsa el botón
if(isset($_POST['reset'])){
    unset($_SESSION['color']);
    $color = "white";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Fondo con Sesión</title>
</head>
<body style="background-color: <?php echo $color; ?>;">
    <h2>Esta es la segunda página</h2>

    <form method="post" action="">
        <button name="reset" type="submit">Restablecer color a blanco</button>
    </form>
    <br>
    <a href="fondoSesion1.php">Volver a la página anterior</a>
</body>
</html>
