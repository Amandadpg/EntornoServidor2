<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seleccionar asiento</title>
</head>
<body>
    <?php

    session_start();

    if (!isset($_SESSION['usuario']) || !isset($_SESSION['contrasena'])) {
        $_SESSION['mensaje'] = "Debes iniciar sesión antes de seleccionar asiento.";
        header("Location: inicio.php");
        exit;
    }else if(!isset($_COOKIE['cine'])){
        $_SESSION['mensaje'] = "No se ha seleccionado el cine.";
        header("Location: inicio.php");
        exit;
    }
    $usuario = $_SESSION['usuario'];
    $cine = $_COOKIE['cine'];
    

    $_SESSION['cine'] = $cine;
    ?>
    <h1>Selecciona un asiento</h1>
    <table border='1'>
        <tr>
            <th colspan="2">Asientos</td>
        </tr>
        <tr>
            <td><a href="codigo.php?asiento=1">1</a></td>
            <td><a href="codigo.php?asiento=2">2</a></td>
        </tr>
        <tr>
            <td><a href="codigo.php?asiento=3">3</a></td>
            <td><a href="codigo.php?asiento=4">4</a></td>
        </tr>
    </table>

</body>
</html>