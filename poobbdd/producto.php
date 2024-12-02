<?php

require_once './conexion.php';

class Producto {

    private $codigo;
    private $nombre;
    private $precio;

    public static function buscar($cod) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * from producto WHERE codigo = '$cod'");
            if ($result->num_rows) {
                $fila = $result->fetch_object();
                $p = new self($fila->codigo, $fila->nombre, $fila->precio);
            } else {
                $p = false;
            }
            
            $conex->close();
            return $p;
        } catch (Exception $ex) {
             die("ERRORR: " . $ex->getMessage());
        }
    }

    public static function getAll() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM producto");
            if ($result->num_rows) {
                while ($fila = $result->fetch_object()) {
                    $p = new self($fila->codigo, $fila->nombre, $fila->precio);
                    $productos[] = $p;
                }
                return $productos;
            } else {
                $productos = false;
            }
            $conex->close();
            return $productos;
        } catch (Exception $ex) {
            die("ERRORR: " . $ex->getMessage());
        }
    }

    public function insertar() {
        try {
            $conex = new Conexion();
            $conex->query("INSERT INTO producto values ('$this->codigo' ,'$this->nombre',$this->precio)");
            $filas = $conex->affected_rows;
            $conex->close();
            return $filas;
        } catch (Exception $ex) {
            die("ERROR SURMANO " . $ex->getMessage());
        }
    }

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
