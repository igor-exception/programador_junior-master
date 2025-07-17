<?php

class HistoricoAgente {
    private $pdo;
    private $agente;
    private $registros = [];
    private $tempos = [];
    private $inicio;
    private $fim;

    public function __construct(PDO $pdo, string $agente, $inicio = null, $fim = null) {
        $this->pdo = $pdo;
        $this->agente = trim($agente);
        $this->inicio = $inicio ?? date('Y-m-d'); // padrão: hoje
        $this->fim = $fim ?? date('Y-m-d');       // padrão: hoje
    }

    public function carregarRegistros(){
        $stmt = $this->pdo->prepare("
            SELECT status, data_hora 
            FROM historico_estados 
            WHERE nome_agente = :agente
            AND data_hora BETWEEN :inicio AND :fim
            ORDER BY data_hora ASC
        ");
        $inicioCompleto = $this->inicio . ' 00:00:00';
        $fimCompleto = $this->fim . ' 23:59:59';

        $stmt->execute([
            ':agente' => $this->agente,
            ':inicio' => $inicioCompleto,
            ':fim' => $fimCompleto
        ]);
        $this->registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /*
        Lógica do status: Pega o proximo status
        Chaves status disponivel as 00:00:00
        Chaves status ocupado    as 00:00:10 (ou seja, ficou 10s disponivel)
        Chaves status disponivel as 00:05:10 (ou seja, ficou 5min ocupado)
        Se naoi tiver proximo proximo status, assumo que ainda esteja nele
    */
    public function calcularTempos(){
        $this->tempos = [];

        for ($i = 0; $i < count($this->registros); $i++) {
            $status = $this->registros[$i]['status'];
            $inicio = new DateTime($this->registros[$i]['data_hora']);

            if (isset($this->registros[$i + 1])) {
                $fim = new DateTime($this->registros[$i + 1]['data_hora']);
            } else {
                if ($this->fim === date('Y-m-d')) {
                    $fim = new DateTime();
                } else {
                    $fim = new DateTime($this->fim . ' 23:59:59');
                }
            }

            $segundos = $fim->getTimestamp() - $inicio->getTimestamp();

            if (!isset($this->tempos[$status])) {
                $this->tempos[$status] = 0;
            }

            $this->tempos[$status] += $segundos;
        }
    }

    public function getTemposFormatados(){
        $formatados = [];

        foreach ($this->tempos as $status => $segundos) {
            $formatados[$status] = $this->formatarTempo($segundos);
        }

        return $formatados;
    }

    private function formatarTempo(int $segundos){
        $h = floor($segundos / 3600);
        $m = floor(($segundos % 3600) / 60);
        $s = $segundos % 60;
        return sprintf('%02d:%02d:%02d', $h, $m, $s);
    }

    public function temDados(): bool {
        return !empty($this->registros);
    }
}
