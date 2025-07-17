<?php
    require_once '../db/conexao.php';
    require_once 'HistoricoAgente.php';

    $agente = $_GET['agente'] ?? '';
    $inicio = $_GET['inicio'] ?? date('Y-m-d');
    $fim = $_GET['fim'] ?? date('Y-m-d');

    $agente = htmlspecialchars($agente);

    $historico = new HistoricoAgente($pdo, $agente, $inicio, $fim);
    $historico->carregarRegistros();
    $historico->calcularTempos();
    $temposFormatados = $historico->getTemposFormatados();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/monitoramento.css">
        <title>Detalhes de <?= $agente ?></title>
    </head>
    <body class="container mt-5">
        <h1>Status de <?= $agente ?></h1>

        <?php if (!$historico->temDados()): ?>
            <p>Nenhum registro encontrado para este agente.</p>
        <?php else: ?>
            <table class="table table-bordered w-50">
                <thead class="thead-dark">
                    <tr>
                        <th>Status</th>
                        <th>Tempo Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($temposFormatados as $status => $tempo): ?>
                        <tr>
                            <td><?= ucfirst($status) ?></td>
                            <td><?= $tempo ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <script src="js/jquery-3.2.1.slim.min.js"></script>
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/monitoramento.js"></script>
    </body>
</html>
