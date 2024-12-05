<?php

class JuegosController{
    public static function insertar($p) {
        try {
            $conex = new Conexion();
            $conex->query("INSERT INTO juegos values ('$p->Codigo' ,'$p->Nombre_juego','$p->Nombre_consola', '$p->Anno', $p->Precio,'$p->Alguilado', '$p->Imagen', '$p->descripcion')");
            $filas = $conex->affected_rows;
           
            $conex->close();
            return $filas;
        } catch (Exception $ex) {
            die("ERROR  " . $ex->getMessage());
        }
    }
}
