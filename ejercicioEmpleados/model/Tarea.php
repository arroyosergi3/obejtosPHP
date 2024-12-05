<?php
class Tarea {

    private $id;
    private $nombre;
    private $fechaInicio;
    private $fechaFin;

    public function __construct( $no, $fi, $ff) {
        //$this->id = $id;
        $this->nombre = $no;
        $this->fechaInicio = $fi;
        $this->fechaFin = $ff;
    }

    public function nuevaTarea($id, $nom, $fi, $ff) {
        $this->id = $id;
        $this->nombre = $nom;
        $this->fechaInicio = $fi;
        $this->fechaFin = $ff;
    }
    public function __get(string $param): mixed {
        return $this->$param;
    }

    public function __set(string $param, mixed $value): void {
        $this->$param = $value;
    }

    public function __toString(): string {
        return "ID: $this->id - Nombre: $this->nombre";
    }
}
