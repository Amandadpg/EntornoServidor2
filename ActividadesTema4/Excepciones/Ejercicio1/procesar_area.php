<?php

function registrarError($mensaje) {
    error_log(date("[Y-m-d H:i:s]") . " $mensaje\n", 3, "errores.log");
}

try{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $figura = $_POST['area'];

    if($figura == "triangulo"){
        $base = $_POST['base'];
        $altura = $_POST['altura'];

        //echo "Base: " . $base . "<br>";
        //echo "Altura: " . $altura . "<br>";

        if(!is_numeric($base) || $base <= 0 || !is_numeric($altura) || $altura <= 0) {

            throw new Exception("Error: La base y la altura deben ser positivos");
        }
    }
}

}catch(Exception $e){
    echo $e->$getMessage();
    registrarError($e->$getMessage());
}


?>