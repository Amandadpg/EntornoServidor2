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
    <link rel="stylesheet" href="estilos/style.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Misterio en la Feria de Mairena</h1>
        </header>

        <section class="intro">
            <p>
                Es la segunda noche de la <strong>Feria de Abril de Mairena del Alcor</strong>.
                Las luces brillan, la música suena, y las calles estan llenas de vida...
                hasta que un grito rompe la alegría.
            </p>

            <p>
                Alguien ha sido encontrado <strong>sin vida</strong> en un callejon entre dos casetas, y el
                misterio se extiende entre los farolillos. La policía no sabe que hacer.
            </p>

            <p>
                <strong>Tú</strong> te convertirás en un <em>investigador</em> dispuesto a descubrir la verdad.
                Para resolver el caso, tendrás que buscar diferentes pruebas del asesino e id resolviendolas para 
                averiguar que ocurrió en  <strong>La Madre de Todas las Ferias</strong>.
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
