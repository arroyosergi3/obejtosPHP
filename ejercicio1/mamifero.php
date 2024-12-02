<?php
class Mamifero extends Animal{
    protected $colorPelo;
    
    public function __construct($nom,  $eda, $colorP) {
        parent::__construct($nom, $eda);
        $this->colorPelo = $colorP;
    }
    
    public function parir() {
        echo $this->nombre. " es un mamifero y esta pariendo";
    }
    
    public function mostrarColorPelo() {
        echo 'Soy un mamífero y mi color de pelo es '. $this->colorPelo;
    }
}