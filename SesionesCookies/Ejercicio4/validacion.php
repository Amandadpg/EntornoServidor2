<?php

if(isset($_POST['idioma'])) {
    $idioma = htmlspecialchars($_POST['idioma']);
    setcookie('idioma', $idioma, time() + 3600 * 24 * 30);
    header("Location: destino.php");
    exit();
}else {
    echo "Por favor, ingresa el idioma valido";
}


?>