<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Sistema de clasificacion de peliculas</title>
    </head>
    <body>
        <h1>Formulario: Lista de peliculas</h1>
        <p>Introduce al menos <b>4 peliculas</b> con titulo, año y duracion (min).</p>
        <?php
        if(isset($_POST["titulo"]) && isset($_POST["anio"]) && isset($_POST["duracion"])) {
            $titulo = $_POST["titulo"];
            $anio = $_POST["anio"];
            $duracion = $_POST["duracion"];
            $peliculas = [];
            $categoria = "";

            for($i = 0; $i < 4; $i++) {
                $peliculas[] = ["titulo" => $titulo[$i],
                                "anio" => $anio[$i],
                                "duracion" => $duracion[$i]];
                
            }



            function determinarCategoria($anio, $duracion) {
                $categoria = "";
                if($anio >= 2023 && $duracion > 120 ){
                    $categoria = "Estreno Imperdible";
                }else if($anio <= 2000){
                    $categoria = "Clasico Reconocido";
                }else {
                    $categoria = "Contenido General";
                }

            return $categoria;
            }

            if (4 > 0) {
                echo "<table border ='1' >";
                echo "<tr><th>Título</th><th>Año</th><th>Duración (min)</th><th>Categoría</th></tr>";

                foreach ($peliculas as $peli) {
                    $categoria = determinarCategoria($peli["anio"], $peli["duracion"]);
                    echo "<tr>";
                    echo "<td>{$peli['titulo']}</td>";
                    echo "<td>{$peli['anio']}</td>";
                    echo "<td>{$peli['duracion']}</td>";
                    echo "<td class='categoria'>{$categoria}</td>";
                    echo "</tr>";
                }

                echo "</table>";
            }

        }
        ?>
    </body>
</html>

