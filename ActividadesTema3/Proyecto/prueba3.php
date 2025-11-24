<?php





//Tercera prueba: la victima antes de ser asesinada jugo al bingo, este acuso a una persona de hacer trampas en medio de toda la gente, 
//Algunas personas dieron testimonio de como era su cara, lo describian como, rubio, con ojos marrones y piel blanquita,que adivinen cual es para que 
//los policias puedan detenerlo.
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