<?php
require_once 'conexion.php';
require_once '../model/Empleado.php';
class RealizaController{
    
    public static function insertar($r) {
        try {
            $conex = new Conexion();
            $conex->query("INSERT INTO realiza  values ('$r->email' ,'$r->idTarea','$r->horas')");
            $filas = $conex->affected_rows;
            $conex->close();
            return $filas;
        } catch (Exception $ex) {
            die("ERROR  " . $ex->getMessage());
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