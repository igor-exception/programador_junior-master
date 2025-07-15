<?php

class Ramais
{
    private $arquivo_ramal;
    private $arquivo_fila;
    private $status_ramais;
    private $info_ramais;

    public function __construct($ramal=null, $fila=null)
    {
        if(!file_exists($ramal)) {
            throw new Exception('Arquivo Ramal não encontrado');
        }

        if(!file_exists($fila)) {
            throw new Exception('Arquivo Fila não encontrado');
        }

        $this->arquivo_ramal = $ramal;
        $this->arquivo_fila = $fila;
        $this->status_ramais = array();
        $this->info_ramais = array();
        
        $this->processarDados();
    }

    private function processarDadosFilas()
    {
        $filas = file($this->arquivo_fila);
        if(count($filas) <= 0) {
            throw new Exception("Arquivo: {$this->arquivo_fila} vazio.");
        }
        foreach($filas as $linhas){
            if(strstr($linhas,'SIP/')){
                $linha = explode(' ', trim($linhas));
                $nome_agente = end($linha);
                if(strstr($linhas,'(Ring)')){
                    list($tech,$ramal) = explode('/',$linha[0]);
                    $this->status_ramais[$ramal] = array('status' => 'chamando', 'agent_username' => $nome_agente);
                }else if(strstr($linhas,'(In use)')){    
                    list($tech,$ramal) = explode('/',$linha[0]);
                    $this->status_ramais[$ramal] = array('status' => 'ocupado', 'agent_username' => $nome_agente);
                }else if(strstr($linhas,'(Unavailable)')){
                    list($tech,$ramal)  = explode('/',$linha[0]);
                    $this->status_ramais[$ramal] = array('status' => 'indisponivel', 'agent_username' => $nome_agente);
                }else if(strstr($linhas,'(paused)')){
                    list($tech,$ramal)  = explode('/',$linha[0]);
                    $this->status_ramais[$ramal] = array('status' => 'pausado', 'agent_username' => $nome_agente);
                }else{
                    list($tech,$ramal)  = explode('/',$linha[0]);
                    $this->status_ramais[$ramal] = array('status' => 'disponivel', 'agent_username' => $nome_agente);
                }
            }
        }
    }

    private function processarDadosRamais()
    {
        $ramais = file($this->arquivo_ramal);
        if(count($ramais) <= 0) {
            throw new Exception("Arquivo: {$this->arquivo_ramal} vazio.");
        }
        foreach($ramais as $linhas){
            $linha = array_filter(explode(' ',$linhas));
            $arr = array_values($linha);

            if(!str_contains($arr[0], '/')){
                continue;
            }
            list($name,$username) = explode('/',$arr[0]);
            if(trim($arr[1]) == '(Unspecified)' AND trim($arr[4]) == 'UNKNOWN'){
                
                $this->info_ramais[$name] = array(
                    'nome' => $name,
                    'ramal' => $username,
                    'nome_agente' => $this->status_ramais[$name]['agent_username'],
                    'online' => false,
                    'status' => $this->status_ramais[$name]['status']
                );
            }
            if(isset($arr[5]) AND trim($arr[5]) == "OK"){
                $this->info_ramais[$name] = array(
                    'nome' => $name,
                    'ramal' => $username,
                    'nome_agente' => $this->status_ramais[$name]['agent_username'],
                    'online' => true,
                    'status' => $this->status_ramais[$name]['status']
                );
            }
            
        }
    }

    private function processarDados()
    {
        $this->processarDadosFilas();
        $this->processarDadosRamais();
    }

    public function getJson()
    {
        header("Content-type: application/json; charset=utf-8");
        return json_encode($this->info_ramais);
    }

    public function getArray()
    {
        return $this->info_ramais;
    }
}