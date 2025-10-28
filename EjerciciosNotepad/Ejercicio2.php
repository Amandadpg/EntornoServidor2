<?php

define("UN_MEDIO", 0.5);
define("GRAVEDAD", 9.8);

$masa = 10;
$velocidad = 12;
$altura = 8; 

$energia_cinetica = ( UN_MEDIO * $masa * ($velocidad)**2 ) ;
$energia_potencial = ( $masa * GRAVEDAD * $altura ) ;

echo "<h3>Resultados:</h3>"; 
echo "La masa del objeto es: " . $masa ." kg<br>";
echo "La velocidad del objeto es: " . $velocidad ." m/s<br>";
echo "La altura del objeto es: " . $altura ." metros<br><br>";

echo "La enercia cinetica del objeto es: " . number_format($energia_cinetica, 2) . " joules <br>";
echo "La enercia potencial del objeto es: " . number_format($energia_potencial, 2). " joules";

?>