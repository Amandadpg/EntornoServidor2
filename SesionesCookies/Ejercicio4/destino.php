<?php
    if(isset($_COOKIE['idioma'])){
        if($_COOKIE['idioma'] === "es") {
            echo "Bienvenido, tu idioma es español";
            
        }else if( $_COOKIE['idioma'] === "en"){
            echo "Welcome, your language is English";
        }
    } 
        



?>