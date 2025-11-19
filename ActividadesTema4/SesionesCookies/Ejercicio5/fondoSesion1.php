<?php
session_start();

// Color por defecto
$color = "white";

// Si se envía el formulario, actualizar color en sesión
if(isset($_POST['color'])){
    $color = $_POST['color'];
    $_SESSION['color'] = $color;
}
// Si ya hay color en sesión, usarlo
else if(isset($_SESSION['color'])){
    $color = $_SESSION['color'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Fondo con Sesión - Página 1</title>
</head>
<body style="background-color: <?php echo $color; ?>;">
    <h2>Selecciona un color de fondo:</h2>
    <form method="post" action="">
        <select name="color">
            <option value="white" <?php if($color=="white") echo "selected"; ?>>Blanco</option>
            <option value="lightblue" <?php if($color=="lightblue") echo "selected"; ?>>Azul claro</option>
            <option value="lightgreen" <?php if($color=="lightgreen") echo "selected"; ?>>Verde claro</option>
            <option value="yellow" <?php if($color=="yellow") echo "selected"; ?>>Amarillo</option>
            <option value="pink" <?php if($color=="pink") echo "selected"; ?>>Rosa</option>
        </select>
        <button type="submit">Cambiar color</button>
    </form>

    <br>
    <a href="fondoSesion2.php">Ir a la página 2</a>
</body>
</html>
