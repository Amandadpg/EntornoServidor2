<?php

session_start();

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    $_SESSION["mensaje"] = "Debes realizar el formulario";
    header("Location: inicio.php");
    exit();

}else if(empty($_POST['usuario']) || empty($_POST['contrasena']) || 
    empty($_POST['email']) || empty($_POST['cine'])){

    $_SESSION["mensaje"] = "Debes completar todos los campos del formulario para iniciar sesion";
    header("Location: inicio.php");
    exit();
    
}else {
    //Array de las contraseña que pueden ser
    $personas = array(
        array("usuario" => "Antonio", "contrasena" => "erchulo"),
        array("usuario" => "Noelia", "contrasena" => "lguapa"),
        array("usuario" => "Pepe", "contrasena" => "elpsao"),        
        array("usuario" => "Sofia", "contrasena" => "lalista"));

    //Recorrer el array para verificar con son esos usuarios o contraseñas
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $encontrado = false;

    foreach ($personas as $persona) {
        if ($persona["usuario"] === $usuario && 
            $persona["contrasena"] === $contrasena) {
            $encontrado = true;
            break;
        }
    }

    if (!$encontrado) {
        $_SESSION["mensaje"] = "El usuario o la contraseña no son correctos";
        header("Location: inicio.php");
        exit();
    }

    $_SESSION['usuario'] = htmlspecialchars($_POST['usuario']);
    $_SESSION['contrasena'] = htmlspecialchars($_POST['contrasena']);

    setcookie("cine", $_POST["cine"], time() + 3600 * 24 * 30 );

    header("Location: asientos.php");
    exit();
    
}

//Validar correo electronico
try {
    if (!isset($_POST['email'])) {
        throw new Exception("No se recibió el correo.");
    }

    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("El formato del correo electrónico no es válido.");
    }


} catch (Exception $e) {
    $_SESSION["mensaje"] = $e->getMessage();
    header("Location: inicio.php");
    exit;
}



?>