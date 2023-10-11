<?php 

function responseJson(string $message, int $httpCode)
{
    http_response_code($httpCode);
    echo json_encode(['mensagem' => $message]);
}