<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

$dados = file_get_contents('php://input');
$dados = json_decode($dados, true);

include "db.php";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!empty($dados['nome']) && !empty($dados['autor']) && !empty($dados['editora']) && !empty($dados['paginas']) && !empty($dados['ano']) && !empty($dados['quantidade'])) {
        // Conexão com o banco de dados
        $connection = conectar();

        $nome = $connection->real_escape_string($dados['nome']);
        $autor = $connection->real_escape_string($dados['autor']);
        $editora = $connection->real_escape_string($dados['editora']);
        $paginas = $connection->real_escape_string($dados['paginas']);
        $ano = $connection->real_escape_string($dados['ano']);
        $quantidade = $connection->real_escape_string($dados['quantidade']);

        $insertDados = "INSERT INTO livros (nome, autor, editora, paginas, ano_da_publicacao, quantidade) VALUES ('$nome', '$autor', '$editora', '$paginas', '$ano', '$quantidade')";

        if ($connection->query($insertDados) === TRUE) {
            echo json_encode(["mensagem" => "Livro cadastrado com sucesso"]);
        } else {
            echo json_encode(["mensagem" => "Erro: " . $insertDados . "<br>" . $connection->error]);
        }

        $connection->close();
    } else {
        echo json_encode(["mensagem" => "Preencha todos os campos"]);
    }
} else {
   echo json_encode(["mensagem" => "Error"]);
}

?>