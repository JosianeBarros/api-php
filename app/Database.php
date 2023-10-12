<?php

include_once '../api/helpers.php';

class Database
{
    /**
     * Atributo responsável por ser a instância de conexão com o banco de dados.
     *
     * @var object
     */
    public object $connection;

    /**
     * Método responsável por construir a conexão com o bancos de dados da aplicação.
     */
    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=" . env('SERVER') . ";dbname=" . env('DATABASE'), env('USERNAME'), env('PASSWORD'));
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Conexão falhou: " . $e->getMessage();
            exit;
        }
    }

    /**
     * Método responsável por realizar inserts dentro do banco de dados.
     *
     * @param string $query
     * @param array $params
     * @return bool
     */
    public function insert(string $query, array $params): bool
    {
        foreach ($params as $index => $param) {
            unset($params[$index]);
            $params[':' . $index] = $param;
        }

        $insert = $this->connection->prepare($query);

        return $insert->execute($params);
    }
}
