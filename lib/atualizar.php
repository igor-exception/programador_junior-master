<?php
require_once 'Ramais.php';
require_once '../db/conexao.php';

try {
    $ramais = new Ramais(__DIR__ . '/'.'ramais', __DIR__ . '/'.'filas');
    $lista = $ramais->getArray();

    foreach ($lista as $r) {
        // Atualiza tabela ramais
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

        // Atualiza tabela historico_estados (Registra apenas se o status de um agente mudar)
        $stmtHistorico = $pdo->prepare("SELECT status FROM historico_estados WHERE nome_agente = :nome_agente order by data_hora desc limit 1;");
        $stmtHistorico->execute([
            ':nome_agente' => $r['nome_agente']
        ]);

        $ultimo_estado = $stmtHistorico->fetch(PDO::FETCH_ASSOC);
        if (!$ultimo_estado || $ultimo_estado['status'] !== $r['status']) {
            $stmtLog = $pdo->prepare("
                INSERT INTO historico_estados (nome_agente, status)
                VALUES (:nome_agente, :status)
            ");

            $stmtLog->execute([
                ':nome_agente' => $r['nome_agente'],
                ':status' => $r['status']
            ]);
        }
    }

    echo json_encode(['status' => 'ok']);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'erro',
        'mensagem' => $e->getMessage()
    ]);
}
