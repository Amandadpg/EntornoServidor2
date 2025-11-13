<?php
//Asegurar que los datos provienen de el formulario
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['email'];

    //Validar el nombre
    if(!preg_match('/^[a-zA-Z]+$/', $nombre)){
        echo "Error: el nombre no es correcto.";
        exit();
    }

    //Validar el correo
    if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
        echo "Error: el correo no es correcto";
        exit();
    }
    echo "Los datos son correctos";

}




?>