<?php
require_once 'conexion.php';
require_once '../model/Realiza.php';
class RealizaController{
    
    public static function update($horas, $email,$id) {
        try {
            $conex = new Conexion();
            $conex->query("UPDATE realiza set horas = $horas where email = '$email' && idTarea= $id");
            $filas = $conex->affected_rows;
           
            $conex->close();
            return $filas;
        } catch (Exception $ex) {
            die("ERROR  " . $ex->getMessage());
        }
    }
    
    
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
    
    public static function buscarPorEmail($em) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * from realiza WHERE email = '$em'");
            if ($result->num_rows) {
                while ($fila = $result->fetch_object()) {
                    $p = new Realiza($fila->email, $fila->idTarea, $fila->horas);
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
    
    
    
    public static function buscar($em) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * from realiza WHERE idTarea = '$em'");
            if ($result->num_rows) {
                $fila = $result->fetch_object();
                $p = new Realiza($fila->email, $fila->idTarea, $fila->horas);
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