<?php
class Conexion {
private $host = "localhost";
private $usuario = "root";
private $password = "";
private $bd = "m_agenda";
public $conexion;


public function __construct() {
$this->conexion = new mysqli($this->host, $this->usuario, $this->password, $this->bd);
if ($this->conexion->connect_error) {
die("Error de conexión: " . $this->conexion->connect_error);
}
$this->conexion->set_charset("utf8");
}
}
?>