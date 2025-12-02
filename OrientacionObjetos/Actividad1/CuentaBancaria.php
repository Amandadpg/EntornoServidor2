<?php
class CuentaBancaria {
    private $usuario;
    private $pin;
    private $entradas;
    private $salidas;
    private $saldo;

    public function __construct($usuario, $pin){
        $this->usuario = $usuario;
        $this->pin = $pin;
        $this->entradas = [];
        $this->salidas = [];
        $this->saldo = 0;
    }

    public function cambiaPin($nuevoPin){
        $this ->pin = $nuevoPin;
    }

    public function validaUsuario($usuario, $pin) {
        $valido = false;
        if($this->usuario === $usuario && $this->pin === $pin) {
            $valido = true;
        }
        return $valido;
    }

    public function ingresar($cantidad) {
        $this->entradas[] = $cantidad;
        $this->saldo += $cantidad;
    }

    public function sacar($cantidad) {
        $saldoSuficiente = false;
        if($cantidad <= $this->saldo){
            $this->salidas[] = $cantidad;
            $this->saldo -= $cantidad;
            $saldoSuficiente = true;
        }
        return $saldoSuficiente;
        
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function getEntradas() {
        return $this->entradas;
    }

    public function getSalidas() {
        return $this->salidas;
    }

    public function __destruct() {
        echo "<br>Cuenta de {$this->usuario} cerrada <br>";
    }

    

}

$cuenta = new CuentaBancaria("Fidel", "1234");

if($cuenta->validaUsuario("Fidel", "1234")) {
    echo "usuario valido<br>";

    $cuenta->ingresar(100);
    echo "Se han ingresado 100€. Saldo actual:" . $cuenta->getSaldo() . "€<br>";

    $gasto = 80;
    if($cuenta->sacar($gasto)) {
        echo "Se han retirado {$gasto}€. Saldo actual: " . $cuenta->getSaldo() . "€<br>";
        echo "<h3>Listado de Entradas:</h3>";
        foreach($cuenta->getEntradas() as $entrada){
            echo "Entrada: {$entrada}€<br>";
        }
        echo "<h3>Listado de Salidas:</h3>";
        foreach($cuenta->getSalidas() as $salida){
            echo "Salida: {$salida}€<br>";
        }
    }else {
        echo "Fondos insuficientes para retirar {$gasto}€.<br>";
    }

}else {
    echo "Usuario no valido";
}



?>