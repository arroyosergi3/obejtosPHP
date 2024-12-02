<?php
class Zona {
    private $nombre_zona;
    private $plazas_totales;
    private $plazas_restantes;

    public function __construct($nombre_zona, $plazas_totales) {
        $this->nombre_zona = $nombre_zona;
        $this->plazas_totales = $plazas_totales;
        $this->plazas_restantes = $plazas_totales;
    }

    public function getNombreZona() {
        return $this->nombre_zona;
    }
    public function getPlazasTotales() {
        return $this->plazas_totales;
    }
    public function getPlazasRestantes() {
        return $this->plazas_restantes;
    }

    public function vender($cantidad) {
        if ($cantidad <= $this->plazas_restantes) {
            $this->plazas_restantes -= $cantidad;
            return true;
        } else {
            return false;
        }
    }
    public function toString() {
        return "Zona: " . $this->nombre_zona . " - Entradas disponibles: " . $this->plazas_restantes . " de " . $this->plazas_totales;
    }
}
?>
