<?php
//CABEÇALHO
header("Content-Type: application/json; charset=UTF-8");  // <- DEFINE O TIPO DE RESPOSTA

$metodo = $_SERVER['REQUEST_METHOD'];

// RECUPERA O ARQUIVO JSON NA MESMA PASTA DO PROJETO
$arquivo = 'usuarios.json';

// VERIFICA SE O ARQUIVO EXISTE, CASO CONTRARIO CRIA UM ARRAY VAZIO
if (!file_exists($arquivo)) {
    file_put_contents($arquivo, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

// LE O CONTEUDO DO ARQUIVO JSON
$usuarios = json_decode(file_get_contents($arquivo), true);

switch ($metodo) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $usuario_encontrado = null;

            foreach ($usuarios as $usuario) {
                if ($usuario['id'] === $id) {
                    $usuario_encontrado = $usuario;
                    break;
                }
            }

            if ($usuario_encontrado) {
                echo json_encode($usuario_encontrado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            } else {
                http_response_code(404);
                echo json_encode(["erro" => "Usuário não encontrado."], JSON_UNESCAPED_UNICODE);
            }
        } else {
            echo json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
        break;

    case 'POST':
        $dados = json_decode(file_get_contents('php://input'), true);

        if (!isset($dados["nome"]) || !isset($dados["email"])) {
            http_response_code(400);
            echo json_encode(["erro" => "NOME E EMAIL SÃO OBRIGATÓRIOS."], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $novo_id = 1;
        if (!empty($usuarios)) {
            $ids = array_column($usuarios, 'id');
            $novo_id = max($ids) + 1;
        }

        $novoUsuario = [
            "id" => $novo_id,
            "nome" => $dados["nome"],
            "email" => $dados["email"]
        ];

        $usuarios[] = $novoUsuario;
        file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        echo json_encode([
            'mensagem' => 'Usuário inserido com sucesso',
            'usuarios' => $novoUsuario
        ], JSON_UNESCAPED_UNICODE);
        break;

    case 'PUT':
        $dados = json_decode(file_get_contents('php://input'), true);

        if (!isset($dados['id']) || !isset($dados['nome']) || !isset($dados['email'])) {
            http_response_code(400);
            echo json_encode(["erro" => "ID, NOME e EMAIL são obrigatórios para atualização"], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $idParaAtualizar = intval($dados['id']);
        $usuarioAtualizado = false;

        foreach ($usuarios as &$usuario) {
            if ($usuario['id'] === $idParaAtualizar) {
                $usuario['nome'] = $dados['nome'];
                $usuario['email'] = $dados['email'];
                $usuarioAtualizado = true;
                break;
            }
        }

        if ($usuarioAtualizado) {
            file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            echo json_encode(["mensagem" => "Usuário atualizado com sucesso"], JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(404);
            echo json_encode(["erro" => "Usuário não encontrado"], JSON_UNESCAPED_UNICODE);
        }
        break;
    case 'DELETE':
        // Lê os dados do corpo da requisição
        $dados = json_decode(file_get_contents('php://input'), true);

        if (!isset($dados['id'])) {
            http_response_code(400);
            echo json_encode(['erro' => 'ID é obrigatório para exclusão'], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $idParaExcluir = intval($dados['id']);
        $usuarioEncontrado = false;

        // Remove o usuário com o ID informado
        foreach ($usuarios as $index => $usuario) {
            if ($usuario['id'] === $idParaExcluir) {
                $usuarioEncontrado = true;
                unset($usuarios[$index]);
                $usuarios = array_values($usuarios); // Reorganiza os índices
                file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                echo json_encode(['mensagem' => 'Usuário excluído com sucesso'], JSON_UNESCAPED_UNICODE);
                break;
            }
        }

        if (!$usuarioEncontrado) {
            http_response_code(404);
            echo json_encode(['erro' => 'Usuário não encontrado'], JSON_UNESCAPED_UNICODE);
        }

        break;

    default:
        http_response_code(405);
        echo json_encode(['erro' => 'Método não permitido'], JSON_UNESCAPED_UNICODE);
        break;
}
