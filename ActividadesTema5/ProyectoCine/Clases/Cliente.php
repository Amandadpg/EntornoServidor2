<?php
class Cliente {
    public $idCliente;
    public $usuario;
    public $contraseña;
    public $correo;

    public function __construct($usuario, $contraseña, $correo) {
        $this->usuario = $usuario;
        $this->contraseña = password_hash($contraseña, PASSWORD_DEFAULT); 
        $this->correo = $correo;
    }

    // Getters y setters
    public function getIdCliente(): int { return $this->idCliente; }
    public function setIdCliente(int $id): self { $this->idCliente = $id; return $this; }

    public function getUsuario(): string { return $this->usuario; }
    public function setUsuario(string $usuario): self { $this->usuario = $usuario; return $this; }

    public function getContraseña(): string { return $this->contraseña; }
    public function setContraseña(string $contraseña): self { 
        $this->contraseña = password_hash($contraseña, PASSWORD_DEFAULT);
        return $this; 
    }

    public function getCorreo(): string { return $this->correo; }
    public function setCorreo(string $correo): self { $this->correo = $correo; return $this; }

    // Convertir a array
    public function toArray(): array {
        return [
            "idCliente" => $this->idCliente,
            "usuario" => $this->usuario,
            "correo" => $this->correo
        ];
    }

    // CRUD
    public function insertarBD(\PDO $pdo): bool {
        $stmt = $pdo->prepare("INSERT INTO Cliente (usuario, contraseña, correo) VALUES (:usuario, :contraseña, :correo)");
        $stmt->bindParam(':usuario', $this->usuario);
        $stmt->bindParam(':contraseña', $this->contraseña);
        $stmt->bindParam(':correo', $this->correo);
        if ($stmt->execute()) {
            $this->idCliente = $pdo->lastInsertId();
            return true;
        }
        return false;
    }

    public function eliminarBD(\PDO $pdo): bool {
        if ($this->idCliente) {
            $stmt = $pdo->prepare("DELETE FROM Cliente WHERE idCliente = :idCliente");
            $stmt->bindParam(':idCliente', $this->idCliente);
            return $stmt->execute();
        }
        return false;
    }

    public function actualizarBD(\PDO $pdo): bool {
        if ($this->idCliente) {
            $stmt = $pdo->prepare("UPDATE Cliente SET usuario = :usuario, contraseña = :contraseña, correo = :correo WHERE idCliente = :idCliente");
            $stmt->bindParam(':usuario', $this->usuario);
            $stmt->bindParam(':contraseña', $this->contraseña);
            $stmt->bindParam(':correo', $this->correo);
            $stmt->bindParam(':idCliente', $this->idCliente);
            return $stmt->execute();
        }
        return false;
    }

    public static function buscarBD(\PDO $pdo, int $idCliente): ?Cliente {
        $stmt = $pdo->prepare("SELECT * FROM Cliente WHERE idCliente = :idCliente");
        $stmt->bindParam(':idCliente', $idCliente);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
            $cliente = new self($row['usuario'], $row['contraseña'], $row['correo']);
            $cliente->idCliente = $row['idCliente'];
            return $cliente;
        }
        return null;
    }

    public static function listarBD(\PDO $pdo): array {
        $stmt = $pdo->query("SELECT * FROM Cliente");
        $clientes = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $cliente = new self($row['usuario'], $row['contraseña'], $row['correo']);
            $cliente->idCliente = $row['idCliente'];
            $clientes[] = $cliente;
        }
        return $clientes;
    }
}
?>