<?php
require_once 'conexion.php';
require_once '../model/Cliente.php';

class ClienteController{
     public static function insertar($p) {
        try {
            $conex = new Conexion();
            $conex->query("INSERT INTO cliente values ('$p->DNI' ,'$p->Nombre','$p->Apellidos', '$p->Direccion', '$p->Localidad','$p->Clave', '$p->Tipo')");
            $filas = $conex->affected_rows;
           
            $conex->close();
            return $filas;
        } catch (Exception $ex) {
            die("ERROR  " . $ex->getMessage());
        }
    }
}