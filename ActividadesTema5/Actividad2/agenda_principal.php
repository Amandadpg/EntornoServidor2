<?php
require_once "agenda_funciones.php";
$contactos = listarContactos();
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Agenda Web</title>
<style>
table { border-collapse: collapse; width: 100%; }
th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
th { background-color: #f0f0f0; }
form { margin-top: 20px; }
</style>
</head>
<body>


<h2>Listado de Contactos</h2>


<table>
<tr>
<th>Nombre</th>
<th>Apellidos</th>
<th>Email</th>
<th>Teléfono</th>
<th>Acción</th>
</tr>


<?php while ($fila = $contactos->fetch_assoc()) { ?>
<tr>
<td><?= htmlspecialchars($fila['nombreContacto']) ?></td>
<td><?= htmlspecialchars($fila['apellidosContacto']) ?></td>
<td><?= htmlspecialchars($fila['emailContacto']) ?></td>
<td><?= htmlspecialchars($fila['tfnoContacto']) ?></td>
<td>
<a href="agenda_eliminar.php?id=<?= $fila['idContacto'] ?>"
onclick="return confirm('¿Eliminar contacto?')">Eliminar</a>
</td>
</tr>
<?php } ?>
</table>


<h2>Añadir Nuevo Contacto</h2>


<form action="agenda_agregar.php" method="post">
<label>Nombre:</label><br>
<input type="text" name="nombre" required><br><br>


<label>Apellidos:</label><br>
<input type="text" name="apellidos" required><br><br>


<label>Email:</label><br>
<input type="email" name="email" required><br><br>


<label>Teléfono:</label><br>
<input type="text" name="telefono" required><br><br>


<input type="submit" value="Guardar Contacto">
</form>


</body>
</html>