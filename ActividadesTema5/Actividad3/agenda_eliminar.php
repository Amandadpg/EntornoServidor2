<?php
require_once "clases/Agenda.php";

if (isset($_GET['id'])) {
    $agenda = new Agenda();
    $id = intval($_GET['id']);
    $agenda->eliminar($id);
}

header("Location: agenda_principal.php?mensaje=eliminado");
exit;
?>
