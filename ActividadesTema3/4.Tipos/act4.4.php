<?php
$valor = "123.45";
echo  "Valor: $valor y tipo: " . gettype($valor). "<br>";

$Tipofloat = (float) $valor;
echo  "Valor: $Tipofloat y tipo: " . gettype($Tipofloat). "<br>";

$TipoEntero = (int) $valor;
echo  "Valor: $TipoEntero y tipo: " . gettype($TipoEntero). "<br>";

$TipoBoolean = (boolean) $valor;
echo  "Valor: $TipoBoolean y tipo: " . gettype($TipoBoolean);
?>