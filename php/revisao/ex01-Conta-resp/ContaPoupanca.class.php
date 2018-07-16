<?php
require_once 'ContaInvestimento.class.php';

class ContaPoupanca extends ContaInvestimento{
    private $percentual = 1/100;

    public function getPercentual(){
    return $this->percentual;
}
}