<?php
require_once "Persona.php";

class Empleado extends Persona {
	
	const SUELDO_TOPE = 3000;
	private $salario;
	private $telefonos = [];
	
	public function __construct($nombre, $apellidos, $salario ,$telefonos ) {
        parent::__construct($nombre, $apellidos);
        $this->telefonos = $telefonos;
        $this->salario = $salario;
    }
	
	
	public function getSalario() {
		return $this->salario;
	}
	
	public function setSalario($salario) {
		return $this->salario = $salario;
	} 
	
	public function getTelefonos() {
		return $this->telefonos;
	}
	
	public function setTelefonos($telefonos) {
		return $this->telefonos = $telefonos;
	} 
	
	public function debePagarImpuestos(){
		if($this->salario >= self::SUELDO_TOPE){
			return "Si";
		}else {
			return "No";
		}
	}
	
	public function anyadirTelefono(int $telefono): void {
        $this->telefonos[] = $telefono;
    }
	
	public function listarTelefonos(): string {
        $cadena = implode(', ', $this->telefonos) . ',';
        return $cadena;
    }
	
	public function vaciarTelefonos(): void {
		$this->telefonos = [];
	}

	public static function toHtml(Empleado $empleado): string {
        $html = "<p>Nombre: " . $empleado->getNombre() .
                " <br>Apellidos: " . $empleado->getApellidos() .
                " <br>Salario: " .$empleado->getSalario() . "</p>";
        $html .= "<ol>";
			foreach ($empleado->getTelefonos() as $telefono) {
				$html .= "  <li>" . $telefono . "</li>";
			}
        $html .= "</ol>";
        return $html;
    }
	
	public function __toString() {
		return parent::__toString() . ", Salario: {$this->salario} ,Telefonos: {$this->listarTelefonos()}";
	}
	
	
	
}



?>