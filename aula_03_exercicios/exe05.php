<?php

function somaArray($numeros) {
    return array_sum($numeros);
}

$arrayNumeros = [1, 2, 3, 4, 5];
echo "A soma dos elementos do array é: " . somaArray($arrayNumeros) . "<br>";
?>