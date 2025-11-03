<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <title>Resumen del pedido</title>
    </head>
    <body>
        <?php
            //Variables
            $producto = "Teclado mecanico";
            $precioUnit = 49.90;
            $uds = 3;
            static $descuento = 0.10;
            define("IVA", 0.21);

            
            //Expresiones aritmeticas
            $importe_base = $precioUnit * $uds;
            $iva_aplicar = $importe_base * IVA;
            $importe_iva = $importe_base + $iva_aplicar;
            $importe_descuento = $importe_iva * $descuento;
            $total = $importe_iva - $importe_descuento;

            //Funcion
            function linea($etiqueta, $valor){ 
                $moneda = "€";
                echo "<p><strong>". $etiqueta ."</strong>" . number_format($valor, 2) . $moneda . "</p>";
                
            }

            //Salida y formato
            echo "<h1>Resumen de pedido: $producto</h1>";
            linea("Importe base:", $importe_base);
            linea("IVA (21%):", $iva_aplicar);
            linea("Importe con IVA:", $importe_iva);
            linea("Descuento (10%):", $importe_descuento);
            linea("Total a pagar:", $total);

            

        ?>
    </body>
</html>