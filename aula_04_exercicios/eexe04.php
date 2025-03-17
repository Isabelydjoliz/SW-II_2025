<?php
$numeros = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);
$pares = 0;
$impares = 0;


foreach ($numeros as $numero) {
    if ($numero % 2 == 0) {
        $pares++; 
    } else {
        $impares++; 
    }
}

echo "Quantidade de números pares: " . $pares . "<br>";
echo "Quantidade de números ímpares: " . $impares . "<br>";
?>