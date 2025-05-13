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
    <form method="GET" class="form-busca" >
        <iput type="text" name="busca" placeholder="Digite o seu CEP" value="<?php echo htmlspecialchars($busca); ?>">
        <button type="submit">Buscar</button> 
    </form>
    <div class="container">
        <?php if (empty($paises)): ?>
            <p>Nenhum país encontrado.</p>
        <?php else: ?>
            <?php foreach ($ceps as $cep): ?>
                <div class="card">
                   <h3><?php echo ?></h3> 
                </div>
</body>
</html>