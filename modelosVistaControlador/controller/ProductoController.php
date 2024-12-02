<?php
require_once 'conexion.php';
require_once '../model/producto.php';
class ProductoController{
    
    
    public static function insertar($p) {
        try {
            $conex = new Conexion();
            $conex->query("INSERT INTO producto values ('$p->codigo' ,'$p->nombre',$p->precio)");
            $filas = $conex->affected_rows;
            $conex->close();
            return $filas;
        } catch (Exception $ex) {
            die("ERROR SURMANO " . $ex->getMessage());
        }
    }
    
    public static function buscar($cod) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * from producto WHERE codigo = '$cod'");
            if ($result->num_rows) {
                $fila = $result->fetch_object();
                $p = new Producto($fila->codigo, $fila->nombre, $fila->precio);
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
                    $p = new Producto($fila->codigo, $fila->nombre, $fila->precio);
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

}