<?php
class Canario extends Ave{
     public function cantar() {
        echo "$this->nombre está cantando pio pio.\n";
    }
    
    public function morir() {
        echo "$this->nombre y me muero";
    }
    
}
