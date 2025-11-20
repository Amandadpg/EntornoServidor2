<?php
session_start();

// Si ya está logueado, enviarlo directo al listado
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: movies_list.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
</head>
<body>
    <h2>Iniciar sesión</h2>

    <?php if (isset($_GET['error'])): ?>
        <p style="color:red;">Credenciales incorrectas.</p>
    <?php endif; ?>

    <form action="login_controller.php" method="POST">
        <label>Usuario:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Clave:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Ingresar">
    </form>
</body>
</html>
