<?php
class Empleado {

    private $email;
    private $pass;
    private $nombre;
    private $salario;
    private $dep;


    public function __construct($em, $ps, $no, $sa, $de) {
        $this->email = $em;
        $this->pass = $ps;
        $this->nombre = $no;
        $this->salario = $sa;
        $this->dep = $de;
    }

    public function __get(string $param): mixed {
        return $this->$param;
    }

    public function __set(string $param, mixed $value): void {
        $this->$param = $value;
    }

    public function __toString(): string {
        return "Email: $this->email - Nombre: $this->nombre";
    }
}
