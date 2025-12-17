<?php
require_once "clases/Agenda.php";
$agenda = new Agenda();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contacto = new Contacto(
        $_POST['id'],
        trim($_POST['nombre']),
        trim($_POST['apellidos']),
        trim($_POST['email']),
        trim($_POST['telefono'])
    );
    $agenda->actualizar($contacto);
}

header("Location: agenda_principal.php?mensaje=actualizado");
exit;
?>
