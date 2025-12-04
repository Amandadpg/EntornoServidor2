<?php
// Empleado.php
require_once 'Persona.php';


class Empleado extends Persona {
    private $salarioMensual;


    public function __construct($nombre, $apellidos, $salarioMensual)
    {
        parent::__construct($nombre, $apellidos);
        $this->salarioMensual = $salarioMensual;
    }


    public function getSalarioMensual()
    {
        return $this->salarioMensual;
    }


    public function setSalarioMensual($salarioMensual)
    {
        $this->salarioMensual = $salarioMensual;
    }


    public function calcularSalarioAnual()
    {
        return $this->salarioMensual * 12;
    }


    public function __toString()
    {
        return "Empleado: " . $this->getNombreCompleto()
            . " | Salario mensual: {$this->salarioMensual} €";
    }
}
