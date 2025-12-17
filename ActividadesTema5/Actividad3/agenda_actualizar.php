<?php
require_once "clases/Agenda.php";
$agenda = new Agenda();
$id = $_GET['id'] ?? 0;
$contacto = $agenda->obtener($id);
?>


<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Actualizar Contacto</title></head>
<body>
<h2>Actualizar Contacto</h2>
<form action="agenda_procesar_actualizacion.php" method="post">
<input type="hidden" name="id" value="<?= $contacto->id ?>">
<input type="text" name="nombre" value="<?= htmlspecialchars($contacto->nombre) ?>" required>
<input type="text" name="apellidos" value="<?= htmlspecialchars($contacto->apellidos) ?>" required>
<input type="email" name="email" value="<?= htmlspecialchars($contacto->email) ?>" required>
<input type="text" name="telefono" value="<?= htmlspecialchars($contacto->telefono) ?>" required>
<input type="submit" value="Actualizar">
</form>
</body>
</html>