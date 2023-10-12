<?php

include_once '../api/helpers.php';
include_once '../app/Database.php';
include_once 'db.php';

header('Access-Control-Allow-Methods: POST');

$dados = json_decode(file_get_contents('php://input'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!in_array("", $dados)) {
        $database = new Database;
        
        if ($database->insert(
            "INSERT INTO livros 
                (nome, autor, editora, paginas, ano_da_publicacao, quantidade) 
            VALUES 
                (:nome, :autor, :editora, :paginas, :ano_da_publicacao, :quantidade)",
            $dados
        )) {
            responseJson('Livro cadastrado com sucesso', 201);
        } else {
            responseJson(httpCode: 400);
        }
    } else {
        responseJson('Preencha todos os campos', 202);
    }
} else {
    responseJson(httpCode: 405);
}
