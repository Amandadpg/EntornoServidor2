<?php

    //Comprobamos si existe la cookie
    if(isset($_COOKIE['usuario'])) {
        echo "Bienvenido, ";
        echo $_COOKIE['usuario'];
        echo "!";
    }else {
        echo "No puedes entrar en esta pagina sin estar registrado";
    }



?>