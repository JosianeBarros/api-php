<?php

header("Content-Type: application/json; charset=UTF-8");
$dados = json_decode($dados, true);

include "db.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $connection = conectar();
    $selectDados = "SELECT * FROM livros";
    $resultado = $connection->query($selectDados);

    if($resultado->num_rows > 0){
        $livros = array();

        while($row = $resultado->fetch_assoc()){
            $livros[] = $row;
        }
        echo json_encode($livros);
    }else{
        echo json_encode(array(["mensagem" => "Nenhum livro encontrado"]));
    }

    $connection->close();

}else{
    echo json_encode(["mensagem" => "Error"]);
}

?>