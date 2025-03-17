<?php

$pessoa = array(
    'nome' => 'Isabely',
    'idade' => 17,
    'cidade' => 'Ribeirão Pires'
);

$pessoa['profissao'] = 'Desenvolvedora';

$amigos = array('Carol', 'Lele', 'Camis', 'Rapha', 'Lu');

$dados = array(
    'pessoa' => $pessoa,
    'amigos' => $amigos
);

print_r($dados);
?>