<?php
class Conexion extends mysqli{
    private $host = "localhost";
    private $usu = "dwes";
    private $pass = "abc123.";
    private $bd = "producto";
    
    public function __construct() {
        parent::__construct($this->host, $this->usu, $this->pass, $this->bd);
    }
    
    public function __get(string $param): mixed {
        return $this->$param;
    }
    
    public function __set(string $param, mixed $value): void {
        $this->$param = $value;
    }
}