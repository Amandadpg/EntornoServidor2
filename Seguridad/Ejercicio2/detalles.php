<?php
if($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(!isset($_GET['id'])) {
        echo "Error: el id esta vacio.";
        exit();  
    }
$id = $_GET['id'];
//Tambien serviria para validarlo el is_numeric
//ctype_  tiene un monton de tipos para validar diferentes parametros
//ctype_digit = entero
//is_numeric = numerico
}

if(ctype_digit($id)){
    echo "Producto con ID:" . htmlspecialchars($id); 
        
}else {
    echo "Error: el id debe ser entero.";
    exit();
}




?>