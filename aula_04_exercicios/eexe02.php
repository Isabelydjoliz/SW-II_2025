<?php

$numeros = array(5, 10, 15, 20, 25, 30, 35, 40, 45, 50);
$soma = 0;


foreach ($numeros as $numero) {
    $soma += $numero; 
}

echo "A soma de todos os elementos do array é: " . $soma;
?>