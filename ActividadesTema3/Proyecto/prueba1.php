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
        $mensaje = "Esa no es la fecha correcta. Inténtalo de nuevo.";
        if (isset($_POST["pista"])) {
            $pista = "💡 Pista: La feria de Mairena nació hace muchos siglos, como un mercado de ganado.";
        }
    }
}
//Primera prueba:se encuentran a la victima en un callejon entre caseta y caseta en la primera calle de nuestra feria, justo al lado de la victica aparece 
//un folleto en el cual explica la historia de evolucion de la feria, pero hay una fecha rodeada por el asesino(1441, 1960, 1982, 2025),
// la fecha rodeada es la que se celebro la feria por primera vez
//¿Sabes cual es este numero?, Tiene que decir que fue en 11:44, Pista: Los dos primeros numeros son 11:__
//Esa es la hora se murio ya que el asesino sabia cuanto duraba el veneno en hacer efecto
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prueba 1 - La Hora del Asesinato</title>
    <link rel="stylesheet" href="estilos/style.css">
</head>
<body>
    <?php
    if (!empty($mensaje)) {
        $mensaje = '<p class="mensaje" style="color:red;">' . $mensaje . '</p>';
    }

    if (!empty($pista)) {
        $pista =  '<p class="pista">' . $pista . '</p>';
    }
    ?>
    <div class="contenedor1">
        <h1>La Hora del Asesinato</h1>
        <p>
            Te encuentras en un callejón entre dos casetas de la primera calle de la feria.  
            Junto a la víctima, hay un folleto que explica la historia y evolución de la Feria de Mairena del Alcor.  
            Al observarlo detenidamente, notas varias fechas: <strong>1441, 1960, 1982, 2025</strong>,  
            pero una de ellas está claramente rodeada.
        </p>

        <img src="imagenes/FolletoFeria.png" alt="Feria de Mairena">

        <p>
            ¿Qué tendrá de especial esa fecha?  
            ¿Podría indicar la hora de la muerte de la víctima?  
            ¿O quizás el momento en que el asesino sabía que el cuerpo sería encontrado?
        </p>

        <p>
            Debes introducir la fecha que está rodeada para descubrir la hora exacta en que ocurrió el crimen.
        </p>

        <form method="post" class="botones">
            <input type="text" name="respuesta" placeholder="Escribe el año"><br>
            <button type="submit" class="boton">Enviar</button>
            <button type="submit" name="pista" class="boton">Pedir pista</button><br>
            <button type="submit" name="prueba1" class="boton-jugar">Id a la siguiente prueba</button>
        </form>

        <p class="mensaje"><?= $mensaje ?></p>
        <p class="pista"><?= $pista ?></p>
    </div>
</body>
</html>
