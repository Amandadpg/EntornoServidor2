<?php
namespace grtic;

class Usuario {
    private $nombreCompleto;
    private $nombreUsuario;
    private $contrasena;

    public function __construct($nombreCompleto,$nombreUsuario,$contrasena)
    {
        $this->nombreCompleto = $nombreCompleto;
        $this->nombreUsuario = $nombreUsuario;
        $this->contrasena = $contrasena;
    }

    public function getNombreCompleto(){ 
        return $this->nombreCompleto; 
    }
    public function setNombreCompleto($nombreCompleto){ 
        $this->nombreCompleto = $nombreCompleto; 
    }

    public function getNombreUsuario(){ 
        return $this->nombreUsuario; 
    }
    public function setNombreUsuario($nombreUsuario){ 
        $this->nombreUsuario = $nombreUsuario; 
    }

    public function getContrasena(){ 
        return $this->contrasena; 
    }
    public function setContrasena($contrasena){ 
        $this->contrasena = $contrasena; 
    }

    public function __toString() {
        return "Usuario: {$this->nombreUsuario}, 
        Nombre completo: {$this->nombreCompleto}";
    }

}

?>
