<?php

class Coche extends Vehiculo {
    public function quemarRueda() {
        return "¡Quemando rueda con el coche!";
    }
    
    public function getKmRecorridos() {
        return $this->kmRecorridos;
    }
}
