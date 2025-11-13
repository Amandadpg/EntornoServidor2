<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTf-8">
        <title>Validación de Datos de Entrada en un Perfil de Usuario</title>
    </head>
    <body>
        <h1>Validación de Datos de Entrada en un Perfil de Usuario</h1>
        <p>Introduce tu nombre y correo.</p>
        
        <form action="procesar_perfil.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="email">Correo:</label>
        <input type="email" name="email" id="email" required><br><br>

        <input type="submit" value="Enviar">
    </form>
    </body>

</html>