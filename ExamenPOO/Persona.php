<?php

class Persona {
	protected string $nombre;
	protected string $apellidos;
	
	public function __construct($nombre, $apellidos) {
		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
		
	}
	
	public function getNombre() {
		return $this->nombre;
	}
	
	public function setNombre($nombre) {
		return $this->nombre = $nombre;
	} 
	
	public function getApellidos() {
		return $this->apellidos;
	}
	
	public function setApellidos($apellidos) {
		return $this->apellidos = $apellidos;
	} 
	
	public function getNombreCompleto() {
		return $this->nombre . " " . $this->apellidos;
	}
	
	public function __toString() {
		return "Nombre: {$this->nombre}; Apellidos: {$this->apellidos}";
	}
	
}


?>
