<?php
$letra = 'z';
$desplazamiento = 2;

$valor_ascii = ord($letra);

$numero_nuevo = $valor_ascii + $desplazamiento ;

if($numero_nuevo > 122) {
	$numero_nuevo = $numero_nuevo - 26;
}

$letra_final = chr($numero_nuevo);

echo "Letra: " . $letra . "<br>";
echo "Desplazamiento: " . $desplazamiento . "<br>";
echo "Resultado: " . $letra_final . "<br>";



?>