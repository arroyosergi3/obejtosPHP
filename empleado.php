<?php
require_once './persona.php';
class Empleado extends Persona{
    private $salario;
    
    public function __construct($nom = "Antonio", $ape = "Rosa", $ed = 43, $sal = 1000) {
        parent::__construct($nom, $ape, $ed);
        $this->salario = $sal;
    }
    public function __toString(): string {
        return parent::__toString(). " Mi salario es ".$this->salario;
    }
    public function __get(String $name) : mixed {
        return $this->$name;
    }
    
    public function __set(String $name, mixed $value):void {
        $this->$name = $value;
    }
}