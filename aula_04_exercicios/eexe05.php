<?php

$notas = array(
    'Isa' => 9.5,
    'Lele' => 7.0,
    'Carol' => 9.0,
    'Camis' => 7.5,
    'Rapha' => 8.0,
    'Lu' => 8.5
);
$soma = 0;
$totalAlunos = count($notas); 

foreach ($notas as $nome => $nota) {
    $soma += $nota; 
}
$media = $soma / $totalAlunos;

echo "A média das notas é: " . $media . "<br>";
?>