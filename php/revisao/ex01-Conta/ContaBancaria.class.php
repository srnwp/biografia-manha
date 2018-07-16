<?php

class ContaBancaria{
    private $conta;
    private $nome;
    private $saldo;

    function __construct($conta, $nome, $saldo=0){
        $this->conta($conta);
        $this->nome($nome);
        $this->saldo($saldo);
    }
    function setNome($nome){
        $this->nome = $nome;
    }
    function getNome(){
        return $this->nome;
    }
    function setSaldo($saldo){
        $this->saldo = $saldo;
    }
    function getSaldo(){
        return $this->saldo;
    }
    function __toString(){
        return "nome: {$this->nome}, conta:{$this->conta}, saldo: {$this->saldo}";
    }
}