<?php
class Ave extends Animal{
     protected $colorPlumas;
    
    public function __construct($nombre,  $edad, $colorP) {
        parent::__construct($nombre, $edad);
        $this->colorPlumas = $colorP;
    }
    
    public function ponerHuevo() {
        echo $this->nombre. " es un ave y esta poniendo un huevo";
    }
    
    public function mostrarColorPlumas() {
        echo 'Soy un ave y mi color de plumas es '. $this->colorPlumas;
    }
}
