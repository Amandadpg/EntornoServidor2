<?php

session_start();
$mensaje= "";
$pista = " ";

function validarPrueba1($respuesta) {
    $respuestaCorrecta = "1441";
    if (trim($respuesta) === $respuestaCorrecta) {
        $_SESSION['prueba1_superada'] = true;
        return true;
    }
    return false;
}

function procesarPrueba1() {
    global $mensaje, $pista; // necesitamos acceder a las variables fuera de la función

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST["pista"])) {
            // Mostrar pista
            $pista = "💡 Pista: La feria de Mairena nació hace muchos siglos, como un mercado de ganado.";
        } elseif (isset($_POST["respuesta"])) {
            $respuesta = trim($_POST["respuesta"]);

            if ($respuesta == "1441") {
                $_SESSION["prueba1_superada"] = true;
                header("Location: prueba2.php");
                exit();
            } else {
                $mensaje = "Esa no es la fecha correcta. Inténtalo de nuevo.";
            }
        }
    }
}

procesarPrueba1();





?>