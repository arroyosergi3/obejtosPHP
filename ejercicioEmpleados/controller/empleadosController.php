<?php
require_once 'conexion.php';
require_once '../model/Empleado.php';
class empleadosController{
    
    
    
    
    public static function buscar($em) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * from empleados WHERE email = '$em'");
            if ($result->num_rows) {
                $fila = $result->fetch_object();
                $p = new Empleado($fila->email, $fila->pass, $fila->nombre, $fila->salario, $fila->dep);
            } else {
                $p = false;
            }
            
            $conex->close();
            return $p;
        } catch (Exception $ex) {
             die("ERRORR: " . $ex->getMessage());
        }
    }

    public static function getAllconDep($dep) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM empleados where dep = '$dep'");
            if ($result->num_rows) {
                while ($fila = $result->fetch_object()) {
                    $p = new Empleado($fila->email, $fila->pass, $fila->nombre, $fila->salario, $fila->dep);
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
    
    public static function getAll() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM empleados");
            if ($result->num_rows) {
                while ($fila = $result->fetch_object()) {
                    $p = new Empleado($fila->email, $fila->pass, $fila->nombre, $fila->salario, $fila->dep);
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