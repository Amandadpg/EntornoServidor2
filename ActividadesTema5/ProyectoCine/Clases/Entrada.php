<?php
class Entrada
{
    protected int $idEntrada;
    protected int $idCliente;
    protected int $idCine;
    protected string $asiento;

    public function __construct(int $idCliente, int $idCine, string $asiento) {
        $this->idCliente = $idCliente;
        $this->idCine = $idCine;
        $this->asiento = $asiento;
    }

    public function getIdEntrada(): int { return $this->idEntrada; }
    public function setIdEntrada(int $id): self { $this->idEntrada = $id; return $this; }

    public function getIdCliente(): int { return $this->idCliente; }
    public function getIdCine(): int { return $this->idCine; }
    public function getAsiento(): string { return $this->asiento; }
    public function setAsiento(string $asiento): self { $this->asiento = $asiento; return $this; }

    public function toArray(): array {
        return [
            'idEntrada' => $this->idEntrada,
            'idCliente' => $this->idCliente,
            'idCine' => $this->idCine,
            'asiento' => $this->asiento
        ];
    }

    public function insertarBD(\PDO $pdo): bool {
        $stmt = $pdo->prepare("INSERT INTO Entrada (idCliente, idCine, asiento) VALUES (:idCliente, :idCine, :asiento)");
        $stmt->bindParam(':idCliente', $this->idCliente);
        $stmt->bindParam(':idCine', $this->idCine);
        $stmt->bindParam(':asiento', $this->asiento);
        if ($stmt->execute()) {
            $this->idEntrada = $pdo->lastInsertId();
            return true;
        }
        return false;
    }

    public function eliminarBD(\PDO $pdo): bool {
        if ($this->idEntrada) {
            $stmt = $pdo->prepare("DELETE FROM Entrada WHERE idEntrada = :idEntrada");
            $stmt->bindParam(':idEntrada', $this->idEntrada);
            return $stmt->execute();
        }
        return false;
    }

    public function actualizarBD(\PDO $pdo): bool {
        if ($this->idEntrada) {
            $stmt = $pdo->prepare("UPDATE Entrada SET idCliente = :idCliente, idCine = :idCine, asiento = :asiento WHERE idEntrada = :idEntrada");
            $stmt->bindParam(':idCliente', $this->idCliente);
            $stmt->bindParam(':idCine', $this->idCine);
            $stmt->bindParam(':asiento', $this->asiento);
            $stmt->bindParam(':idEntrada', $this->idEntrada);
            return $stmt->execute();
        }
        return false;
    }

    public static function listarBD(\PDO $pdo): array {
        $stmt = $pdo->query("SELECT * FROM Entrada");
        $entradas = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $entrada = new self($row['idCliente'], $row['idCine'], $row['asiento']);
            $entrada->idEntrada = $row['idEntrada'];
            $entradas[] = $entrada;
        }
        return $entradas;
    }
}

?>
