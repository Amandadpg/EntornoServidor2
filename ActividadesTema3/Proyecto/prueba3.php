<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prueba 3 - El sospechoso del bingo</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<div class="contenedor">
    <h1>El sospechoso del bingo</h1>
    <p>
        La víctima tuvo un altercado el día anterior en el bingo con alguien muy sospechoso…  
        Trágicamente, hoy ha sido asesinado y los policías necesitan tu ayuda para identificar al culpable.  
        Algunas personas que estuvieron presentes dieron testimonio sobre su apariencia: cabello rubio, ojos marrones y piel blanquita.  
        Observa bien las fotos de los sospechosos y selecciona el número de la persona que crees que coincide con la descripción de los testigos.
    </p>

    <form method="post">
        <input type="text" name="respuesta" placeholder="Escribe el año" required>
        <button type="submit">Enviar</button>
        <button type="submit" name="pista">Pedir pista</button>
        <button type="submit" name="prueba3" class="boton-jugar">Id a la siguiente prueba</button>
    </form>

    <p class="mensaje-error"><?= $mensajeError ?></p>
    <p class="mensaje-bueno"><?= $mensajeBueno ?></p>
    <!-- Que bien, gracias a ti la policia logro atrapar al culpable del asesinato. Este se llamaba Rubén Rubio -->
    <p class="pista"><?= $pista ?></p>
</div>
</body>
</html>