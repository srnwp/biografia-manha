<?php
require_once 'ContaBancaria.class.php';
require_once 'ContaInvestimento.class.php';

$cliente = new ContaBancaria('0001', 'Joao');

$cliente->setSaldo(1000);

$cliente->setTaxaJuros(0.1);

$cliente->adicioneJuros();



echo $cliente->getSaldo();