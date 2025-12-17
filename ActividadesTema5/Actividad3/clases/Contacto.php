<?php
class Contacto {
    public $id;
    public $nombre;
    public $apellidos;
    public $email;
    public $telefono;


public function __construct($id, $nombre, $apellidos, $email, $telefono) {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->apellidos = $apellidos;
    $this->email = $email;
    $this->telefono = $telefono;
    }
}
?>