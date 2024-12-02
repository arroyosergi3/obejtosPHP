<?php

class Vehiculo {

    private static $vehiculosCreados = 0;
    private static $kmTotales = 0;

    protected $kmRecorridos;

    public function __construct() {
        $this->kmRecorridos = 0;
        self::$vehiculosCreados++;
    }
    
     public static function getVehiculosCreados() {
        return self::$vehiculosCreados;
    }

    public static function getKmTotales() {
        return self::$kmTotales;
    }

    // Método de instancia
    public function getKmRecorridos() {
        return $this->kmRecorridos;
    }

    public function andar($km) {
        $this->kmRecorridos += $km;
        self::$kmTotales += $km;
    }
}


