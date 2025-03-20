<?php //nao entendi então esquisei e coloquei um aler para inserir o email

if (!isset($_GET['email'])) {
    echo '<script>
        var email = prompt("Digite seu email:");
        if (email) {
            window.location.href = window.location.pathname + "?email=" + encodeURIComponent(email);
        }
    </script>';
    exit;
}


$emailBuscado = $_GET['email'];


$arquivo = 'usuarios.json';
$json = file_get_contents($arquivo);
$usuarios = json_decode($json, true);


$usuarioEncontrado = null;

foreach ($usuarios as $usuario) {
    if ($usuario["email"] === $emailBuscado) {
        $usuarioEncontrado = $usuario;
        break;
    }
}

if ($usuarioEncontrado) {
    echo "<script>alert('Usuário encontrado:\\nID: " . $usuarioEncontrado["id"] . "\\nNome: " . $usuarioEncontrado["nome"] . "\\nEmail: " . $usuarioEncontrado["email"] . "');</script>";
} else {
    echo "<script>alert('Nenhum usuário encontrado com esse email.');</script>";
}
?>
