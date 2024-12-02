<?php
class Persona{
    public $nombre;
    public $apellidos;
    public $edad;
    public static $numPer = 0;
    
    public function __construct($nom = "Antonio", $ape = "Rosa", $ed = 43) {
        $this->nombre = $nom;
        $this->apellidos = $ape;
        $this->edad = $ed;
        self::$numPer++;
    }
    
    
    public function __call(string $metodo,array $argumentos):mixed {
        if ($metodo == "modificar"){
            if (count($argumentos) == 1){
                $this->nombre =  $argumentos[0];
            }
            if (count($argumentos) == 2){
                $this->nombre =  $argumentos[0];
                 $this->apellidos =  $argumentos[1];
            }
            if (count($argumentos) == 3){
                $this->nombre =  $argumentos[0];
                $this->apellidos =  $argumentos[1];
                $this->edad =  $argumentos[2];
            }
        }
        
        if ($metodo == "calcular"){
            
        }
    }
    
    public function sumaEdad($n){
        $this->edad += $n;
    }
    
    public static function getNumPerson() {
        return self::$numPer;
    }
    
    public function __destruct() {
        self::$numPer--;
    }
    
    

    public static function eliminarPersona() {
        self::$numPer--;
        
    }
    
    
    public function __clone() :void {
        self::$numPer++;
        $this->edad = 0;
    }
  
    

    







    public function __get(String $name) : mixed {
        return $this->$name;
    }
    
    public function __set(String $name, mixed $value):void {
        $this->$name = $value;
    }
    public function __toString(): string {
        return "Hola, me llamo ".$this->nombre. " ".$this->apellidos." y tengo ".$this->edad." años";
    }

}