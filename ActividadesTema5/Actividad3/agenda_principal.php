<?php
require_once "clases/Agenda.php";
$agenda = new Agenda();
$contactos = $agenda->listar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Agenda con Clases</title>
</head>
<body>
    <?php if (isset($_GET['mensaje'])): ?>
    <p style="color: green; font-weight: bold;">
        <?php
        switch ($_GET['mensaje']) {
            case 'agregado':
                echo "¡Contacto agregado correctamente!";
                break;
            case 'eliminado':
                echo "¡Contacto eliminado correctamente!";
                break;
            case 'actualizado':
                echo "¡Contacto actualizado correctamente!";
                break;
        }
        ?>
    </p>
<?php endif; ?>
<h2>Listado de Contactos</h2>
<table border="1">
<tr>
<th>Nombre</th><th>Apellidos</th><th>Email</th><th>Teléfono</th><th>Acciones</th>
</tr>
<?php foreach($contactos as $c): ?>
<tr>
<td><?= htmlspecialchars($c->nombre) ?></td>
<td><?= htmlspecialchars($c->apellidos) ?></td>
<td><?= htmlspecialchars($c->email) ?></td>
<td><?= htmlspecialchars($c->telefono) ?></td>
<td>
<a href="agenda_actualizar.php?id=<?= $c->id ?>">Actualizar</a> |
<a href="agenda_eliminar.php?id=<?= $c->id ?>" onclick="return confirm('¿Eliminar contacto?')">Eliminar</a>
</td>
</tr>
<?php endforeach; ?>
</table>

<h2>Añadir Nuevo Contacto</h2>
<form action="agenda_agregar.php" method="post">
<input type="text" name="nombre" placeholder="Nombre" required>
<input type="text" name="apellidos" placeholder="Apellidos" required>
<input type="email" name="email" placeholder="Email" required>
<input type="text" name="telefono" placeholder="Teléfono" required>
<input type="submit" value="Guardar">
</form>
</body>
</html>
