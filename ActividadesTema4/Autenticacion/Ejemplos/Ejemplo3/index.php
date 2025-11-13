<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario de Login</title>
</head>
<body>
    <?php
    function validadEdad($edad){
        if($edad < 18){
            throw new Exception("Edad insuficiente para acceder");
        }
    }
        if(isset($_POST['edad'])){
            $edad = $_POST["edad"];
            echo "La edad es: " . $edad;
        }return true;

        try{
            if(isset($_POST["edad"])){
                $edad = (int)$_POST["edad"];
                validadEdad($edad);
                echo "La edad es: " . $edad; 
            }
        }catch (Exception $e){
            echo "Error: ". $e->getMessage();
        }

        function manejadorErrores($errno, $errstr, $errline, $errline) {
            echo "Ocurrió el error: $errstr en el archivo $errline en la línea $errline.<br>";
            $mensaje = "Error: [$errno] $errstr - Archivo: $errline, Linea: $errline";
            error_log($mensaje, 3, "error.log");
        exit;
        }
        try{
            set_error_handler("manejadorErrores");
            // Forzamos un error de variable no definida
            $a = $b; // Esto provocará un error
        }
    ?>
    <form method='POST' action="<?php $_SERVER["PHP_SELF"]; ?>">
        <input type="numer" name="edad"/>
        <input type="submit" value="Enviar"/>
    </form>
</body>
</html>