<?php
namespace grtic;

class Aula extends tipoRecurso {
    private $ubicacion;
    private $tipoAula;
    
    
    public function __construct($nombre, $ubicacion, $tipoAula)
    {
        parent::__construct($nombre);
        $this->ubicacion = $ubicacion;
        $this->tipoAula = $tipoAula;
    }

    public function getUbicacion(){ 
        return $this->ubicacion; 
    }
    public function setUbicacion($ubicacion){ 
        $this->ubicacion = $ubicacion; 
    }

    public function getTipoAula(){ 
        return $this->tipoAula; 
    }
    public function setTipoAula($tipoAula){ 
        $this->tipoAula = $tipoAula; 
    }
        

    public function  __toString(){
        return parent::__toString() . "Ubicacion: 
        {$this->ubicacion} | Tipo de Aula: 
        {$this->tipoAula}";
    }

}