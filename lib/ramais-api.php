<?php

require_once 'Ramais.php';

try {
    $caminho_arquivo_ramais = __DIR__ . '/'.'ramais';
    $caminho_arquivo_filas = __DIR__ . '/'. 'filas';
    $ramais = new Ramais($caminho_arquivo_ramais, $caminho_arquivo_filas);

    echo $ramais->getJson();
} catch(Exception $e) {
    http_response_code(500);
    echo json_encode(['erro' => $e->getMessage()]);
}
