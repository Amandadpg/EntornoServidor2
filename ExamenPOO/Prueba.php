<?php

require_once "Persona.php";
require_once "Empleado.php";

$persona1 = new Persona("Ana", "Garcia Lopez");
$persona2 = new Persona("Amanda", "De La Prida Garcia");

$empleado1 = new Empleado("Luis", "Lopez Gomez", 1000, []);
$empleado2 = new Empleado("Juan", "Ramirez Ruiz", 3500, []);

echo "<h1>Pruebas de las clases Persona y Empleado</h1>";

echo "<h2>Prueba de Persona</h2>";
echo "Nombre: " . $persona1->getNombre() . "<br>";
echo "Apellidos: " . $persona1->getApellidos() . "<br>";
echo "Nombre completo: " . $persona1->getNombreCompleto() . "<br>";
echo "__toString() de Persona: " . $persona1->__toString() . "<br>";

echo "<br>";

echo "<h2>Prueba de Empleado</h2>";
echo "<h3>Empleado 1 (salario por defecto)</h3>";
echo "Nombre completo: " . $empleado1->getNombreCompleto() . "<br>";
echo "Salario inicial: " . $empleado1->getSalario() . "€ <br>";
echo "¿Debes pagar impuestos?: " . $empleado1->debePagarImpuestos() . "<br>";
$empleado1->anyadirTelefono(600111222);
$empleado1->anyadirTelefono(955123456);
echo "Teléfonos: " . $empleado1->listarTelefonos() . "<br>";
$empleado1->vaciarTelefonos();
echo "Telefonos tras vaciar: " .  $empleado1->vaciarTelefonos() . "<br>";


echo "<h3>Empleado 2 (con salario y telefonos iniciales)</h3>";
$telefonos_iniciales = [666777888, 954000111];
echo "Nombre completo: " . $empleado2->getNombreCompleto() . "<br>";
echo "Salario inicial: " . $empleado2->getSalario() . "€ <br>";
echo "¿Debes pagar impuestos?: " . $empleado2->debePagarImpuestos() . "<br>";
$empleado2->setSalario(4000);
echo "Salario tras setSalario: " . $empleado2->getSalario() . " €<br>";
$empleado2->setTelefonos([666777888, 954000111]);
$empleado1->anyadirTelefono(955123456);
echo "Teléfonos tras setTelefonos y anyadirTelefono: " . $empleado2->listarTelefonos() . "<br>";
echo "Teléfonos finales: " . $empleado2->listarTelefonos() . "<br>";


echo "<h2>Salida de Empleado::toHTML</h2>";
echo Empleado::toHtml($empleado2);

echo "<h2>Salida de __toString() de Empleado</h2>";
echo $empleado1->__toString() . "<br>";




?>