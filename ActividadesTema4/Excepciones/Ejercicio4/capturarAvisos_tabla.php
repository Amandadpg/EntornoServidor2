<?php
session_start();

//Poner lo que asegurarse de que viene del formulario que es lo mismo que !isset

//Para comprobar hay que poner directamente el archivo
if(!isset($_POST['filas']) || !isset($_POST['columnas'])
    || !isset($_POST['fila']) || !isset($_POST['columna'])) {

        $_SESSION['mensaje'] = "Debes introducir todas las filas y columnas (isset).";
        header("Location:capturarAvisos.php");
        exit();
}

$filas = intval(strip_tags($_POST['filas']));
$columnas = intval(strip_tags($_POST['columnas']));
$filaSeleccionada = intval(strip_tags($_POST['fila']));
$columnaSeleccionada = intval(strip_tags($_POST['columna']));

//Validar que las filas y columnas estan dentro del rango
if($filas < 2 || $filas > 5 || $columnas < 2 || $columnas > 5) {
    $_SESSION['mensaje'] = "Las filas y columnas deben estar entre 2 y 5";
    header("Location:capturarAvisos.php");
    exit();
}

try{
    if($filaSeleccionada < 1 || $filaSeleccionada > $filas ||
    $columnaSeleccionada < 1 || $columnaSeleccionada > $columnas){
        throw new Exception("Fila o columna incorrecta");
    }
}catch (Exception $e){
    $_SESSION['mensaje'] = $e -> getMessage();
    header("Location:capturarAvisos.php");
    exit();
}

$tabla = [];
for ($i = 1; $i <= $filas; $i++) {
    for ($j = 1; $j <= $columnas; $j++) {
        $tabla[$i][$j] = $i * $j;
    }
}

echo "<table border='2'>";
for ($i = 1; $i <= $filas; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= $columnas; $j++) {
        echo "<td>";
        echo $tabla[$i][$j];
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";

?>