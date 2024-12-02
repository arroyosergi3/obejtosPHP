<?php
class Producto {

    private $codigo;
    private $nombre;
    private $precio;



    public function nuevoProducto($cod, $nom, $pre) {
        $this->codigo = $cod;
        $this->nombre = $nom;
        $this->precio = $pre;
    }

    public function __construct($cod = "", $nom = "", $pre = 0) {
        $this->codigo = $cod;
        $this->nombre = $nom;
        $this->precio = $pre;
    }

    public function __get(string $param): mixed {
        return $this->$param;
    }

    public function __set(string $param, mixed $value): void {
        $this->$param = $value;
    }

    public function __toString(): string {
        return "Codigo: $this->codigo - Nombre: $this->nombre - Precio: $this->precio";
    }
}
