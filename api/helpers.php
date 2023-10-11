<?php

function responseJson(string $message, int $httpCode)
{
    header("Content-Type: application/json; charset=UTF-8");

    http_response_code($httpCode);

    echo json_encode(['mensagem' => $message]);
}
