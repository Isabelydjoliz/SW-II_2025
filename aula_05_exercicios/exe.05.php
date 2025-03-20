<?php

$produtos = 'produtos.json';
$json = file_get_contents($produtos);
$conteudo = json_decode($json, true);

$produtoremover = 'creme';

if (is_array($conteudo)) {
   
    foreach ($conteudo as $key => $conteudo) {
        if ($conteudo['nome'] === $produtoremover) {
            unset($conteudo[$key]); 
            break; 
        }
    }


    file_put_contents($produtos, json_encode(array_values($conteudo), JSON_PRETTY_PRINT));

    echo "Produto removido com sucesso!";
} else {
    echo "Erro ao carregar os produtos do arquivo JSON.";
}
?>