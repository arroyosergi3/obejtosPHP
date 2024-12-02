<?php
class Bicicleta extends Vehiculo {
    
    public function hacerCaballito() {
        return "¡Haciendo el caballito con la bicicleta!";
    }
    public function getKmRecorridos() {
        return $this->kmRecorridos;
    }
}

