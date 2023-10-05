<?php

header("Content-Type: application/json; charset=UTF-8");

$dados = file_get_contents('php://input');
$dados = json_decode($dados, true);

include "db.php";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!empty($dados['nome']) && !empty($dados['autor']) && !empty($dados['editora']) && !empty($dados['paginas']) && !empty($dados['ano_da_publicacao']) && !empty($dados['quantidade'])) {
        // Conexão com o banco de dados
        $connection = conectar();

        $id = $connection->real_escape_string($dados['id']);
        $nome = $connection->real_escape_string($dados['nome']);
        $autor = $connection->real_escape_string($dados['autor']);
        $editora = $connection->real_escape_string($dados['editora']);
        $paginas = $connection->real_escape_string($dados['paginas']);
        $ano = $connection->real_escape_string($dados['ano_da_publicacao']);
        $quantidade = $connection->real_escape_string($dados['quantidade']);

        $updateDados = "UPDATE livros SET nome='$nome', autor='$autor', editora='$editora', paginas='$paginas', ano_da_publicacao='$ano', quantidade='$quantidade' WHERE id=$id";

        if ($connection->query($updateDados) === TRUE) {
            echo json_encode(["mensagem" => "Dados do livro atualizados com sucesso!"]);
        } else {
            echo json_encode(["mensagem" => "Erro: " . $updateDados . "<br>" . $connection->error]);
        }

        $connection->close();
    } else {
        echo json_encode(["mensagem" => "Preencha todos os campos"]);
    }
} else {
    echo json_encode(["mensagem" => "Erro"]);
}

?>