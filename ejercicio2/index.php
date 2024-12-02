<?php
require_once './vehiculo.php';
require_once './bicicleta.php';
require_once './coche.php';

$coche  = new Coche();
echo "vehiculos creados: ".Vehiculo::getVehiculosCreados();
echo '<br>';
$bicicleta = new Bicicleta();
echo "vehiculos creados: ".Vehiculo::getVehiculosCreados();
echo '<br>';
$bicicleta->andar(50);
echo $bicicleta->getKmRecorridos();
echo '<br>';
echo $bicicleta->hacerCaballito();
echo '<br>';
$coche->andar(200);
echo $coche->getKmRecorridos();
echo '<br>';
echo 'KM totales: '. Vehiculo::getKmTotales();