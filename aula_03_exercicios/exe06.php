<?php

function geranumale() {
    $num = [];
    for ($i = 0; $i < 10; $i++) {
        $num[] = rand(1, 100);
    }
    return $num;
}

$numale = geranumale();
echo "Números aleatórios gerados: " . implode(", ", $numale) . "<br>";


?>