<?php
$notas = array(
    'Isa' => 9.5,
    'Lele' => 7.0,
    'Carol' => 9.0,
    'Camis' => 6.5,
    'Rapha' => 8.0,
    'Lu' => 8.5
);

$soma = 0;
$totalAlunos = count($notas); 
$maiorNota = 0; 
$alunoMaiorNota = ''; 


foreach ($notas as $nome => $nota) {
    $soma += $nota; 

   
    if ($nota > $maiorNota) {
        $maiorNota = $nota;
        $alunoMaiorNota = $nome; 
    }
}


$media = $soma / $totalAlunos;

echo "A média das notas é: " . $media . "<br>";
echo "A aluna com a maior nota é: " . $alunoMaiorNota . ", com a nota " . $maiorNota . "<br>";
?>
