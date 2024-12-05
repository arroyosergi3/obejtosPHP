<?php

class Juego {

    private $Codigo;
    private $Nombre_juego;
    private $Nombre_consola;
    private $Anno;
    private $Precio;
    private $Alguilado;
    private $Imagen;
    private $descripcion;

    
    public function __construct($cod, $nJuego, $nConsola, $an, $pre, $al, $im, $des) {
        $this->Codigo = $cod;
        $this->Nombre_juego = $nJuego;
        $this->Nombre_consola = $nConsola;
        $this->Anno = $an;
        $this->Precio = $pre;
        $this->Alguilado = $al;
        $this->Imagen = $im;
        $this->descripcion = $des;
        
        
        
    }

    public function __toString(): string {
        return "Juego[Codigo=" . $this->Codigo
                . ", Nombre_juego=" . $this->Nombre_juego
                . ", Nombre_consola=" . $this->Nombre_consola
                . ", Anno=" . $this->Anno
                . ", Precio=" . $this->Precio
                . ", Alguilado=" . $this->Alguilado
                . ", Imagen=" . $this->Imagen
                . ", descripcion=" . $this->descripcion
                . "]";
    }

        public function __get(string $param): mixed {
        return $this->$param;
    }

    public function __set(string $param, mixed $value): void {
        $this->$param = $value;
    }
}
