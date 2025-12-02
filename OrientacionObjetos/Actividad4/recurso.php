<?php

class Recurso {
    private string $nombre;
    private TipoRecurso $tipoRecurso;
    
    public function __construct($nombre,$tipoRecurso)
    {
        $this->nombre = $nombre;
        $this->tipoRecurso = $tipoRecurso;
    }

    public function getNombre(){ 
        return $this->nombre; 
    }
    public function setNombre($nombre){ 
        $this->nombre = $nombre; 
    }

    public function getTipoRecurso(){ 
        return $this->tipoRecurso; 
    }
    public function setTipoRecurso($tipoRecurso){ 
        $this->tipoRecurso = $tipoRecurso; 
    }

    public function __toString() {
        return "Nombre: {$this->nombre}" .
        $this->tipoRecurso->__toString();
    }

}

?>
