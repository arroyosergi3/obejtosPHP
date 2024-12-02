<?php
require_once './dadoPoker.php';
$dados = []; // Array para almacenar los dados
$numeroDeDados = 5;

echo "Tirando los dados de póker...";

// Creamos 5 objetos DadoPoker
for ($i = 0; $i < $numeroDeDados; $i++) {
    $dados[] = new DadoPoker();
    $dados[$i]->tira();  // Tiramos el dado
    echo "Dado " . ($i + 1) . " ha salido con: " . $dados[$i]->nombreFigura() . "<br>";
}

// Mostramos el total de tiradas entre todos los dados
echo "Tiradas totales entre todos los dados: " . DadoPoker::getTiradasTotales();
