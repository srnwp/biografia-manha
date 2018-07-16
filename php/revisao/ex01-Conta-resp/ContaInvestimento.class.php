<?php
require_once 'Conta.class.php';

abstract class ContaInvestimento extends Conta{
    private $rendimento;

    public function rende(){
        $novoSaldo = parent::getSaldo()*(1+ $this->getPercentual());
        parent::setSaldo($novoSaldo);
    }
    public abstract function getPercentual();

    public function saca($valor){
        if(is_numeric($valor) && $valor > 0 && $valor <= parent::getSaldo()){
            $novosaldo = parent::getSaldo() - $valor;
            parent::setSaldo($novosaldo);
            return true;
        }
        return false;
        
    }
    
}