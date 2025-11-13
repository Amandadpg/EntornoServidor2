<?php
function analizarNumeros($numeros) {
    
    $minimo = min($numeros);
    $maximo = max($numeros);
    $promedio = array_sum($numeros) / count($numeros);

    return ['minimo' => $minimo, 'maximo' => $maximo, 'promedio' => $promedio];
}


$numeros = [45, 12, 78, 34, 23, 89, 56, 67, 90, 10];

$resultado = analizarNumeros($numeros);

echo "Número más bajo: " . $resultado['minimo'] . "<br>";
echo "Número más alto: " . $resultado['maximo'] . "<br>";
echo "Promedio: " . $resultado['promedio'] . "<br>";


?>