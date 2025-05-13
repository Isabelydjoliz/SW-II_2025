<?php
$url = "https://viacep.com.br/";
$response = file_get_contents($url);
$ceps = json_decode($response, true);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encontre seu CEP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Encontre o seu CEP</h1>
    <div clas="container">
        <?php foreach ($ceps as $cep) : ?>
            <div class="card">
                <h3><?php echo $cep[logradouro][bairro][localidade][uf][estado][regiao]; ?></h3>
                <p><strong>Logradouro:</strong><?php echo $cep['logradouro'][0];?></p>
                <p><strong>Bairro:</strong><?php echo $cep['bairro'][0];?></p>
                <p><strong>Localidade:</strong><?php echo $cep['localidade'][0];?></p>
                <p><strong>UF:</strong><?php echo $cep['uf'][0];?></p>
                <p><strong>Estado:</strong><?php echo $cep['estado'][0];?></p>
                <p><strong>Região:</strong><?php echo $cep['regiao'][0];?></p>
            </div>
        <?php endforeach; ?>
    </div>
    
</body>
</html>