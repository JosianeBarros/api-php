<?php

include '../api/helpers.php';
include "db.php";

$dados = json_decode(file_get_contents('php://input'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connection = conectar();
    $selectDados = "SELECT * FROM livros";
    $resultado = $connection->query($selectDados);

    if ($resultado->num_rows > 0) {
        $livros = [];

        while($row = $resultado->fetch_assoc()){
            $livros[] = $row;
        }

        responseJson($livros, 200);
    } else {
        responseJson("Nenhum livro encontrado", 204);
    }

    $connection->close();
} else {
    responseJson('Error', 405);
}
