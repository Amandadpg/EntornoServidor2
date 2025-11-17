<?php

session_start();

try {
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $edad = $_POST['edad'];

        if(!is_numeric($edad) || $edad < 18){
            throw new Exception("Acceso denegado: Edad invalidad o menos de 18 años");

        }
        echo "Acceso permitido";
    }catch (Exception $e){
        echo $e -> getMessage();
        error_log(date("[Y-m-d H:i:s]"), $e -> getMessage(), 3, "errores_acceso.log");
    }
}

?>