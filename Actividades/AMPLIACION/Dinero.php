<?php
if (isset($_GET['cantidad'])) {
    $cantidad = intval($_GET['cantidad']);
    $billetes = [500, 200, 100, 50, 20, 10, 5];
    $monedas = [2, 1];


    echo "Cantidad introducida: $cantidad euros<br><br>";


    foreach ($billetes as $b) {
        $num = intdiv($cantidad, $b);
        echo "$num billete(s) de $b<br>";
        $cantidad = $cantidad % $b;
    }


    foreach ($monedas as $m) {
        $num = intdiv($cantidad, $m);
        echo "$num moneda(s) de $m<br>";
        $cantidad = $cantidad % $m;
    }
} else {
    echo "Por favor, introduce la cantidad en la URL. Ejemplo: ?cantidad=139";
}
?>

