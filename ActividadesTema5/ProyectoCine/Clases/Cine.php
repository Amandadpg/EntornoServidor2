<?php
class Cine {
    public $idCine;
    public $nombre;
    public $poblacion;

    public function __construct($nombre, $poblacion) {
        $this->nombre = $nombre;
        $this->poblacion = $poblacion;
    }

    public function getIdCine(): int { return $this->idCine; }
    public function setIdCine(int $id): self { $this->idCine = $id; return $this; }

    public function getNombre(): string { return $this->nombre; }
    public function getPoblacion(): string { return $this->poblacion; }

    public static function toArray(\PDO $pdo): array {
        $stmt = $pdo->query("SELECT * FROM Cine");
        $cines = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $cines[] = [
                'idCine' => $row['idCine'],
                'nombre' => $row['nombre'],
                'poblacion' => $row['poblacion']
            ];
        }
        return $cines;
    }
}
?>
