<?php

/**
 * Função responsável por efetuar o retorno da api em formato JSON.
 *
 * @param string|array $message
 * @param integer $httpCode
 * @return void
 */
function responseJson(string|array $message = '', int $httpCode = 200): void
{
    header("Content-Type: application/json; charset=UTF-8");

    http_response_code($httpCode);

    if ($message) {
        echo json_encode(['mensagem' => $message]);
    }
}

/**
 * Função responsável por resgatar informações das variáveis de ambiente da aplicação.
 *
 * @param string $search
 * @return string
 */
function env(string $search): string  
{
    return parse_ini_file('../.env')[$search];
}
