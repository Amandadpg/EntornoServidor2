<?php
require_once "agenda_funciones.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
$nombre = trim($_POST['nombre']);
$apellidos = trim($_POST['apellidos']);
$email = trim($_POST['email']);
$telefono = trim($_POST['telefono']);


if ($nombre && $apellidos && $email && $telefono) {
agregarContacto($nombre, $apellidos, $email, $telefono);
}
}


header("Location: agenda_principal.php");
exit;
?>