<?php

include '../app/Database.php';

$db = new Database();

$db->insert(
    "INSERT INTO livros 
        (nome, autor, editora, paginas, ano_da_publicacao, quantidade) 
    VALUES 
        (:nome, :autor, :editora, :paginas, :ano_da_publicacao, :quantidade)", 
    [
        'nome' => 'Teste',
        'autor' => 'Teste',
        'editora' => 'Teste',
        'paginas' => '1',
        'ano_da_publicacao' => '1',
        'quantidade' => '1',
    ]
);
