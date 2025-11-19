<?php
    // Inicializar color predeterminado
    $color = "white";

    // Guardar cookie si se envía el formulario
    if(isset($_POST['color'])){
        $color = $_POST['color'];
        setcookie("colorCookie", $color, time() + 3600 * 24 * 31); 
    } 
    // Si hay cookie, usar su valor
    else if(isset($_COOKIE["colorCookie"])) {
        $color = $_COOKIE["colorCookie"];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Fondo con Cookies</title>
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

</body>
</html>
