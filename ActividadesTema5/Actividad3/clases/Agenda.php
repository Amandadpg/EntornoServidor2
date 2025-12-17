<?php
require_once "conexion.php";
require_once "Contacto.php";


class Agenda {
    private $conexion;


    public function __construct() {
        $this->conexion = (new Conexion())->conexion;
    }


    public function listar() {
        $sql = "SELECT * FROM agenda ORDER BY nombreContacto";
        $resultado = $this->conexion->query($sql);
        $contactos = [];
        while ($fila = $resultado->fetch_assoc()) {
            $contactos[] = new Contacto($fila['idContacto'], $fila['nombreContacto'], $fila['apellidosContacto'], $fila['emailContacto'], $fila['tfnoContacto']);
        }
    return $contactos;
    }


    public function agregar($contacto) {
        $stmt = $this->conexion->prepare("INSERT INTO agenda (nombreContacto, apellidosContacto, emailContacto, tfnoContacto) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $contacto->nombre, $contacto->apellidos, $contacto->email, $contacto->telefono);
        $stmt->execute();
        $stmt->close();
    }


    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM agenda WHERE idContacto = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }


    public function obtener($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM agenda WHERE idContacto = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $fila = $resultado->fetch_assoc();
        $stmt->close();
        return new Contacto($fila['idContacto'], $fila['nombreContacto'], $fila['apellidosContacto'], $fila['emailContacto'], $fila['tfnoContacto']);
    }


    public function actualizar($contacto) {
        $stmt = $this->conexion->prepare("UPDATE agenda SET nombreContacto = ?, apellidosContacto = ?, emailContacto = ?, tfnoContacto = ? WHERE idContacto = ?");
        $stmt->bind_param("ssssi", $contacto->nombre, $contacto->apellidos, $contacto->email, $contacto->telefono, $contacto->id);
        $stmt->execute();
        $stmt->close();
        }
    }
?>