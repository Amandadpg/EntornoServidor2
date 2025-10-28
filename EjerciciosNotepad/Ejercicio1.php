<?php

$gasto1 = 30.58;
$gasto2 = 69.80;
$gasto3 = 70.52;

$suma = $gasto1 + $gasto2 + $gasto3;

$promedio = $suma / 3;

$gastoMax = max($gasto1, $gasto2, $gasto3);
$gastoMin = min($gasto1, $gasto2, $gasto3);

echo "<h3>Resumen de gastos</h3>";
echo "Gasto 1:" . $gasto1 . "<br>";
echo "Gasto 2:" . $gasto2 . "<br>";
echo "Gasto 3:" . $gasto3 . "<br>";


echo "Suma total de los gastos: €" . $suma . "<br>";
echo "Promedio de los gastos: €" . $promedio . "<br>";
echo "El gasto mas alto fue: €" . $gastoMax . "<br>";
echo "El gasto mas bajo fue: €" . $gastoMin . "<br>"; 

?>