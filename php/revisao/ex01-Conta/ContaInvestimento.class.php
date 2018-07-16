<?php
require_once 'ContaBancaria.class.php';

class ContaInvestimento extends ContaBancaria{
    private $taxaJuros;

    function __construct($conta, $nome, $saldo, $taxaJuros){
        parent::__construct($conta, $nome, $saldo);
        $this->taxaJuros($taxaJuros);
    }
    function setTaxaJuros($taxaJuros){
        $this->taxaJuros = $taxaJuros;
    }
    function adicioneJuros(){
        $this->saldo + ($this->taxaJuros*$this->saldo);
        return $this->saldo;
    }
}