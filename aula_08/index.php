<?php
$cepInput = isset($_GET['cep']) ? trim($_GET['cep']) : '';
$mensagem = '';
$dadosCep = null;
$regiaoBrasil = '';

function obterRegiao($uf) {
    $regioes = [
        'Norte' => ['AC', 'AP', 'AM', 'PA', 'RO', 'RR', 'TO'],
        'Nordeste' => ['AL', 'BA', 'CE', 'MA', 'PB', 'PE', 'PI', 'RN', 'SE'],
        'Centro-Oeste' => ['DF', 'GO', 'MT', 'MS'],
        'Sudeste' => ['ES', 'MG', 'RJ', 'SP'],
        'Sul' => ['PR', 'RS', 'SC']
    ];

    foreach ($regioes as $nome => $ufs) {
        if (in_array($uf, $ufs)) {
            return $nome;
        }
    }

    return 'Desconhecida';
}

if (!empty($cepInput)) {
    if (!preg_match('/^\d{8}$/', $cepInput)) {
        $mensagem = "Por favor, digite um CEP válido com 8 números.";
    } else {
        $api = "https://viacep.com.br/ws/{$cepInput}/json/";
        $resposta = @file_get_contents($api);
        $dadosCep = json_decode($resposta, true);

        if (!empty($dadosCep['erro'])) {
            $mensagem = "CEP não encontrado.";
        } else {
            $regiaoBrasil = obterRegiao($dadosCep['uf']);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Consulta CEP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="container">
        <h1>Buscar Endereço via CEP</h1>

        <form method="get" class="formulario">
    <input 
        type="text" 
        name="cep" 
        maxlength="8" 
        placeholder="Ex: 01001000" 
        value="<?php echo htmlspecialchars($cepInput); ?>" 
        required
        inputmode="numeric"
        pattern="\d*"
        oninput="this.value = this.value.replace(/[^0-9]/g, '');"
    >
    <button type="submit">Consultar</button>
</form>

        <?php if ($mensagem): ?>
            <div class="mensagem-erro"><?php echo $mensagem; ?></div>
        <?php elseif ($dadosCep): ?>
            <div class="caixa-dados">
                <h3>Resultado para o CEP <?php echo htmlspecialchars($cepInput); ?></h3>
                <p><strong>Logradouro:</strong> <?php echo $dadosCep['logradouro'] ?: 'Não informado'; ?></p>
                <p><strong>Bairro:</strong> <?php echo $dadosCep['bairro'] ?: 'Não informado'; ?></p>
                <p><strong>Cidade:</strong> <?php echo $dadosCep['localidade']; ?></p>
                <p><strong>UF:</strong> <?php echo $dadosCep['uf']; ?></p>
                <p><strong>Região:</strong> <?php echo $regiaoBrasil; ?></p>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>
