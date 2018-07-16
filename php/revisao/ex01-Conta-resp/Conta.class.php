<?php

require_once 'Cliente.class.php';

abstract class Conta{
        private $cliente;
        private $agencia;
        private $numero;
        private $saldo;

    public function getCliente(){
        return $this->cliente;
    }
    public function setCliente(Cliente $cliente){ //faz com que seja aceita apenas um $cliente nos moldes da classe Cliente
        $this->cliente = $cliente;
    }
    public function getAgencia(){
        return $this->agencia;
    }
    public function setAgencia($agencia){
        $this->agencia = $agencia;
    }
    public function getNumero(){
        return $this->numero;
    }
    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function getSaldo(){
        return $this->saldo;
    }
    public function setSaldo($saldo){
        $this->saldo = $saldo;
    }
    public abstract function saca($valor);
    
    public function deposita($valor){
       if (is_numeric($valor) && $valor>0){
           $this->saldo += $valor;
           return true;//return funciona como um break, ele para a função e devolve um valor
       }
        return false;
    }
    public function transfere($valor, Conta $conta){
        if($this->saca($valor)){
            $conta->deposita($valor);
            return true;
        }
        return false;

    }
}
