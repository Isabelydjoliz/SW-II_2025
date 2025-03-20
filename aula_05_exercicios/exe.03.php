<?php

$produtos = 'produtos.json';
$json = file_get_contents($produtos);
$array = json_decode($json, true);


$novoproduto = [
    "nome" => "Esfoliante",
    "preço" => 27,50,
    "quantidade" => 120
];

$array[] = $novoproduto; 

$jsonatual = json_encode($array);
file_put_contents($produtos, $jsonatual);



?>