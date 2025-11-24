<?php




//Segunda prueba:Lo policias tras seguir buscando pistas encuentran una jarra de rebujitos con un ingrediente sospechoso, dime entre estos ingrdientes cual NO forma 
// parte de la bebida mas importante de la feria (mazanilla, gaseosa, hierbabuena, hielo, azucar). Pista: este ingrediente en de lo primero que se añade al hacer un mojito
//El azucar no es un ingrediente que forme parte de esta gran bebida. Tras estudio encuentran etilenglicol en el azucar, que es un veneno inoloro e insaboro, que mata en una hora.
//La victima no se dio cuenta de el azucar ya que estaba ya muy borracho. Salio un momento fuera por se sentia mal y se fue al pasillo entre las dos casetas que fue donde 
//murio
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prueba 2 El ingrediente sospechoso</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<div class="contenedor">
    <h1>El ingrediente sospechoso</h1>
    <p></p>
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
