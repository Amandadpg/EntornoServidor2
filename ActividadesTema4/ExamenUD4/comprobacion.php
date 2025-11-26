<?php
// TODO: Iniciar sesión
session_start();

// TODO: SE VAN A HACER COMPROBACIONES


    // TODO: Comprobar que la petición es POST. Sino, mostrar el mensaje: "Acceso no permitido."

	if($_SERVER['REQUEST_METHOD'] != 'POST') {
	
		$_SESSION["mensaje"] = "Acceso no permitido";
		header("Location: index.php");
		exit();
		
	}

    // TODO: Recoger y sanear las entradas.
    
	$nombre = htmlspecialchars($_POST["nombre"]);
	$edad = (int) $_POST['edad'];
	 
    // TODO: Validar:
    // - Si el nombre está vacío → lanzar mensaje: "El nombre no puede estar vacío.")
    // - Si la edad es menor que 1 o mayor que 100 → lanzar mensaje: "La edad debe estar entre 1 y 100 años."

	try{
		if(empty($nombre)){
			throw new Exception("El nombre no puede estar vacio");
		}
	}catch (Exception $e){
		$_SESSION['mensaje'] = $e -> getMessage();
		header("Location:index.php");
		exit();
	}
	
	try{
		if(!($edad >= 1 && $edad <= 100)){
			throw new Exception("La edad debe estar entre 1 y 100 años.");
		}
	}catch (Exception $e){
		$_SESSION['mensaje'] = $e -> getMessage();
		header("Location:index.php");
		exit();
	}

    // TODO: Guardar el resultado saneado en la sesión.
	
	$_SESSION['nombre'] = $nombre;
	$_SESSION['edad'] = $edad;

    // TODO: Redirigir a bienvenida.php con header("Location: ...") y salir con exit;

	header("Location: bienvenida.php");
	exit();


// TODO: CAPTURAR LA EXCEPCIÓN


    // TODO: Guardar el mensaje de error en una cookie 'flash_error' con duración ~60 segundos.
    // Pista: setcookie('flash_error', $e->getMessage(), time()+60, '/');

	setcookie('flash_error', $e->getMessage(), time()+60, '/');

    // TODO: Redirigir de vuelta a index.php y salir con exit;

	header("Location: index.php");
	exit();






?>