<?php
  $produtos = [
    [
     "nome" => "Creme",
     "preço" => 23,50,
     "quantidade" => 200
    ],
    [
        "nome" => "Perfume",
        "preço" => 120,00,
        "quantidade" => 120
    ],
    [
        "nome" => "Sabonete",
        "preço" => 15,00,
        "quantidade" => 180
    ],
  ];

 $json = json_encode($produtos);
 file_put_contents("produtos.json", $json);

?>