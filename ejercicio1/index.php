<?php

require_once './animal.php';
require_once './ave.php';
require_once './mamifero.php';
require_once './perro.php';
require_once './gato.php';
require_once './canario.php';
require_once './pinguino.php';
require_once './lagarto.php';

$gato = new Gato("Misifufu", 3, "Marron", "europeo");

echo $gato->comer(). "<br>";
echo $gato->dormir(). "<br>";

echo $gato->parir(). "<br>";
echo $gato->mostrarColorPelo(). "<br>";

echo $gato->maullar(). "<br>";
echo $gato->mostrarRaza(). "<br>";

echo '=========================<br>';
$perro = new Perro("Mico", 4, "beige");

echo $perro->comer(). "<br>";
echo $perro->dormir(). "<br>";

echo $perro->parir(). "<br>";
echo $perro->mostrarColorPelo(). "<br>";

echo $perro->ladrar(). "<br>";
echo $perro->hacerTrucos(). "<br>";


echo '=========================<br>';
$canario = new Canario("Piolin", 5, "Naranja");

echo $canario->comer(). "<br>";
echo $canario->dormir(). "<br>";

echo $canario->ponerHuevo(). "<br>";
echo $canario->mostrarColorPlumas(). "<br>";

echo $canario->cantar(). "<br>";
echo $canario->morir(). "<br>";


echo '=========================<br>';
$pinguino = new Pinguino("Tom", 3, "Gris");

echo $pinguino->comer()."<br>";
echo $pinguino->dormir()."<br>";

echo $pinguino->ponerHuevo()."<br>";
echo $pinguino->mostrarColorPlumas()."<br>";


echo $pinguino->nadar()."<br>";
echo $pinguino->criarHuevos()."<br>";

echo '=========================<br>';
$lagarto = new Lagarto("La Gartija", 5);
echo $lagarto->comer().'<br>';
echo $lagarto->dormir().'<br>';
        
echo $lagarto->chirriar().'<br>';
