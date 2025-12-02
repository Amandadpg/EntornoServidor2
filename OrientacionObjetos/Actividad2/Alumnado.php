<?php
class Alumnado {
    private $nombre;
    private $apellidos;
    private $anioNac;
    private $numMatricula;
    private $notas;

    public function __construct($nombre, $apellidos, $anioNac, $numMatricula){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->anioNac = $anioNac;
        $this->numMatricula = $numMatricula;
        $this->notas = [
            "DWES" => [null,null],
            "DWEC" => [null,null],
            "DI" => [null,null],
            "DAW" => [null,null],
            "IPE" => [null,null]
        ];
    }

    public function calcularNotaFinal($modulo) {

        if(isset($this->notas[$modulo])){
            $evaluacion1 = $this->notas[$modulo][0];
            $evaluacion2 = $this->notas[$modulo][1];

            if($evaluacion1 != null && $evaluacion2 != null){
                $resultado = ($evaluacion1 + $evaluacion2)/2;
            }else {
                $resultado = null;
            }
        }else {
            $resultado = null;
        }
        
        return $resultado;

    }

    public function obtenerNota($modulo, $evaluacion){

        if(isset($this->notas[$modulo]) && ($evaluacion == 1 || $evaluacion = 2)) {
            $nota = $this->notas[$modulo][$evaluacion-1];
        }else {
            $nota = null;
        }
        

        return $nota;
    }

    public function asignarNota($modulo, $evaluacion, $nota) {
         if(isset($this->notas[$modulo]) && 
         ($evaluacion == 1 || $evaluacion = 2) &&
         ($nota >= 0 && $nota <=10)) {
            $this->notas[$modulo][$evaluacion-1] = $nota;
            return true;
        }else {
            return false;
        }
        
    }


    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getAnioNac() {
        return $this->anioNac;
    }

    public function getNumMatricula() {
        return $this->numMatricula;
    }
}

$alumno = new Alumnado("Fidel", "Garcia", 2001, "DAW25");

$alumno->asignarNota("DWES", 1, 8.5);
$alumno->asignarNota("DWES", 2, 5.5);
$alumno->asignarNota("DWES", 1, 2.5);
$alumno->asignarNota("DWES", 2, 0.5);

echo "La nota de la primera evaluacion de DWEA es: " . $alumno->obtenerNota("DWES", 1);

echo "<br>La nota final: " . $alumno->calcularNotaFinal("DWES");
?>

