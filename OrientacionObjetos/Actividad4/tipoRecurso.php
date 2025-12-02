<?php
namespace grtic;

class tipoRecurso {
    private $nombre;


    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }


    public function getNombre(){ 
        return $this->nombre; 
    }
    public function setNombre($nombre){ 
        $this->nombre = $nombre; 
    }
    
    public function __toString(): string {
        return "Tipo de recurso: {$this->nombre}";
    }

}