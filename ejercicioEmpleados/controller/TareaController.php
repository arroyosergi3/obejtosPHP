<?php
require_once 'conexion.php';
require_once '../model/Empleado.php';
class TareaController{
    
    public static function insertar($p) {
        try {
            $conex = new Conexion();
            $conex->query("INSERT INTO tareas (nombre, fechaInicio, fechaFin) values ('$p->nombre' ,'$p->fechaInicio','$p->fechaFin')");
            $filas = $conex->affected_rows;
           
            $conex->close();
            return $filas;
        } catch (Exception $ex) {
            die("ERROR  " . $ex->getMessage());
        }
    }
    
     public static function buscarPorNOmbre($em) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * from tareas WHERE nombre = '$em'");
            if ($result->num_rows) {
                
                $fila = $result->fetch_object();
                
                $p = new Tarea($fila->id, $fila->nombre, $fila->fechaInicio, $fila->fechaFin);
            } else {
                $p = false;
            }
            
            $conex->close();
            echo $p;
            return $p;
        } catch (Exception $ex) {
             die("ERRORR: " . $ex->getMessage());
        }
    }
    
    
    
    public static function buscar($em) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * from tareas WHERE id = '$em'");
            if ($result->num_rows) {
                $fila = $result->fetch_object();
                $p = new Tarea($fila->id, $fila->nombre, $fila->fechaInicio, $fila->fechaFin);
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
            $result = $conex->query("SELECT * FROM tareas");
            if ($result->num_rows) {
                while ($fila = $result->fetch_object()) {
                    $p = new Tarea($fila->id, $fila->nombre, $fila->fechaInicio, $fila->fechaFin);
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