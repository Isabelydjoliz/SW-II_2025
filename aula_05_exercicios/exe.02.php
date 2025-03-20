<?php
$usuarios = file_get_contents("usuarios.json");
$dados = json_decode($usuarios, true);

echo $dados[0]["nome"] . " -> " . $dados[0]["email"] . "<br>";
echo $dados[1]["nome"] . " -> " . $dados[1]["email"] . "<br>";
echo $dados[2]["nome"] . " -> " . $dados[2]["email"];
?>