<?php
// Persona.php
class Persona {
    protected $nombre;
    protected $apellidos;


    public function __construct($nombre, $apellidos)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }


    public function getNombre()
    {
        return $this->nombre;
    }


    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }


    public function getApellidos()
    {
        return $this->apellidos;
    }


    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }


    public function getNombreCompleto()
    {
        return $this->nombre . " " . $this->apellidos;
    }


    public function __toString()
    {
        return "Persona: " . $this->getNombreCompleto();
    }
}
