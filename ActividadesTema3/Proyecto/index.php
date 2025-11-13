<?php

if (isset($_POST['comenzar'])) {
    header("Location: prueba1.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misterio en la Feria de Mairena</title>
    <link rel="stylesheet" href="estilos.css">
</head>

//Primera prueba:se encuentran a la victima en un callejon entre caseta y caseta en la primera calle de nuestra feria, justo al lado de la victica aparece 
//un folleto en el cual explica la historia de evolucion de la feria, pero hay una fecha tachadas por el asesino(1441, 1960, 1982, 2025) y al lado hay una hora escrita por el,
// la fecha tachada es la que se celebro la feria por primera vez, el asesino la ha escrido desordenada
//¿Sabes cual es este numero?, Tiene que decir que fue en 11:44, Pista: Los dos primeros numeros son 11:__
//Esa es la hora se murio ya que el asesino sabia cuanto duraba el veneno en hacer efecto

//Segunda prueba:Lo policias tras seguir buscando pistas encuentran una jarra de rebujitos con un ingrediente sospechoso, dime entre estos ingrdientes cual NO forma 
// parte de la bebida mas importante de la feria (mazanilla, gaseosa, hierbabuena, hielo, azucar). Pista: este ingrediente en de lo primero que se añade al hacer un mojito
//El azucar no es un ingrediente que forme parte de esta gran bebida. Tras estudio encuentran etilenglicol en el azucar, que es un veneno inoloro e insaboro, que mata en una hora.
//La victima no se dio cuenta de el azucar ya que estaba ya muy borracho. Salio un momento fuera por se sentia mal y se fue al pasillo entre las dos casetas que fue donde 
//murio

//Tercera prueba: la victima antes de ser asesinada jugo al bingo, este acuso a una persona de hacer trampas en medio de toda la gente, 
//Algunas personas dieron testimonio de como era su cara, lo describian como, rubio, con ojos marrones y piel blanquita,que adivinen cual es para que 
//los policias puedan detenerlo.

<body>
    <div class="container">
        <header>
            <h1>Misterio en la Feria de Mairena 🎡</h1>
        </header>

        <section class="intro">
            <p>
                Es la segunda noche de la <strong>Feria de Abril de Mairena del Alcor</strong>.
                Las luces brillan, la música suena, y las calles estan llenas de vida...
                hasta que un grito rompe la alegría.
            </p>

            <p>
                Alguien ha sido encontrado <strong>sin vida en una caseta</strong>, y el
                misterio se extiende entre los farolillos. La policía no sabe que hacer.
            </p>

            <p>
                Te convertirás en un <em>investigador</em> dispuesto a descubrir la verdad.
                Para resolver el caso, tendrás que superar una serie de pruebas inspiradas en <strong>La Madre de Todas las Ferias</strong>.
            </p>

            <p class="destacado">
                Solo quien conozca bien su feria podrá descubrir <strong>quién lo hizo, cómo y por qué</strong>.
            </p>

            <p class="final">
                ¿Te atreves a descubrir la verdad antes de que sean los ultimos fuegos?
            </p>
        </section>

        <form method="POST" class="boton-form">
            <button type="submit" name="comenzar" class="boton-jugar">Comenzar la Investigación</button>
        </form>

        <footer>
            <p>Proyecto Escape Room — Amanda De La Prida Garcia</p>
        </footer>
    </div>
</body>
</html>
