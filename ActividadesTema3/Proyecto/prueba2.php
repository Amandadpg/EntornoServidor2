<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prueba 2 El ingrediente sospechoso</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<div class="contenedor2">
    <h1>El ingrediente sospechoso</h1>
    <p>
        Junto al cuerpo, notas una jarra de rebujito con un aroma peculiar.  
        Parece que uno de sus ingredientes podría delatar algo… 
    </p><br>

    <img src="imagenes/JarraRebujito.jpg" alt="Jarra de rebujitos">

    <form method="post">
        <label for="opciones">¿Sabrías identificar cuál <strong>no</strong> debería estar ahí?</label><br>
        <select id="ingrediente" name="ingrediente">
            <option value="manzanilla">Manzanilla</option>
            <option value="gaseosa">Gaseosa</option>
            <option value="azucar">Azucar</option>
            <option value="hielo">Hielo</option>
            <option value="hierbabuena">Hierbabuena</option>
        </select><br>
        <button type="submit">Enviar</button>
        <button type="submit" name="pista">Pedir pista</button>
        <button type="submit" name="prueba2" class="boton-jugar">Id a la siguiente prueba</button>
    </form>


    <p class="mensaje-error"><?= $mensajeError ?></p>
    <p class="mensaje-bueno"><?= $mensajeBueno ?></p>
    <!-- Has acertado!, el azucar no es un ingrediente del rebujito. Los policias mandaron a examinar el rebujito
     Tras estudio encuentran etilenglicol en el azucar, que es un veneno inoloro e insaboro, que mata en una hora.
      Salio un momento fuera por se sentia mal y se fue al pasillo entre las dos casetas que fue donde murio-->
    <p class="pista"><?= $pista ?></p>
</div>
</body>
</html>
