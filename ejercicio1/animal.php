<?php
 class Animal {
       protected $nombre;
       protected $edad;
       
       public function __construct($nombre, $edad) {
           $this->nombre = $nombre;
           $this->edad = $edad;
       }
       
       public function comer() {
           echo $this->nombre. " esta comiendo";
       }
       public function dormir() {
           echo $this->nombre. " esta durmiendo";
       }
       
       public function __get(string $name): mixed {
         return $this-> $name;  
       }
       
        public function __set(String $name, mixed $value):void {
        $this->$name = $value;
    }
    
 }
