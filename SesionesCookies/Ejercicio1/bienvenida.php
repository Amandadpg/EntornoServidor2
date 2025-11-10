<?php

session_start();

if(isset($_SESSION['nombre']) && isset($_SESSION['apellidos'])){

    $nombre = $_SESSION['nombre'];
    $apellidos = $_SESSION['apellidos'];

    echo "<h1>Bienvenido, " . $nombre . " " . $apellidos . "</h1>";

} else {
    echo "<h1>No has iniciado la sesion</h1>";
}
?>