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

        <p class="mensaje-error"><?= $mensajeError ?></p>
        <p class="mensaje-bueno"><?= $mensajeBueno ?></p>
        <!-- Va a ver un mensaje de error y un mensaje normal en todos -->

        <!-- Muy bien hecho, los policias llegaron a la conclusion que esos numeros eran la hora de la muerte de la victima (11:44) -->
        <p class="pista"><?= $pista ?></p>
    </div>
</body>
</html>
