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
        //Comprobamos que este vacio o no, con el isset
        if(isset($_POST["titulo"]) && isset($_POST["anio"]) && isset($_POST["duracion"])) {
            //Recupero los datos del formulario
            $titulo = $_POST["titulo"];
            $anio = $_POST["anio"];
            $duracion = $_POST["duracion"];
            //Declaro el array nuevo y categoria para la funcion
            $peliculas = [];
            $categoria = "";

            //Voy recorriendo el array con cada una de las entidades
            for($i = 0; $i < 4; $i++) {
                $peliculas[] = ["titulo" => $titulo[$i],
                                "anio" => $anio[$i],
                                "duracion" => $duracion[$i]];
                
            }


            //Realizo la funcion para determinar la categoria de cada pelicula
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


            //Empiezo a hacer la tabla que me pide
            echo "<table border ='1' >";
            echo "<tr><th>Título</th><th>Año</th><th>Duración (min)</th><th>Categoría</th></tr>";

            //Recorro el array de pelicula para poder ir poniendolo en la tabla
            foreach ($peliculas as $peli) {
                $categoria = determinarCategoria($peli["anio"], $peli["duracion"]);
                echo "<tr>";
                echo "<td>{$peli['titulo']}</td>";
                echo "<td>{$peli['anio']}</td>";
                echo "<td>{$peli['duracion']}</td>";
                echo "<td class='categoria'>{$categoria}</td>";
                echo "</tr>";
            }
            //Cierro la tabla
            echo "</table>";
        }

        
        ?>
    </body>
</html>

