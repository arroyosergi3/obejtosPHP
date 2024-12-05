<?php
class Cliente{
      private $DNI;
    private $Nombre;
    private $Apellidos;
    private $Direccion;
    private $Localidad;
    private $Clave;
    private $Tipo;


    public function __construct($dni, $no, $ap, $di,$loc,$cla,$tip ) {
        $this->DNI = $dni;
        $this->Nombre = $no;
        $this->Apellidos = $ap;
        $this->Direccion = $di;
        $this->Localidad = $loc;
        $this->Clave = $cla;
        $this->Tipo = $tip;
    }

    public function __get(string $param): mixed {
        return $this->$param;
    }

    public function __set(string $param, mixed $value): void {
        $this->$param = $value;
    }

    public function __toString(): string {
        return "Cliente[DNI=" . $this->DNI
                . ", Nombre=" . $this->Nombre
                . ", Apellidos=" . $this->Apellidos
                . ", Direccion=" . $this->Direccion
                . ", Localidad=" . $this->Localidad
                . ", Clave=" . $this->Clave
                . ", Tipo=" . $this->Tipo
                . "]";
    }

}

