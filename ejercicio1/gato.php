<?php
class Gato extends Mamifero{
    protected $raza;
    public function __construct($nom, $eda, $colorP,$raza) {
        parent::__construct($nom, $eda, $colorP);
        $this->raza =  $raza;
    }
    
    public function maullar() {
        echo $this->nombre. " mi gato dice uy uy uy";
    }
    public function mostrarRaza() {
        echo $this->nombre. " y mi raza es ". $this->raza;
    }
}