<?php
require_once 'Ramais.php';
require_once '../db/conexao.php';

try {
    $ramais = new Ramais(__DIR__ . '/'.'ramais', __DIR__ . '/'.'filas');
    $lista = $ramais->getArray();

    foreach ($lista as $r) {
        $stmt = $pdo->prepare("
            INSERT INTO ramais (numero, nome, nome_agente, ip, porta, online, status)
            VALUES (:numero, :nome, :nome_agente, :ip, :porta, :online, :status)
            ON DUPLICATE KEY UPDATE
                nome = VALUES(nome),
                nome_agente = VALUES(nome_agente),
                ip = VALUES(ip),
                porta = VALUES(porta),
                online = VALUES(online),
                status = VALUES(status)
        ");

        $stmt->execute([
            ':numero' => $r['ramal'],
            ':nome' => $r['nome'],
            ':nome_agente' => $r['nome_agente'],
            ':ip' => $r['ip'],
            ':porta' => $r['porta'],
            ':online' => $r['online'] ? 1 : 0,
            ':status' => $r['status']
        ]);
    }

    echo json_encode(['status' => 'ok']);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'erro',
        'mensagem' => $e->getMessage()
    ]);
}
