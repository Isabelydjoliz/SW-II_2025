<?php

$numeros = array(12, 5, 8, 20, 3, 15, 7, 10);
$maior = $numeros[0];
$menor = $numeros[0];

foreach ($numeros as $numero) {
    if ($numero > $maior) {
        $maior = $numero;
    }
    if ($numero < $menor) {
        $menor = $numero; 
    }
}

echo "O menor valor do array é: " . $menor . "<br>";
echo "O maior valor do array é: " . $maior . "<br>";


?>