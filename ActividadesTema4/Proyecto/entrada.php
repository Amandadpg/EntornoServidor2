<?php
session_start();

//Obtener datos desde GET (escaneado del QR)
$usuario = $_GET['usuario'] ?? null;
$asiento = $_GET['asiento'] ?? null;
$cine    = $_GET['cine'] ?? null;

//Validar que los datos existen
if (!$usuario || !$asiento || !$cine) {
    $_SESSION['mensaje'] = "Datos incompletos para verificar la entrada.";
    header("Location: inicio.php");
    exit();
}

//http://localhost/proyecto/entrada.php?usuario=Antonio&asiento=1&cine=los_arcos
//Matriz de verificaciones
$entradas_validas = [
    'Antonio' => ['asiento' => '1', 'cine' => 'los_arcos'],
    'Noelia'  => ['asiento' => '2', 'cine' => 'cine_alcores'],
    'Pepe'    => ['asiento' => '3', 'cine' => 'los_arcos'],
    'Sofia'   => ['asiento' => '4', 'cine' => 'cine_nervion'],
];

//Verificar la entrada
if (isset($entradas_validas[$usuario])) {
    $valido = $entradas_validas[$usuario];
    if ($valido['asiento'] === $asiento && $valido['cine'] === $cine) {
        echo "<h1>Entrada válida</h1>";
        echo "<p>Usuario: $usuario</p>";
        echo "<p>Cine: $cine</p>";
        echo "<p>Asiento: $asiento</p>";
        exit();
    }
}

//Entrada incorrecta
$_SESSION['mensaje'] = "Entrada inválida o incorrecta.";
header("Location: inicio.php");
exit();
