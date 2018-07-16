<?php

require_once 'Classes/Vendedor.class.php';

$vendedor = new Vendedor();

$vendedor->setNome('Hudson');
$vendedor->setMatricula('0001');
$vendedor->setIdade(18);

echo $vendedor->getNome();
echo $vendedor->getMatricula();
echo $vendedor->getIdade();

$fabiano = new Cliente('fabiano', '23456', 35, 'm', '5500');

echo $fabiano;