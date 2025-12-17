<?php
require_once "clases/Agenda.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $agenda = new Agenda();
    
    $contacto = new Contacto(
        null,
        trim($_POST['nombre']),
        trim($_POST['apellidos']),
        trim($_POST['email']),
        trim($_POST['telefono'])
    );
    
    $agenda->agregar($contacto);
}

// Redirige con mensaje
header("Location: agenda_principal.php?mensaje=agregado");
exit;
?>
