<?php


function conectarBD() {
$host = "localhost";
$usuario = "root";
$password = "";
$bd = "m_agenda";


$conexion = new mysqli($host, $usuario, $password, $bd);


if ($conexion->connect_error) {
die("Error de conexión: " . $conexion->connect_error);
}


$conexion->set_charset("utf8");
return $conexion;
}


function listarContactos() {
$conexion = conectarBD();
$sql = "SELECT * FROM agenda ORDER BY nombreContacto";
$resultado = $conexion->query($sql);
$conexion->close();
return $resultado;
}


function agregarContacto($nombre, $apellidos, $email, $telefono) {
$conexion = conectarBD();


$stmt = $conexion->prepare(
"INSERT INTO agenda (nombreContacto, apellidosContacto, emailContacto, tfnoContacto)
VALUES (?, ?, ?, ?)"
);


$stmt->bind_param("ssss", $nombre, $apellidos, $email, $telefono);
$stmt->execute();


$stmt->close();
$conexion->close();
}


function eliminarContacto($id) {
$conexion = conectarBD();


$stmt = $conexion->prepare("DELETE FROM agenda WHERE idContacto = ?");
$stmt->bind_param("i", $id);
$stmt->execute();


$stmt->close();
$conexion->close();
}
?>