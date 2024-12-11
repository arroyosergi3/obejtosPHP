<?php
require_once 'conexion.php';

class JuegosController {

    
    
   public static function delete($em) {
    try {
        $conex = new Conexion();
        $result = $conex->query("DELETE FROM juegos WHERE Codigo = '$em'");
        
        if ($result === false) { // Verifica si la consulta falló
            throw new Exception("Error al ejecutar la consulta: " . $conex->error);
        }

        // Si la consulta se ejecutó correctamente, verifica si afectó filas
        if ($conex->affected_rows > 0) { // `affected_rows` verifica si filas fueron modificadas/eliminadas
            $p = true;
        } else {
            $p = false;
        }
        
        $conex->close();
        return $p;
    } catch (Exception $ex) {
        die("ERROR: " . $ex->getMessage());
    }
}

    
     public static function buscar($em) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * from juegos WHERE Codigo = '$em'");
            if ($result->num_rows) {
                $fila = $result->fetch_object();
                    $p = new Juego($fila->Codigo, $fila->Nombre_juego, $fila->Nombre_consola, $fila->Anno, $fila->Precio, $fila->Alguilado, $fila->Imagen, $fila->descripcion);
            } else {
                $p = false;
            }
            
            $conex->close();
            return $p;
        } catch (Exception $ex) {
             die("ERRORR: " . $ex->getMessage());
        }
    }
    
     public static function update($nom, $con , $pre, $anio ,$cod) {
        try {
            $conex = new Conexion();
            $conex->query("UPDATE juegos set Nombre_juego = '$nom', Nombre_consola= '$con', Precio = $pre , Anno = $anio  where Codigo = '$cod' ");
            $filas = $conex->affected_rows;
           
            $conex->close();
            return $filas;
        } catch (Exception $ex) {
            die("ERROR  " . $ex->getMessage());
        }
    }
    
    
    public static function getAll() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos");
            if ($result->num_rows) {
                while ($fila = $result->fetch_object()) {
                    $p = new Juego($fila->Codigo, $fila->Nombre_juego, $fila->Nombre_consola, $fila->Anno, $fila->Precio, $fila->Alguilado, $fila->Imagen, $fila->descripcion);
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
