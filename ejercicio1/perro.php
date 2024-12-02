<?php
class Perro extends Mamifero{
     
    
    
    public function ladrar() {
        echo $this->nombre. " guau guau";
    }
    public function hacerTrucos() {
        echo 'Hago truquitos';
    }
}