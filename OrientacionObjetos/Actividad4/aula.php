<?php
namespace grtic;

class Aula extends tipoRecurso {
    private $ubicacion;
    private $tipoRecurso;
    
    /*
    public function __construct($nombre)
    {
        parent
        $this->nombre = $nombre;
    }
        */

    public function  __toString(){
        return parent::__toString() . "Ubicacion: 
        {$this->ubicacion} | Tipo de Aula: 
        {$this->tipoAula}";
    }

}