<?php

header("Content-Type: application/json; charset=UFT-8");

$dados = file_get_contents('php://input');
$dados = json_decode($dados, true);

include "db.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!empty($dados['id'])){
        $connection = conectar();

        $id = $connection->real_escape_string($dados['id']);
        $deleteDados = "DELETE FROM livros WHERE id=$id";

        if($connection->query($deleteDados) === TRUE){
            echo json_encode(["mensagem" => "Dados deletados com sucesso"]);
        }else{
            echo json_encode(["mensagem" => "Erro: " . $deleteDados . "<br>" . $connection->error]);
        }

        $connection->close();
    }else{
        echo json_encode(["mensagem" => "Preencha todos os campos"]);
    }
}else{
    echo json_encode(["mensagem" => "Erro"]);
}

?>