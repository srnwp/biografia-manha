<?php
require_once 'ContaInvestimento.class.php';

class ContaAcao extends ContaInvestimento{
    private $percentual = 10/100;

    public function getPercentual(){
        return $this->percentual;
    }
}
