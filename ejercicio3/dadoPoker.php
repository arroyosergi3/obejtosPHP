<?php

class DadoPoker {
    // Atributos estáticos
    private static $tiradasTotales = 0;  // Contador de tiradas totales

    // Atributo para almacenar el resultado de la última tirada
    private $resultado;

    // Los valores posibles de las caras del dado
    private static $figuras = ["As", "K", "Q", "J", "7", "8"];

    // Método para tirar el dado
    public function tira() {
        // Generamos un número aleatorio entre 0 y 5
        $indice = rand(0, 5);
        
        // Asignamos el valor correspondiente a la cara del dado
        $this->resultado = self::$figuras[$indice];
        
        // Incrementamos el contador de tiradas totales
        self::$tiradasTotales++;
    }

    // Método para obtener el nombre de la figura de la última tirada
    public function nombreFigura() {
        return $this->resultado;
    }

    // Método estático para obtener las tiradas totales entre todos los dados
    public static function getTiradasTotales() {
        return self::$tiradasTotales;
    }
}
