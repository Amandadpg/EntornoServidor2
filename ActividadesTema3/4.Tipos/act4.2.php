<?php
$variable = 'hola';

if (is_array($variable)) {
    echo $variable ." es un " . gettype($variable);
} elseif (is_string($variable)) {
    echo $variable ." es un " . gettype($variable);
} elseif (is_int($variable)) {
    echo $variable ." es un " . gettype($variable);
}

?>
