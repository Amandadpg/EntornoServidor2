<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTf-8">
        <title>Formulario para iniciar sesion</title>
    </head>
    <body>
        <?php
            session_start();

            if(isset($_SESSION['mensaje'])){
                $mensaje = $_SESSION['mensaje'];
                echo "<p style='color:red'>$mensaje</p>";

                unset($_SESSION['mensaje']);
            }



        ?>
        <h1>Formulario para iniciar sesion</h1>
        <p>Introduce los siguientes datos:</p>
        
        <form action="validacion.php" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" ><br><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" ><br><br>

        <label for="email">Correo electronico:</label>
        <input type="text" name="email" id="email" ><br><br>

        <select name="cine" id="cine">
            <option value="">Seleccion del cine</option>
            <option value="cine_alcores">cine_alcores</option>
            <option value="los_arcos">los_arcos</option>
            <option value="cine_nervion">cine_nervion</option>
        </select><br><br>

        <input type="submit" value="Guardar">
    </form>
    </body>

</html>