<?php
require_once "agenda_funciones.php";


if (isset($_GET['id'])) {
$id = intval($_GET['id']);
eliminarContacto($id);
}


header("Location: agenda_principal.php");
exit;
?>